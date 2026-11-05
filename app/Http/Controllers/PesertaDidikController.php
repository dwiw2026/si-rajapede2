<?php

namespace App\Http\Controllers;

use App\Models\PesertaDidik;
use Illuminate\Http\Request;

class PesertaDidikController extends Controller
{
    public function index()
    {
        return view('admin.pesertadidik.index', [
            'peserta' => PesertaDidik::all()
        ]);
    }

    public function create()
    {
        return view('admin.pesertadidik.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nipd' => 'nullable|string|unique:peserta_didiks,nipd',
            'nisn' => 'nullable|string|unique:peserta_didiks,nisn',
            'email' => 'nullable|email|unique:peserta_didiks,email',
            'kelas' => 'nullable|string',
            'asal_sekolah' => 'nullable|string|max:255',
            'sertifikat_keahlian' => 'nullable|string',
            'link_video' => 'nullable|url',
            'certificate_image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'sudah_magang' => 'nullable|boolean',
            'magang_di' => 'nullable|string',
            'magang_mulai' => 'nullable|date',
        ]);

        $validated['sudah_magang'] = $request->has('sudah_magang') ? 1 : 0;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/peserta_images'), $name);
            $validated['foto'] = $name;
        }

        if ($request->hasFile('certificate_image')) {
            $certFile = $request->file('certificate_image');
            $certName = date('YmdHi') . '_cert_' . $certFile->getClientOriginalName();
            $certFile->move(public_path('upload/certificate_images'), $certName);
            $validated['certificate_image'] = $certName;
        }

        PesertaDidik::create($validated);

        return redirect()->route('admin.pesertadidik.index')->with('success', 'Peserta didik berhasil ditambahkan.');
    }

    public function edit(PesertaDidik $peserta)
    {
        return view('admin.pesertadidik.edit', compact('peserta'));
    }

    public function update(Request $request, PesertaDidik $peserta)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nipd' => 'nullable|string|unique:peserta_didiks,nipd,' . $peserta->id,
            'nisn' => 'nullable|string|unique:peserta_didiks,nisn,' . $peserta->id,
            'email' => 'nullable|email|unique:peserta_didiks,email,' . $peserta->id,
            'kelas' => 'nullable|string',
            'asal_sekolah' => 'nullable|string|max:255',
            'sertifikat_keahlian' => 'nullable|string',
            'link_video' => 'nullable|url',
            'certificate_image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'sudah_magang' => 'nullable|boolean',
            'magang_di' => 'nullable|string',
            'magang_mulai' => 'nullable|date',
        ]);

        $validated['sudah_magang'] = $request->has('sudah_magang') ? 1 : 0;

        if ($request->hasFile('foto')) {
            if (!empty($peserta->foto) && file_exists(public_path('upload/peserta_images/' . $peserta->foto))) {
                @unlink(public_path('upload/peserta_images/' . $peserta->foto));
            }
            $file = $request->file('foto');
            $name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/peserta_images'), $name);
            $validated['foto'] = $name;
        }

        // Handle certificate image replacement
        if ($request->hasFile('certificate_image')) {
            if (!empty($peserta->certificate_image) && file_exists(public_path('upload/certificate_images/' . $peserta->certificate_image))) {
                @unlink(public_path('upload/certificate_images/' . $peserta->certificate_image));
            }
            $certFile = $request->file('certificate_image');
            $certName = date('YmdHi') . '_cert_' . $certFile->getClientOriginalName();
            $certFile->move(public_path('upload/certificate_images'), $certName);
            $validated['certificate_image'] = $certName;
        }

        $peserta->update($validated);

        return redirect()->route('admin.pesertadidik.index')->with('success', 'Peserta didik berhasil diperbarui.');
    }

    public function destroy(\Illuminate\Http\Request $request)
    {
        $id = $request->input('id');
        $peserta = PesertaDidik::find($id);
        if (!$peserta) {
            return redirect()->route('admin.pesertadidik.index')->with('error', 'Peserta tidak ditemukan.');
        }

        if (!empty($peserta->foto) && file_exists(public_path('upload/peserta_images/' . $peserta->foto))) {
            @unlink(public_path('upload/peserta_images/' . $peserta->foto));
        }
        if (!empty($peserta->certificate_image) && file_exists(public_path('upload/certificate_images/' . $peserta->certificate_image))) {
            @unlink(public_path('upload/certificate_images/' . $peserta->certificate_image));
        }
        $peserta->delete();
        return redirect()->route('admin.pesertadidik.index')->with('success', 'Peserta didik berhasil dihapus.');
    }
}
