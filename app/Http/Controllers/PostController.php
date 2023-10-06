<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();

        if (isset($request->keyword)) {
            $query = $query
                ->where('title', 'like', '%' . $request->keyword . '%')
                ->where('content', 'like', '%' . $request->keyword . '%');
        }

        if (isset($request->date_from)) {
            $dateFrom = Carbon::parse($request->date_from);
            $query->where('created_at', '>=', $dateFrom->startOfDay());
        }

        if (isset($request->date_to)) {
            $dateTo = Carbon::parse($request->date_to);
            $query->where('created_at', '<=', $dateTo->endOfDay());
        }

        $posts = $query->get();

        return Inertia::render('Posts/Index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    public function show(Post $post)
    {
        return Inertia::render('Posts/Show', [
            'post' => $post->load('postComments.user')
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'content' => 'required|string|max:500',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', '登録しました');
    }

    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'content' => 'required|string|max:500',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', '更新しました');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', '削除しました');
    }
}
