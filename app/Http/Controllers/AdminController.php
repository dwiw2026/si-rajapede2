<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// tambahan
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Alumni;
use App\Models\Sekolah;
use App\Models\Perusahaan;
use App\Models\Lowongan;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch counts from database
        $alumniCount = Alumni::count();
        $sekolahCount = Sekolah::count();
        $perusahaanCount = Perusahaan::count();
        $lowonganCount = Lowongan::count();

        // Fetch recent data for display
        $recentAlumni = Alumni::orderBy('created_at', 'desc')->limit(5)->get();
        $recentLowongans = Lowongan::with('perusahaan')->orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.index', compact(
            'alumniCount',
            'sekolahCount',
            'perusahaanCount',
            'lowonganCount',
            'recentAlumni',
            'recentLowongans'
        ));
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_view_profile', compact('adminData'));
    }

    public function editprofile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('admin.admin_edit_profile', compact('editData'));
    }

    public function storeprofile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_image')) {

            $file = $request->file('profile_image');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $fileName);
            $data['profile_image'] = $fileName;
        } else {
            $data->profile_image = $request->profile_image;
        }
        $data->save();
        return redirect()->route('admin.adminprofile');
    }
}
