<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends AdminController
{
    public function __construct()
    {
        $this->template = 'admin.index';
    }

    public function index()
    {
        $users = User::all();
        $this->content = view('admin.user.index', compact('users'))->render();
        return $this->renderOutput();
    }

    public function create()
    {
        $this->content = view('admin.user.create')->render();
        return $this->renderOutput();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required',
            'email' =>  'required|email|unique:users',
            'password'  =>  'required',
            'avatar'    =>  'nullable|image'
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);

        $this->content = view('admin.user.edit',compact('user'))->render();
        return $this->renderOutput();
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name'  =>  'required',
            'email' =>  [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'avatar'    =>  'nullable|image'
        ]);

        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));


        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::find($id)->remove();

        return redirect()->route('users.index');
    }
}
