<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_bet_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{


    public function game_callback(Request $request)
    {


        $user = User::where('user_id', $request->member_account)->first();
        //        Log::info($user);
        if ($user) {

            if ($request->bet_amount == 0) {
                $final_amount = $request->bet_amount;
            } else {
                $final_amount = $request->bet_amount;
            }


            if ($request->win_amount == 0) {
                $win_amount = $request->win_amount;
            } else {
                $win_amount = $request->win_amount;
            }


            $user->balance = $user->balance + $win_amount;
            if ($user->balance <= 0) {
            } else {
                $user->balance = $user->balance - $final_amount;
            }

            $user->save();

            $user_info = User::where('id', $user->id)->first();

            $check_bet = user_bet_data::where('game_round', $request->game_round)->first();
            if ($check_bet) {
                $check_bet->bet_amount = $request->bet_amount;
                $check_bet->win_amount = $request->win_amount;
                $check_bet->save();
            } else {
                $user_bet = new user_bet_data();
                $user_bet->user_id = $user_info->id;
                $user_bet->bet_amount = $request->bet_amount;
                $user_bet->win_amount = $request->win_amount;
                $user_bet->member_account = $request->member_account;
                $user_bet->game_uid = $request->game_uid;
                $user_bet->game_round = $request->game_round;
                $user_bet->serial_number = $request->serial_number;
                $user_bet->currency_code = $request->currency_code;
                $user_bet->save();
            }



            if ($user_info->balance > 0) {
                return response()->json([
                    "success" => true,
                    "message" => "CallBack Receive",
                    "handle" => true,
                    "money" => $user_info->balance * 10
                ]);
            } else {
                return response()->json([
                    "success" => true,
                    "message" => "CallBack Receive",
                    "handle" => true,
                    "money" => $user_info->balance
                ]);
            }


            //            Log::info($request);

        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
