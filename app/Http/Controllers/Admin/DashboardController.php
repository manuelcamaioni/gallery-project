<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tag;
use App\Models\Report;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index(){
        $users = User::all();
        $tags = Tag::all();
        $reports = Report::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(30);
        return view('admin.home', compact('users', 'posts', 'tags', 'reports'));
    }
}
