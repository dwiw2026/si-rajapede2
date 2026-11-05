<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.hero.index', [
            'heroes' => Hero::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);


        // Store uploaded image in public disk under hero_images with explicit filename
        $file = $request->file('image');
        if (!$file || !$file->isValid()) {
            return back()->withErrors(['image' => 'File upload error'])->withInput();
        }

        $filename = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', $file->getClientOriginalName());
        $imagePath = $file->storeAs('hero_images', $filename, 'public');

        // Verify file exists after store
        if (!\Illuminate\Support\Facades\Storage::disk('public')->exists($imagePath)) {
            return back()->withErrors(['image' => 'Gagal menyimpan file ke storage'])->withInput();
        }

        Hero::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $imagePath,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.hero.index')->with('success', 'Hero berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hero $hero)
    {
        return view('admin.hero.show', compact('hero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hero $hero)
    {
        return view('admin.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $updateData = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ];

        if ($request->hasFile('image')) {
            // Normalize stored path before delete (handle values like "storage/...", "public/...", absolute URLs)
            $existing = $hero->image;
            $shouldDelete = true;
            if (!$existing) {
                $shouldDelete = false;
            } elseif (preg_match('#^https?://#i', $existing)) {
                $shouldDelete = false;
            } else {
                // remove leading slash
                $existing = ltrim($existing, '/');
                // remove leading storage/ or public/
                if (stripos($existing, 'storage/') === 0) {
                    $existing = substr($existing, strlen('storage/'));
                } elseif (stripos($existing, 'public/') === 0) {
                    $existing = substr($existing, strlen('public/'));
                }
            }

            if ($shouldDelete && $existing && Storage::disk('public')->exists($existing)) {
                Storage::disk('public')->delete($existing);
            }

            $file = $request->file('image');
            if ($file && $file->isValid()) {
                $filename = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', $file->getClientOriginalName());
                $imagePath = $file->storeAs('hero_images', $filename, 'public');

                if (!\Illuminate\Support\Facades\Storage::disk('public')->exists($imagePath)) {
                    return back()->withErrors(['image' => 'Gagal menyimpan file ke storage'])->withInput();
                }

                $updateData['image'] = $imagePath;
            } else {
                return back()->withErrors(['image' => 'File upload error'])->withInput();
            }
        }

        $hero->update($updateData);

        return redirect()->route('admin.hero.index')->with('success', 'Hero berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hero $hero)
    {
        // Delete image (normalize path similar to update)
        $existing = $hero->image;
        if ($existing && !preg_match('#^https?://#i', $existing)) {
            $existing = ltrim($existing, '/');
            if (stripos($existing, 'storage/') === 0) {
                $existing = substr($existing, strlen('storage/'));
            } elseif (stripos($existing, 'public/') === 0) {
                $existing = substr($existing, strlen('public/'));
            }

            if ($existing && Storage::disk('public')->exists($existing)) {
                Storage::disk('public')->delete($existing);
            }
        }

        $hero->delete();

        return redirect()->route('admin.hero.index')->with('success', 'Hero berhasil dihapus.');
    }
}
