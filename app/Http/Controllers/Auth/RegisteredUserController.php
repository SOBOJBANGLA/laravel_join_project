<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('front.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //dd($request->all());
        $request->validate([
            'phone' => 'required|unique:users,phone', 
            'country_code' => 'required', 
            'password' => 'required|min:6', 
        ]);
    
        $fullPhone = $request->country_code . $request->phone; 
        $phoneCode = $request->phone; 
    
        $user = User::create([
            'phone' => $fullPhone,  
            'country_code' => $request->country_code,  
            'phone_code' => $phoneCode, 
            'password' => Hash::make($request->password), 
        ]);
    
    

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
