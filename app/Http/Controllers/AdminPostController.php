<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index',[
            'posts' =>Post::paginate(50)
        ]);
    }
    public function create(Post $post)
    {

        return view('admin.posts.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'title' => 'required|max:255',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('Posts', 'slug')],
            'body' => 'required|max:2000',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'excerpt' => 'required'
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);
        return redirect('/');
    }
    public function edit(Post $post)
    {
        return view('admin.posts.edit',[
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required|max:255',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('Posts', 'slug')->ignore($post->id)],
            'body' => 'required|max:2000',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'excerpt' => 'required'
        ]);
        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        }
        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        
        return back()->with('success', 'Post Deleted!');
    }
}
