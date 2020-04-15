<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //创建用户页面
    public function create()
    {
        return view('users/create');
    }

    //个人页面
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    //创建用户表单提交验证
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        return;
    }
}
