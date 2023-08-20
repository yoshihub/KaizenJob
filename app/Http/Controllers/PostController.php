<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Posts/Index', [
            'posts' => Post::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    public function show()
    {
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:5',
            'content' => 'required|string|max:500',
        ]);
        Post::create($data);

        return redirect()->route('posts.index');
    }
}
