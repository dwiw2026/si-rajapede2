<?php

namespace App\Http\Controllers;

use App\Models\VideoTutorial;
use Illuminate\Http\Request;

class VideoTutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.video_tutorial.index', [
            'video_tutorials' => VideoTutorial::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video_tutorial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'link_youtube' => 'required|url',
        ]);

        VideoTutorial::create($request->all());

        return redirect()->route('admin.video_tutorial.index')->with('success', 'Video Tutorial berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoTutorial $video_tutorial)
    {
        return view('admin.video_tutorial.show', compact('video_tutorial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoTutorial $video_tutorial)
    {
        return view('admin.video_tutorial.edit', compact('video_tutorial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VideoTutorial $video_tutorial)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'link_youtube' => 'required|url',
        ]);

        $video_tutorial->update($request->all());

        return redirect()->route('admin.video_tutorial.index')->with('success', 'Video Tutorial berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoTutorial $video_tutorial)
    {
        $video_tutorial->delete();

        return redirect()->route('admin.video_tutorial.index')->with('success', 'Video Tutorial berhasil dihapus.');
    }
}
