<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showForm()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->only(['name', 'email', 'password']);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('/login')->with('message','ユーザー登録が完了しました！');
    }
}
