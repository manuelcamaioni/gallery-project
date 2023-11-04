<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags= Tag::all();
        $users = User::all();
        return view('admin.postCrud.create', compact('tags', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validated = Validator::make($data, [
            'name' => ['required', 'string'],
            'user_id' => ['required'],
            'image' => ['required', 'url'],
            'visible' => ['boolean'],
            'tags' => ['array', 'min:1', 'required']
        ]);


        $newPost = Post::create($data);
        $newPost->save();

        $newPost->tags()->sync($data['tags']);

        return redirect()->route('admin.home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.postCrud.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $tags= Tag::all();
        $users = User::all();
        return view('admin.postCrud.edit', compact('post', 'tags', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $validated = Validator::make($data, [
            'name' => ['required', 'string'],
            'user_id' => ['required'],
            'image' => ['required', 'url'],
            'visible' => ['boolean'],
            'tags' => ['array', 'min:1', 'required']
        ]);


        $post->update($data);
        $post->tags()->sync($data['tags']);

        return redirect()->route('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.home');
    }
}
