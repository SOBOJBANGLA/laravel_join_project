<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public function register()
    {
        return view('front.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:users,phone',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user_register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('user_login_form')->with('success', 'Registration successful! Please log in.');
    }

    public function login(Request $request){
       
        return view('front.login');
    }

    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('user_profile');
            } else {
                return redirect()->route('candidate_login_form')->with('error','Either Email/Password is incorrect');
            }
        } else {
            return redirect()->route('candidate_login_form')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }
}
