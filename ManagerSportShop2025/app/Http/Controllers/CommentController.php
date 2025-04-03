<?php
namespace App\Http\Controllers;

use App\Models\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    


    public function store(Request $request)
    {
        if (!Auth::check()) {
            return back()->with('error', 'Bạn cần đăng nhập để bình luận.');
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'content' => 'required|string|max:500',
        ]);

        $comment = new comments();
        $comment->user_id  = Auth::id();
        $comment->product_id = $request->product_id;
        $comment->content = $request->content;
        $comment->save();

        return back()->with('success', 'Bình luận đã được thêm!');
    }


    public function destroy($id)
    {
        $comment = comments::findOrFail($id);

        if (Auth::id() !== $comment->user_id) {
            return back()->with('error', 'Bạn không thể xóa bình luận này!');
        }

        $comment->delete();
        return back()->with('success', 'Bình luận đã bị xóa!');
    }
}
