<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => ['required', 'min:3'],
            'content' => ['required']
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['content'] = strip_tags($incomingFields['content']);
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);

        return redirect('/');
    }

    public function showEditScreen(Post $post)
    {
        if (!auth()->check() || auth()->id() !== $post['user_id'])
            return redirect('/');

        return view('edit-post', ['post' => $post]);
    }

    public function actuallyUpdatePost(Post $post, Request $request)
    {
        if (!auth()->check() || auth()->id() !== $post['user_id'])
            return redirect('/');

        $incomingFields = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['content'] = strip_tags($incomingFields['content']);

        $post->update($incomingFields);
        return redirect('/');
    }

    public function deletePost(Post $post)
    {
        if (!auth()->check() || auth()->id() !== $post['user_id'])
            return redirect('/');
        $post->delete();
        return redirect('/');
    }
}
