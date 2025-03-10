<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Agent;
use App\Models\Fund;
use App\Models\fund_transfer;
use App\Models\PayoutLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AgentController extends Controller
{
    public function index()
    {
        $user = User::where('agent_id', Auth::user()->agent_id)->count();
        return view('agent.index', compact('user'));
    }

    public function create_user()
    {
        return view('agent.user.createUser');
    }

    public function create_user_save(Request $request)
    {
        $userId = Str::random(16);

        $user = new User();
        $user->agent_id = Auth::user()->agent_id;
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

        return back()->with('success', 'User Created Successfully');
    }

    public function all_users()
    {

        $users = User::where('agent_id', Auth::user()->agent_id)->paginate(20);
        return view('agent.user.allUsers', compact('users'));
    }

    public function user_deposit()
    {
        $users = User::where('agent_id', Auth::user()->agent_id)->get();

        $array = [];

        foreach ($users as $user) {
            array_push($array, $user->id);
        }

        $users_deposit = Fund::whereIn('user_id', $array)->with(['user', 'gateway'])->paginate(20);

        return view('agent.deposit.userDeposit', compact('users_deposit'));
    }

    public function user_deposit_update(Request $request)
    {
        $dep = Fund::where('id', $request->dep_id)->first();
        $dep->status = $request->status;
        $dep->save();

        if ($request->status == 1) {
            $user = User::where('id', $dep->user_id)->first();
            $user->balance = $user->balance + $dep->amount;
            $user->save();
        }

        return back()->with('success', 'Deposit Successfully Updated');
    }

    public function user_withdraw()
    {
        $users = User::where('agent_id', Auth::user()->agent_id)->get();

        $array = [];

        foreach ($users as $user) {
            array_push($array, $user->id);
        }

        $users_deposit = PayoutLog::whereIn('user_id', $array)->with('user')->paginate(20);

        return view('agent.deposit.userWithdraw', compact('users_deposit'));
    }


    public function user_withdraw_update(Request $request)
    {
        $dep = PayoutLog::where('id', $request->dep_id)->first();
        $dep->status = $request->status;
        $dep->save();

        if ($request->status == 1) {
            $user = User::where('id', $dep->user_id)->first();
            $user->balance = $user->balance - $dep->amount;
            $user->save();
        }

        return back()->with('success', 'Deposit Successfully Updated');
    }

    public function fund()
    {
        $users = User::where('agent_id', Auth::user()->agent_id)->get();
        $funds = fund_transfer::where('agent_id', Auth::user()->id)
            ->where('send_by', '!=', 'admin')
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('agent.deposit.userFund', compact('users', 'funds'));
    }

    public function transfer_fund_update(Request $request)
    {

        $agent = Agent::where('id', Auth::user()->id)->first();


        $fund = fund_transfer::where('id', $request->dep_id)->first();

        if ($agent->balance < $fund->amount) {
            return back()->with('error', "Insufficient Balance");
        }

        $fund->status = $request->status;
        $fund->save();

        // 1 for deposit
        // 2 for withdraw
        if ($fund->type == 1) {
            if ($request->status == 1) {
                $user = User::where('user_id', $fund->user_id)->first();
                $user->balance = $user->balance + $fund->balance;
                $user->save();


                $agent->balance = $agent->balance + $fund->balance;
                $agent->save();
            }

        }

        if ($fund->type == 2) {
            if ($request->status == 1) {
                $user = User::where('user_id', $fund->user_id)->first();

                $agent->balance = $agent->balance - $fund->balance;
                $agent->save();
            }

        }


        return back()->with('success', 'Fund Updated');
    }

    public function fund_history()
    {
        $funds = fund_transfer::where('agent_id', Auth::user()->id)
            ->where('send_to', 'user')
            ->where('send_by', 'agent')
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('agent.deposit.fundSend', compact('funds'));
    }

    public function fund_send_save(Request $request)
    {
        $agent = Agent::where('id', Auth::user()->id)->first();


        if ($agent->balance <= 0) {
            return back()->with('error', 'Insufficient Balance');
        }

        $agent->balance = $agent->balance - $request->amount;
        $agent->save();

        $admin = Admin::where('id', 1)->first();
        $admin->balance = $admin->balance + $request->amount;
        $admin->save();

        $transfer = new fund_transfer();
        $transfer->user_id = 0;
        $transfer->agent_id = $agent->id;
        $transfer->amount = $request->amount;
        $transfer->send_by = 'agent';
        $transfer->save();


        return back()->with('success', 'Fund Successfully Transfered');

    }


    public function fund_send_user(Request $request)
    {
        $agent = Agent::where('id', Auth::user()->id)->first();

        if ($request->user_id == '' || $request->amount == '') {
            return back()->with('error', 'Please fill all the field');
        }


        if ($agent->balance < $request->amount || $agent->balance <= 0) {
            return back()->with('error', 'Insufficient Balance');
        }

        $fund = new fund_transfer();
        $fund->user_id = $request->user_id;
        $fund->agent_id = Auth::user()->id;
        $fund->amount = $request->amount;
        $fund->send_to = 'user';
        $fund->send_by = 'agent';
        $fund->type = 1;
        $fund->status = 1;
        $fund->save();


        $user = User::where('id', $request->user_id)->first();
        if ($user) {
            $user->balance = $user->balance + $request->amount;
            $user->save();

            $agent->balance = $agent->balance - $request->amount;
            $agent->save();

        }

        return back()->with('success', 'Fund Successfully Send');

    }


}
