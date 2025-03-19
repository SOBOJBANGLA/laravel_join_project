<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GameResponseController extends Controller
{
    public function game_callback(Request $request)
    {
        Log::info($request);
        return $request;
//        Log::info($request);
//        return $request;
//        return 'callback';
    }
}
