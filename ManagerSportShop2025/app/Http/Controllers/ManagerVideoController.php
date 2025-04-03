<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\video;

class ManagerVideoController extends Controller
{
    // Hiển thị danh sách video
    public function listVideo()
    {
        $videos = video::all();
        return view('page.manager_video_list', compact('videos'));
    }

    // Hiển thị form thêm mới
    public function create()
    {
        return view('page.manager_video_create');
    }

    // Xử lý lưu video mới
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'url' => 'nullable|string',
            'thumbnail' => 'nullable|string'
        ]);
        $video = new video();
        $video->title = $request->title;
        $video->description = $request->description;
        $video->url = $request->url;
        $video->thumbnail = $request->thumbnail;
        $video->save();
        return redirect()->route('manager_videos')->with('success', 'Thêm video thành công!');
    }

    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $video = video::findOrFail($id);
        return view('page.manager_video_edit', compact('video'));
    }

    // Xử lý cập nhật video
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'url' => 'nullable|string',
            'thumbnail' => 'nullable|string'
        ]);

        $video = video::findOrFail($id);
        $video->title = $request->title;
        $video->description = $request->description;
        $video->url = $request->url;
        $video->thumbnail = $request->thumbnail;
        $video->save();

        return redirect()->route('manager_videos')->with('success', 'Cập nhật video thành công!');
    }

    // Xóa video
    public function destroy($id)
    {
        $video = video::findOrFail($id);
        $video->delete();
        return redirect()->route('manager_videos')->with('success', 'Xóa video thành công!');
    }
}
