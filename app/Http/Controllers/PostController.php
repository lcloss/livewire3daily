<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
}
