<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function get_all_sports()
    {
//        $client = new \GuzzleHttp\Client();
//
//        $response = $client->request('GET', 'https://betfair-sports-casino-live-tv-result-odds.p.rapidapi.com/api/allSportsID', [
//            'headers' => [
//                'x-rapidapi-host' => 'betfair-sports-casino-live-tv-result-odds.p.rapidapi.com',
//                'x-rapidapi-key' => '03bfde86d4msh2fe82b717cc6ebfp14eb36jsn15528a266c22',
//            ],
//        ]);
//
//        return $response->getBody();
    }


    public function get_all_play_match()
    {
//        $client = new \GuzzleHttp\Client();
//
//        $response = $client->request('GET', 'https://betfair-sports-casino-live-tv-result-odds.p.rapidapi.com/api/home', [
//            'headers' => [
//                'x-rapidapi-host' => 'betfair-sports-casino-live-tv-result-odds.p.rapidapi.com',
//                'x-rapidapi-key' => '33722769e0msh8f7d3d247252b07p167304jsn33824e92915b',
//            ],
//        ]);
//
//        return $response->getBody();
    }


    public function get_market_data()
    {
//        $client = new \GuzzleHttp\Client();
//
//        $response = $client->request('GET', 'https://betfair-sports-casino-live-tv-result-odds.p.rapidapi.com/api/getEvents?sportid=4&sid=101480', [
//            'headers' => [
//                'x-rapidapi-host' => 'betfair-sports-casino-live-tv-result-odds.p.rapidapi.com',
//                'x-rapidapi-key' => '33722769e0msh8f7d3d247252b07p167304jsn33824e92915b',
//            ],
//        ]);
//
//        return $response->getBody();
    }


    public function get_live_casino()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://diamond-betting-api.p.rapidapi.com/casino/tv?id=trap', [
            'headers' => [
                'x-rapidapi-host' => 'diamond-betting-api.p.rapidapi.com',
                'x-rapidapi-key' => 'a3aab90d14msh996f3a97a1c893bp1f8aacjsnb261ed4c8cef',
            ],
        ]);

        return $response->getBody();
    }


    public function get_game_url()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com/casino/get-game-url', [
            'body' => '{"userId":"Integritygrove123","gameId":"1189baca156e1bbbecc3b26651a63565","lang":"en"}',
            'headers' => [
                'Content-Type' => 'application/json',
                'x-rapidapi-host' => 'evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com',
                'x-rapidapi-key' => 'a3aab90d14msh996f3a97a1c893bp1f8aacjsnb261ed4c8cef',
            ],
        ]);

        $data = $response->getBody();
        $a = json_decode($data, true);
        return redirect($a['payload']['game_launch_url']);

    }


    public function dmd_all_data()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://diamond-betting-api.p.rapidapi.com/casino/data?type=trap', [
            'headers' => [
                'x-rapidapi-host' => 'diamond-betting-api.p.rapidapi.com',
                'x-rapidapi-key' => 'a3aab90d14msh996f3a97a1c893bp1f8aacjsnb261ed4c8cef',
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }


    public function dmd_all_table_id()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://diamond-betting-api.p.rapidapi.com/casino/tableid', [
            'headers' => [
                'x-rapidapi-host' => 'diamond-betting-api.p.rapidapi.com',
                'x-rapidapi-key' => 'a3aab90d14msh996f3a97a1c893bp1f8aacjsnb261ed4c8cef',
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }


    public function dmd_live_casino()
    {


        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://diamond-betting-api.p.rapidapi.com/casino/tv?id=trap', [
            'headers' => [
                'x-rapidapi-host' => 'diamond-betting-api.p.rapidapi.com',
                'x-rapidapi-key' => 'a3aab90d14msh996f3a97a1c893bp1f8aacjsnb261ed4c8cef',
            ],
        ]);

        echo $response->getBody();
    }


}
