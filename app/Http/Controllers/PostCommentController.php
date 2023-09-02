<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|integer|exists:posts,id',
            'comment' => 'required|string|max:200',
        ]);

        $post = Post::find($request->post_id);

        $post->postComments()->create([
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return redirect()->route('posts.show', ['post' => $post->id])->with('success', 'コメントしました');
    }

    public function destroy(PostComment $postComment)
    {
        $postComment->delete();

        return redirect()->route('posts.show', ['post' => $postComment->post_id])->with('success', '削除しました');
    }
}
