<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;

class UserController extends Controller
{
    public function login(Request $request)
    {
        return view('login.login');
    }

    public function startLogin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
         ]);
        $queryUser = User::where('email', '=', $request->get('email'))
            ->limit(1)
            ->first();
        if (empty($queryUser)) {
            return back()->withErrors([
                'message' => 'User Already Existed!'
            ]);
        }

        if (Hash::check($request->get('password'), $queryUser->password)) {
            Auth::login($queryUser);
            return view('category.index');
        }

        return back()->withErrors([
            'message' => 'Invalid Credentials'
        ]);
    }

    public function register(Request $request)
    {
        return view('login.register');
    }

    public function startRegister(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
         ]);

        $queryUser = User::where('email', '=', $request->get('email'))
            ->limit(1)
            ->first();
        if (!empty($queryUser)) {
            return back()->withErrors([
                'message' => 'User Already Existed!'
            ]);
        }

        $userData = $request->all();
        $userData['password'] = Hash::make($userData['password']);
        User::create($userData);
        return redirect(route('login.login'));
    }
}
