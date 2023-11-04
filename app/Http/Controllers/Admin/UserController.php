<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        return view('admin.userCrud.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validated = Validator::make($data, [
            'name' => ['required', 'string'],
            'email' => ['email', 'unique:users', 'required', 'min:5', 'max:50'],
            'password' => ['required', 'string', 'min:8', 'max:30'],
            'isAdmin' => ['boolean'],
            'gender' => ['string', 'max:1']
        ]);

        $newUser = User::create($data);
        $newUser->save();

        return redirect()->route('admin.home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.userCrud.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $validated = Validator::make($data, [
            'name' => ['required', 'string'],
            'email' => ['email', 'unique:users', 'required', 'min:5', 'max:50'],
            'password' => ['required', 'string', 'min:8', 'max:30'],
            'isAdmin' => ['boolean']
        ]);

        $user->update($data);
        return redirect()->route('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.home');
    }
}
