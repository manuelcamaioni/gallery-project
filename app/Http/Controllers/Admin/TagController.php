<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tag;
use App\Models\Post;

class TagController extends Controller
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
        return view('admin.tagCrud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validated = Validator::make($data, [
            'name' => ['required', 'string'],
        ]);

        $newTag = User::create($data);
        $newTag->save();

        return redirect()->route('admin.home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $posts = Post::whereHas('tags', function ($query) use ($tag) {
            $query->where('id', $tag->id);
        })->paginate(30);
        return view('admin.tagCrud.show', compact('tag', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tagCrud.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->all();
        $validated = Validator::make($data, [
            'name' => ['required', 'string'],
        ]);

        $tag->update($data);

        return redirect()->route('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        if (request()->has('confirmed')) {

           $tag->delete();
            return redirect()->route('admin.home');
        } else {
            return redirect()->back();
        }

        return redirect()->route('admin.home');
    }
}
