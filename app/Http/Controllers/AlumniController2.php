<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::paginate(10);
        return view('admin.alumni.index', compact('alumnis'));
    }

    public function create()
    {
        return view('admin.alumni.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nipd' => 'required|unique:alumni,nipd',
            'nama_siswa' => 'required|string|max:255',
            'jk' => 'required|in:L,P',
            'nisn' => 'required|unique:alumni,nisn',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|unique:alumni,nik',
            'agama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'keluarahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'e-mail' => 'required|email|unique:alumni,e-mail',
            'asal_sekolah' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_alumni', 'public');
            $validated['foto'] = $path;
        }

        Alumni::create($validated);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil disimpan');
    }

    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);
        // return view('admin.alumni.edit', compact('alumni'));
        return view('admin.alumni.edit');
    }

    public function update(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);

        $validated = $request->validate([
            'nipd' => 'required|unique:alumni,nipd,' . $alumni->id,
            'nama_siswa' => 'required|string|max:255',
            'jk' => 'required|in:L,P',
            'nisn' => 'required|unique:alumni,nisn,' . $alumni->id,
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|unique:alumni,nik,' . $alumni->id,
            'agama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'keluarahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'e-mail' => 'required|email|unique:alumni,e-mail,' . $alumni->id,
            'asal_sekolah' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($alumni->foto) {
                Storage::disk('public')->delete($alumni->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto_alumni', 'public');
        }

        $alumni->update($validated);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diperbarui');
    }

    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);
        if ($alumni->foto) {
            Storage::disk('public')->delete($alumni->foto);
        }
        $alumni->delete();
        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil dihapus');
    }
}
