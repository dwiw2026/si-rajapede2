<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return  view('admin.alumni.index', [
            'alumnis' => Alumni::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('admin.alumni.create');
        return view('admin.alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // $request->validate([
        //     'nipd' => ['required', 'string', 'max:255'],
        //     'nama_siswa' => ['required', 'string', 'max:255'],
        //     'jk' => ['required', 'string'],
        //     'nisn' => ['required', 'string', 'max:255'],
        //     'nisn' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Alumni::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // $alumni = Alumni::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // Simpan file foto jika ada
        // if ($request->hasFile('foto')) {
        //     $fileName = date('YmdHi') . $file->getClientOriginalName();
        //     $fotoPath = $request->file('foto')->store('foto_alumni', 'public');
        //     $file->move(public_path('upload/alumni_images'), $fileName);
        //     $validated['foto'] = $fotoPath;
        //     $validated['foto'] = $file;
        // }



        $validated = $request->validate([
            'nipd' => 'required|unique:alumnis,nipd',
            'nama_siswa' => 'required|string|max:255',
            'jk' => 'required|in:L,P',
            'nisn' => 'required|unique:alumnis,nisn',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|unique:alumnis,nik',
            'agama' => 'required|string',
            'kebutuhan_khusus' => 'nullable|string',
            'alamat' => 'required|string',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
            'dusun' => 'nullable|string',
            'kelurahan' => 'required|string',
            'kecamatan' => 'required|string',
            'hp' => 'nullable|string',
            'e-mail' => 'required|email|unique:alumnis,e-mail',
            'sertifikat_keahlian' => 'nullable|string',
            'bekerja' => 'nullable|boolean',
            'kerja_di' => 'nullable|string|max:255',
            'kerja_mulai' => 'nullable|date',
            'certificate_image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'link_video' => 'nullable|url',
            'keterangan' => 'nullable|string',
            'asal_sekolah' => 'required|string',
            // 'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            'foto' => 'nullable:jpg,jpeg,png|max:2048'
        ]);

        // normalize bekerja checkbox
        $validated['bekerja'] = $request->has('bekerja') ? 1 : 0;

        if (!empty($request->file('foto'))) {
            // if ($request->file('foto')) {

            $file = $request->file('foto');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/alumni_images'), $fileName);
            $validated['foto'] = $fileName;

            // } else {
            //     $validated->profile_image = $request->profile_image;
        }

        if ($request->hasFile('certificate_image')) {
            $certFile = $request->file('certificate_image');
            $certName = date('YmdHi') . '_cert_' . $certFile->getClientOriginalName();
            $certFile->move(public_path('upload/certificate_images'), $certName);
            $validated['certificate_image'] = $certName;
        }


        // Simpan data ke database
        // $alumni = Alumni::create($validated);
        Alumni::create($validated);

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumni $alumni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumni $alumni)
    {
        //
        return  view('admin.alumni.edit', [
            'alumni' => $alumni
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumni $alumni)
    {
        //
        $validated = $request->validate([
            'nipd' => 'required|unique:alumnis,nipd,' . $alumni->id,
            'nama_siswa' => 'required|string|max:255',
            'jk' => 'required|in:L,P',
            'nisn' => 'required|unique:alumnis,nisn,' . $alumni->id,
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|unique:alumnis,nik,' . $alumni->id,
            'agama' => 'required|string',
            'kebutuhan_khusus' => 'nullable|string',
            'alamat' => 'required|string',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
            'dusun' => 'nullable|string',
            'kelurahan' => 'required|string',
            'kecamatan' => 'required|string',
            'hp' => 'nullable|string',
            'e-mail' => 'required|email|unique:alumnis,e-mail,' . $alumni->id,
            'sertifikat_keahlian' => 'nullable|string',
            'link_video' => 'nullable|url',
            'keterangan' => 'nullable|string',
            'asal_sekolah' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bekerja' => 'nullable|boolean',
            'kerja_di' => 'nullable|string|max:255',
            'kerja_mulai' => 'nullable|date',
            'certificate_image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096'
        ]);

        // normalize bekerja flag
        $validated['bekerja'] = $request->has('bekerja') ? 1 : 0;

        if (!empty($request->file('foto'))) {
            $file = $request->file('foto');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/alumni_images'), $fileName);
            $validated['foto'] = $fileName;
        }

        // Handle certificate image replacement
        if ($request->hasFile('certificate_image')) {
            // delete old certificate if exists
            if (!empty($alumni->certificate_image) && file_exists(public_path('upload/certificate_images/' . $alumni->certificate_image))) {
                @unlink(public_path('upload/certificate_images/' . $alumni->certificate_image));
            }
            $certFile = $request->file('certificate_image');
            $certName = date('YmdHi') . '_cert_' . $certFile->getClientOriginalName();
            $certFile->move(public_path('upload/certificate_images'), $certName);
            $validated['certificate_image'] = $certName;
        }

        $alumni->update($validated);

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumni $alumni)
    {
        //

        // Alumni::destroy($alumni->id);

        // if ($alumni->foto) {
        //     Storage::disk('public')->delete($alumni->foto);
        // }

        // delete associated files
        if (!empty($alumni->foto) && file_exists(public_path('upload/alumni_images/' . $alumni->foto))) {
            @unlink(public_path('upload/alumni_images/' . $alumni->foto));
        }
        if (!empty($alumni->certificate_image) && file_exists(public_path('upload/certificate_images/' . $alumni->certificate_image))) {
            @unlink(public_path('upload/certificate_images/' . $alumni->certificate_image));
        }

        $alumni->delete();

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil dihapus.');
    }

    // public function delete()
    // {
    //     $alumni->Alumni::find($id);
    //     $alumni->delete;
    //     return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil dihapus.');
    // }
}
