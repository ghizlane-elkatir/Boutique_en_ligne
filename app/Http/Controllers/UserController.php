<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function create() {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'avatar' => ['file', 'mimes:png,jpeg,jpg'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $uploadedFile = $request->file('avatar');
        $result = Cloudinary::upload($uploadedFile->getRealPath());
        
        $imageUrl = $result->getSecurePath();
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $imageUrl,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('client');
        // dd($user);
        return to_route('admin.users.show');
    }
    public function update(Request $request,User $user) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'avatar' => ['required', 'file', 'mimes:png,jpeg,jpg'],
            'password' => ['required', Rules\Password::defaults()],
        ]);
        $uploadedFile = $request->file('avatar');
        $result = Cloudinary::upload($uploadedFile->getRealPath());
        
        $imageUrl = $result->getSecurePath();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $imageUrl,
            'password' => Hash::make($request->password),
        ]);
        return to_route('admin.users.show');
    }
    public function edit(Request $request, User $user) {
        return view('admin.users.edit', compact('user'));
    }
    public function destroy(User $user) {
        $users = User::all();

        $user->delete();
        return back()->with('message', 'User Deleted Successfully');
    }
}
