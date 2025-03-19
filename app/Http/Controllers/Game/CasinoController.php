<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\api_user;
use App\Models\casino_evo;
use App\Models\casino_pg_soft;
use App\Models\casino_pp;
use App\Models\casino_sexy;
use App\Models\ezugi_live;
use App\Models\jili_game;
use Illuminate\Http\Request;

class CasinoController extends Controller
{
    public function __construct()
    {
        $this->theme = template();
    }

    public function casino_pp()
    {
        $games = casino_pp::where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function casino_evo()
    {
        $games = casino_evo::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function casino_sexy()
    {
        $games = casino_sexy::all();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function casino_evo_game_open($id)
    {
        $client = new \GuzzleHttp\Client();

        $game_id = $id;

        $api_user = api_user::where('id', 2)->first();

        $body = [
            "userId" => $api_user->api_user_id,
            "gameId" => $game_id,
            "lang" => "en"
        ];


        $response = $client->request('POST', 'https://evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com/casino/get-game-url', [
//            'body' => '{"userId":"Integritygrove123","gameId":"1189baca156e1bbbecc3b26651a63565","lang":"en"}',
            'body' => json_encode($body),
            'headers' => [
                'Content-Type' => 'application/json',
                'x-rapidapi-host' => 'evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com',
                'x-rapidapi-key' => config('game.api_key'),
            ],
        ]);


//        return $response->getBody();

        $gam_data = json_decode($response->getBody(), true);

        if ($gam_data['code'] == 0) {
            $game_url = $gam_data['payload']['game_launch_url'];
            return redirect($game_url);
        } else {
            return $gam_data['msg'];
        }


    }

    public function casino_pg_soft()
    {
        $games = casino_pg_soft::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function eguzi_live()
    {
        $games = ezugi_live::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }
}
