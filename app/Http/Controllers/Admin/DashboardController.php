<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tag;

class DashboardController extends Controller
{
    public function index(){
        $users = User::all();
        $tags = Tag::all();
        return view('admin.home', compact('users', 'tags'));
    }
}
