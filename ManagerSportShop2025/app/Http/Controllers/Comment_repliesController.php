<?php

namespace App\Http\Controllers;

use App\Models\comment_replies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Comment_repliesController extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return back()->with('error', 'Bạn cần đăng nhập để bình luận.');
        }

        $request->validate([
            'comment_id' => 'required|exists:comments,id', // Đúng bảng comments
            'content' => 'required|string|max:500',
        ]);

        $reply = new comment_replies(); // Đổi tên Model cho đúng
        $reply->user_id = Auth::id();
        $reply->comment_id = $request->comment_id;
        $reply->content = $request->content;
        $reply->save();

        return back()->with('success', 'Trả lời đã được thêm!');
    }

    public function destroy($id)
    {
        $reply = comment_replies::findOrFail($id); // Dùng đúng Model

        if (Auth::id() !== $reply->user_id) {
            return back()->with('error', 'Bạn không thể xóa trả lời này!');
        }

        $reply->delete();
        return back()->with('success', 'Trả lời đã bị xóa!');
    }
}
