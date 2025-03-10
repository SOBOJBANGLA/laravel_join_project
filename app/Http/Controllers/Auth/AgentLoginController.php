<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AgentLoginController extends Controller
{
    public function show_login()
    {
        return view('auth.agentLogin');
    }

    public function show_login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        $remember = ($request->has('remember')) ? true : false;
        $email = strtolower($request->email);


        if (Auth::guard('agent')->attempt(['email' => $email, 'password' => $request->password], $remember)) {
            return redirect(route('agent.dashboard'));
        } else {
            return back()->with('admin_login_alert', 'Invalid Credentials. Please Try Again.');
        }
    }

    public function agent_refer_join($id)
    {
        $ref_id = $id;
        return view('auth.agentReferJoin', compact('ref_id'));
    }

    public function agent_refer_join_save(Request $request)
    {
        $userId = Str::random(16);

        $user = new User();
        $user->agent_id = $request->ref_id;
        $user->firstname = $request->firstname;
        $user->user_id = $userId;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->email_verification = 1;
        $user->sms_verification = 1;
        $user->save();

        return redirect(route('login'));
    }

    public function agent_logout()
    {
        Auth::guard('agent')->logout();
        return redirect(route('agent.login'));
    }
}
