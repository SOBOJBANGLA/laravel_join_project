<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\api_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterUserController extends Controller
{
    public function create_user()
    {


        $user = User::where('id', Auth::user()->id)->first();

        $userId = Str::random(16);
        $userId = substr(Str::random(32), 0, random_int(16, 32));

//        return $uid;


        $client = new \GuzzleHttp\Client();

        $user_data = [
            "userId" => $userId,
        ];

//        return $user_data;


        $response = $client->request('POST', 'https://evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com/casino/create-user', [
            'body' => json_encode($user_data),
            'headers' => [
                'Content-Type' => 'application/json',
                'x-rapidapi-host' => 'evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com',
                'x-rapidapi-key' => '30f0134738msh75c0c3a0e4813b1p13504ajsnb628a3063d59',
            ],
        ]);

        $res_data = json_decode($response->getBody()->getContents(), true);


        $new_api_user = new api_user();
        $new_api_user->user_id = Auth::user()->id;
        $new_api_user->api_user_id = $res_data['newUser']['userId'];
        $new_api_user->manager = $res_data['newUser']['manager'];
        $new_api_user->save();

        return $res_data;
    }
}
