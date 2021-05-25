<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        return view('site.profile', compact('user'));
    }

    public function store(Request $request)
    {
//         dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'description' => 'required',
            'avatar' => 'nullable|image',
        ]);
        $user = Auth::user();
        $user->removeAvatar();
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));
        return redirect()->back()->with('status', 'Профиль успешно обновлен!!!');
    }
}