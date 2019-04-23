<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends SiteController
{
    public function __construct()
    {
        $this->template = 'front.index';
    }

    public function index()
    {
        $user = Auth::user();

        $this->content = view('front.profile',compact('user'))->render();
        return $this->renderOutput();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'	=>	'required',
            'email' =>  [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'avatar'	=>	'nullable|image'
        ]);

        $user = Auth::user();
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->back()->with('status', 'Профиль успешно обновлен');
    }
}
