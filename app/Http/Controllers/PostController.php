<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/dashboard')->with('message', 'Please log in first to publish a post.');
        }

        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $fields['title']   = strip_tags($fields['title']);
        $fields['body']    = strip_tags($fields['body']);
        $fields['user_id'] = Auth::id();
        $fields['slug']    = Str::slug($fields['title']) . '-' . uniqid();
        $fields['status']  = 'published';

        if ($request->hasFile('image')) {
            $fields['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($fields);

        return redirect('/dashboard');
    }

    public function showEditScreen(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return redirect('/');
        }

        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Post $post, Request $request)
    {
        if (Auth::id() !== $post->user_id) {
            return redirect('/dashboard');
        }

        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $fields['title'] = strip_tags($fields['title']);
        $fields['body']  = strip_tags($fields['body']);
        $fields['slug']  = Str::slug($fields['title']) . '-' . uniqid();

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $fields['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($fields);

        return redirect('/dashboard');
    }

    public function deletePost(Post $post)
    {
        if (Auth::id() === $post->user_id) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $post->delete();
        }

        return redirect('/dashboard');
    }
}
