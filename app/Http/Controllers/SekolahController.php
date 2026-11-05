<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sekolahs = Sekolah::all();
        // return view('sekolah.index', compact('sekolahs'));
        return view('admin/sekolah/index', compact('sekolahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('sekolah.create');
        return view('admin/sekolah/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'npsn' => 'required|unique:sekolahs,npsn',
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
        ]);

        Sekolah::create($validated);
        return redirect()->route('sekolah.index')->with('success', 'Data sekolah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sekolah $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sekolah $sekolah)
    {
        //
        // return view('sekolah.edit', compact('sekolah'));
        return view('admin/sekolah/edit', compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sekolah $sekolah)
    {
        //
        $validated = $request->validate([
            'npsn' => 'required|unique:sekolahs,npsn,' . $sekolah->id,
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
        ]);

        $sekolah->update($validated);
        return redirect()->route('sekolah.index')->with('success', 'Data sekolah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sekolah $sekolah)
    {
        //

        $sekolah->delete();
        return redirect()->route('sekolah.index')->with('success', 'Data sekolah dihapus');
    }
}
