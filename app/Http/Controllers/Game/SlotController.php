<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\api_user;
use App\Models\jili_game;
use App\Models\saba_game;
use App\Models\sport_evolution;
use Illuminate\Http\Request;

class SlotController extends Controller
{

    public function __construct()
    {
        $this->theme = template();
    }

    public function slot_jili()
    {
        $games = jili_game::all();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function slot_game_open($id)
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

        $res_data = json_decode($response->getBody(), true);
        $game_url = $res_data['payload']['game_launch_url'];
        return redirect($game_url);
    }


    public function slot_every_paid()
    {
        $games = sport_evolution::where('game_icon', '!=', '?')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function slot_evolution_live_open($id)
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

        $gam_data = json_decode($response->getBody(), true);
        $game_url = $gam_data['payload']['game_launch_url'];
        return redirect($game_url);
    }
}
