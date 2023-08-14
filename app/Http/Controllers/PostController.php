<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Posts/Index');
    }

    public function create()
    {
        return Inertia::render('Posts/Create');
    }
}
