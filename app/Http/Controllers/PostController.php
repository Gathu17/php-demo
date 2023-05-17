<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(3);
        $categories = Category::orderBy('name')->get();
        $currentCategory = Category::firstWhere('slug', request('category'));
        return view(
            'posts',
            compact('posts', 'categories', 'currentCategory')
        );
    }
    public function show(Post $post)
    {
        // Find a post by its slug and return its contents

        return view('post', [
            'post' => $post
        ]);
    }
}