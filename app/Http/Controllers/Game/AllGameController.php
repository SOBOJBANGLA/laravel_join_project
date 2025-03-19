<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\api_user;
use App\Models\casino_evo;
use App\Models\casino_pg_soft;
use App\Models\casino_pp;
use App\Models\casino_sexy;
use App\Models\ContentDetails;
use App\Models\cqnine;
use App\Models\crash_game;
use App\Models\dream_gaming;
use App\Models\easy_gaming;
use App\Models\esport;
use App\Models\evolution_live;
use App\Models\ezugi_live;
use App\Models\fachai_gaming;
use App\Models\GameCategory;
use App\Models\home_game;
use App\Models\ideal;
use App\Models\jbl;
use App\Models\jili_game;
use App\Models\lottery;
use App\Models\luck_sport;
use App\Models\pg_soft_game;
use App\Models\pgs;
use App\Models\pragmatic;
use App\Models\pragmatic_play_live;
use App\Models\sa_gaming;
use App\Models\saba_game;
use App\Models\sexy;
use App\Models\slot_pragmatic_play;
use App\Models\sport_bti;
use App\Models\spribe;
use App\Models\table_game;
use App\Models\tada;
use App\Models\Template;
use App\Models\united_sport;
use App\Models\User;
use App\Models\wm_sport;
use App\Models\xgame;
use App\Models\yea_bet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AllGameController extends Controller
{
    public function __construct()
    {
        $this->theme = template();
    }

    public function home()
    {

//        $users = User::all();
//        foreach ($users as $user) {
//            $userId = Str::random(16);
//            $user_update = User::where('id', $user->id)->first();
//            $user_update->user_id = $userId;
//            $user_update->save();
//        }


        $games = home_game::get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function dream_gaming()
    {
        $games = dream_gaming::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function evolution_live()
    {
        $games = evolution_live::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();

        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function ezugi_live()
    {
        $games = ezugi_live::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function pragmatic_play_live()
    {
        $games = pragmatic_play_live::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function sa_gaming()
    {
        $games = sa_gaming::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function sexy()
    {
        $games = sexy::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function crash_game()
    {
        $games = crash_game::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function spribe()
    {
        $games = spribe::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function x_game()
    {
        $games = xgame::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function cqnine()
    {
        $games = cqnine::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function easy_gaming()
    {
        $games = easy_gaming::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function fachai_gaming()
    {
        $games = fachai_gaming::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function ideal_gaming()
    {
        $games = ideal::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function jbl_gaming()
    {
        $games = jbl::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function jili_gaming()
    {
        $games = jili_game::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function pg_soft_gaming()
    {
        $games = pg_soft_game::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function pgs_gaming()
    {
        $games = pgs::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function pragmatic_gaming()
    {
        $games = pragmatic::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function tada_gaming()
    {
        $games = tada::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function yea_bet()
    {
        $games = yea_bet::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function bti()
    {
        $games = sport_bti::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function esports()
    {
        $games = esport::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function luck_sport()
    {
        $games = luck_sport::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function saba_sport()
    {
        $games = saba_game::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function united_sport()
    {
        $games = united_sport::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function wm()
    {
        $games = wm_sport::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function table_game()
    {
        $games = table_game::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function lottery()
    {
        $games = lottery::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }


    public function game_open($id)
    {
        if (strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'android')) {
            $device_type = 2;
        } else {
            $device_type = 1;
        }

        $user = User::where('id', Auth::user()->id)->first();
        $am = $user->balance * 1;
        $balance = number_format($am, 2);
        $remove_comma = str_replace(',', '', $balance);

        $rount_am = round($remove_comma);


        if ($rount_am < 10) {
            return back()->with('error', 'Insufficient Balance');
        }

//        return round($remove_comma);
//        return $remove_comma;
//        if ($user->balance == 0) {
//            return redirect(route('evolution.live'))->with('alert', 'Insufficient Balance');
//        }


        $client = new \GuzzleHttp\Client();

        $game_id = $id;
//        $api_user = api_user::where('id', 2)->first();
        $api_user = User::where('id', Auth::user()->id)->first();
        $body = [
            "userId" => $user->user_id,
            "gameId" => $game_id,
            "lang" => "en",
            "money" => round($remove_comma),
            "home_url" => "https://.igtechgaming.com/",
            "platform" => $device_type,
        ];


//        $response = $client->request('POST', 'https://live-casino-slots-evolution-jili-and-50-plus-provider.p.rapidapi.com/casino/get-game-url', [
//            'body' => json_encode($body),
//            'headers' => [
//                'Content-Type' => 'application/json',
//                'x-rapidapi-host' => 'live-casino-slots-evolution-jili-and-50-plus-provider.p.rapidapi.com',
//                'x-rapidapi-key' => '677ac35f75e1d2546de1f19a',
//            ],
//        ]);


        $response = $client->request('POST', 'https://igtechcasinoprod.igtechgaming.com/casino/get-game-url', [
            'body' => json_encode($body),
            'headers' => [
                'Content-Type' => 'application/json',
                'x-igtechcasino-apikey' => '677ac35f75e1d2546de1f19a',
            ],
        ]);

        $gam_data = json_decode($response->getBody(), true);

        if ($gam_data['code'] == 0) {
            $game_url = $gam_data['payload']['game_launch_url'];
            return redirect($game_url);
        } else {
            return $gam_data['msg'];
        }
        echo $response->getBody();
    }


    public function get_game_url(Request $request)
    {
        return '';
    }


    public function casino_evo_game_open($id)
    {

        return '';

//        $client = new \GuzzleHttp\Client();
//        $game_id = $id;
//        $api_user = api_user::where('id', 2)->first();
//        $body = [
//            "userId" => $api_user->api_user_id,
//            "gameId" => $game_id,
//            "lang" => "en",
//        ];
//
//
//        $response = $client->request('POST', 'https://evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com/casino/get-game-url', [
//            'body' => json_encode($body),
//            'headers' => [
//                'Content-Type' => 'application/json',
//                'x-rapidapi-host' => 'evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com',
//                'x-rapidapi-key' => config('game.api_key'),
//            ],
//        ]);
//
//        $gam_data = json_decode($response->getBody(), true);
//
//        if ($gam_data['code'] == 0) {
//            $game_url = $gam_data['payload']['game_launch_url'];
//            return redirect($game_url);
//        } else {
//            return $gam_data['msg'];
//        }
    }

    public function game_callback(Request $request)
    {
        return $request;
//        Log::info($request);
//        return $request;
//        return 'callback';
    }

}
