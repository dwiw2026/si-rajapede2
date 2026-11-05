<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Frontend;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\VideoTutorial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua alumni, urutkan dari yang terbaru
        $allAlumni = Alumni::orderBy('created_at', 'desc')->get();

        // Kelompokkan alumni per 4 siswa
        $alumniGroups = $allAlumni->chunk(4);

        $totalGroups = $alumniGroups->count();

        $totalGroups = $alumniGroups->count();
        $totalGroups = $alumniGroups->count();

        // Ambil lowongans yang aktif (berdasarkan tanggal berakhir)
        $lowongans = Lowongan::where('tanggal_berakhir', '>=', now())
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->with('perusahaan')
            ->get();

        // Ambil video tutorials teratas (4 terbaru)
        $videoTutorials = VideoTutorial::orderBy('created_at', 'desc')->limit(4)->get();

        // Ambil heroes aktif
        $heroes = \App\Models\Hero::where('is_active', true)->orderBy('created_at', 'desc')->get();

        return view('frontend.master', [
            'alumniGroups' => $alumniGroups,
            'totalGroups' => $alumniGroups->count(),
            'lowongans' => $lowongans,
            'videoTutorials' => $videoTutorials,
            'heroes' => $heroes
        ]);
    }

    public function fpalumniindex(Request $request)
    {
        $query = Alumni::query();
        if ($request->filled('q')) {
            $q = $request->get('q');
            $query->where('nama_siswa', 'like', "%{$q}%");
        }

        $alumnis = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();

        return view('frontend.fpalumni', compact('alumnis'));
    }

    public function perusahaanIndex(Request $request)
    {
        $query = Perusahaan::query();
        if ($request->filled('q')) {
            $q = $request->get('q');
            $query->where('nama', 'like', "%{$q}%");
        }

        $perusahaans = $query->orderBy('nama')->paginate(12)->withQueryString();
        return view('frontend.perusahaan', compact('perusahaans'));
    }

    public function lowonganIndex(Request $request)
    {
        $query = Lowongan::with('perusahaan');

        if ($request->filled('q')) {
            $q = $request->get('q');
            $query->where('judul', 'like', "%{$q}%");
        }

        if ($request->filled('perusahaan_id')) {
            $query->where('perusahaan_id', $request->get('perusahaan_id'));
        }

        $lowongans = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        $perusahaans = Perusahaan::orderBy('nama')->get();

        return view('frontend.lowongan', compact('lowongans', 'perusahaans'));
    }

    public function pesertaDidikIndex(Request $request)
    {
        $query = \App\Models\PesertaDidik::query();
        if ($request->filled('q')) {
            $q = $request->get('q');
            $query->where('nama_siswa', 'like', "%{$q}%");
        }

        $pesertas = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();

        // Provide same variables used by the master layout partials
        $allAlumni = \App\Models\Alumni::orderBy('created_at', 'desc')->get();
        $alumniGroups = $allAlumni->chunk(4);
        $totalGroups = $alumniGroups->count();

        $lowongans = \App\Models\Lowongan::where('tanggal_berakhir', '>=', now())
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->with('perusahaan')
            ->get();

        return view('frontend.pesertadidik', compact('pesertas', 'alumniGroups', 'totalGroups', 'lowongans'));
    }

    public function showPeserta(\App\Models\PesertaDidik $peserta)
    {
        return view('frontend.pesertadidik-detail', compact('peserta'));
    }

    public function showLowongan(Lowongan $lowongan)
    {
        return view('frontend.lowongan-detail', compact('lowongan'));
    }


    public function showAlumniDetail(Alumni $alumni)
    {
        //
        return view('frontend.alumni-detail', compact('alumni'));
    }

    public function alumni_detail()
    {
        //
        return view('frontend.service');
    }
    public function alumni_detail2()
    {
        //
        return view('frontend.service2');
    }
    public function alumni_detail3()
    {
        //
        return view('frontend.service3');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Frontend $frontend)
    {
        //
    }

    public function videoTutorialIndex()
    {
        $videos = VideoTutorial::orderBy('created_at', 'desc')->get();
        return view('frontend.video-tutorial', compact('videos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Frontend $frontend)
    {
        //
    }
}
