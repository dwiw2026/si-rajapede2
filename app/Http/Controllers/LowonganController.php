<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filterPerusahaan = $request->get('perusahaan_id');
        $search = $request->get('search');
        $perusahaans = Perusahaan::all();

        $lowongans = Lowongan::with('perusahaan')
            ->when($filterPerusahaan, fn($q) => $q->where('perusahaan_id', $filterPerusahaan))
            ->when($search, fn($q) => $q->where('judul', 'like', '%' . $search . '%')
                ->orWhere('deskripsi', 'like', '%' . $search . '%'))
            ->get();

        return view('admin/lowongan/index', compact('lowongans', 'perusahaans', 'filterPerusahaan', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $perusahaans = Perusahaan::all();
        return view('admin/lowongan/create', compact('perusahaans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'judul' => 'required',
            'tanggal_posting' => 'nullable|date',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'jenis_disabilitas' => 'required|array',
            'tanggal_berakhir' => 'required|date',
            'perusahaan_id' => 'required|exists:perusahaans,id',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'gaji_min' => 'nullable|string',
            'gaji_max' => 'nullable|string',
            'kategori_pekerjaan' => 'nullable|string',
            'jenis_pekerjaan' => 'nullable|string',
            'jenis_kelamin' => 'nullable|array',
            'kriteria_kualifikasi' => 'nullable|string',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('lowongan_gambar', 'public');
        }

        $data = $request->only('judul', 'tanggal_posting', 'lokasi', 'deskripsi', 'tanggal_berakhir', 'perusahaan_id', 'gaji_min', 'gaji_max', 'kategori_pekerjaan', 'jenis_pekerjaan', 'kriteria_kualifikasi');
        $data['jenis_disabilitas'] = implode(',', $request->get('jenis_disabilitas', []));
        $data['jenis_kelamin'] = implode(',', $request->get('jenis_kelamin', []));
        $data['gambar'] = $gambarPath;

        Lowongan::create($data);

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lowongan $lowongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lowongan $lowongan)
    {
        //
        $perusahaans = Perusahaan::all();
        return view('admin/lowongan/edit', compact('lowongan', 'perusahaans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        //
        $request->validate([
            'judul' => 'required',
            'tanggal_posting' => 'nullable|date',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'jenis_disabilitas' => 'required|array',
            'tanggal_berakhir' => 'required|date',
            'perusahaan_id' => 'required|exists:perusahaans,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gaji_min' => 'nullable|string',
            'gaji_max' => 'nullable|string',
            'kategori_pekerjaan' => 'nullable|string',
            'jenis_pekerjaan' => 'nullable|string',
            'jenis_kelamin' => 'nullable|array',
            'kriteria_kualifikasi' => 'nullable|string',
        ]);

        $data = $request->only('judul', 'tanggal_posting', 'lokasi', 'deskripsi', 'tanggal_berakhir', 'perusahaan_id', 'gaji_min', 'gaji_max', 'kategori_pekerjaan', 'jenis_pekerjaan', 'kriteria_kualifikasi');
        $data['jenis_disabilitas'] = implode(',', $request->get('jenis_disabilitas', []));
        $data['jenis_kelamin'] = implode(',', $request->get('jenis_kelamin', []));

        if ($request->hasFile('gambar')) {
            // Delete old image jika ada
            if ($lowongan->gambar) {
                Storage::disk('public')->delete($lowongan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('lowongan_gambar', 'public');
        }

        $lowongan->update($data);
        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lowongan $lowongan)
    {
        //
        if ($lowongan->gambar) {
            Storage::disk('public')->delete($lowongan->gambar);
        }
        $lowongan->delete();
        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil dihapus.');
    }
}
