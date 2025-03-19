<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\igtech_game;
use App\Models\jili_game;
use App\Models\saba_game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\CricketGame;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\user_bet_data;

class RapidApiController extends Controller
{

    public function __construct()
    {
        $this->theme = template();
    }

    public function rapid_api_game_list()
    {
        $games = igtech_game::all();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function rapid_api_jili_game_list()
    {
        $games = jili_game::all();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function rapid_api_pg_soft_game_list()
    {
        $games = jili_game::all();
        return view($this->theme . 'allGames.gameList', compact('games'));
    }

    public function rapid_api_game_list_upload(Request $request)
    {

    }


    public function rapid_api_saba_games()
    {
        $games = saba_game::all();
        return view($this->theme . 'igTeck.sabaList', compact('games'));
    }


    public function game_list_url_get()
    {
        $client = new \GuzzleHttp\Client();
        $gdata = [
            "userId" => "Integritygrove123", "gameId" => $game_id, "lang" => "en"
        ];
        $response = $client->request('POST', 'https://evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com/casino/get-game-url', [
            'body' => json_encode($gdata),
            'headers' => [
                'Content-Type' => 'application/json',
                'x-rapidapi-host' => 'evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com',
                'x-rapidapi-key' => config('game.api_key'),
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        return $data;
    }

    public function rapid_api_game_open($id)
    {
        $game_id = $id;
        $client = new \GuzzleHttp\Client();
        $gdata = [
            "userId" => "Integritygrove123", "gameId" => $game_id, "lang" => "en"
        ];
        $response = $client->request('POST', 'https://evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com/casino/get-game-url', [
            'body' => json_encode($gdata),
            'headers' => [
                'Content-Type' => 'application/json',
                'x-rapidapi-host' => 'evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com',
                'x-rapidapi-key' => 'a3aab90d14msh996f3a97a1c893bp1f8aacjsnb261ed4c8cef',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        return $data;
    }

    public function getCricketMatches()
    {
        try {
            $apiKey = '47516bfd0fmsh6a4b4a5f4c0edfbp12a6ecjsnf57aedbd56a9';
            $apiHost = 'cricbuzz-cricket.p.rapidapi.com';

            Log::info('আন্তর্জাতিক ক্রিকেট শিডিউল লোড করা হচ্ছে');

            $response = Http::withHeaders([
                'X-RapidAPI-Host' => $apiHost,
                'X-RapidAPI-Key' => $apiKey
            ])->get('https://cricbuzz-cricket.p.rapidapi.com/matches/v1/live');

            if ($response->successful()) {
                $scheduleData = $response->json();
                
                if (isset($scheduleData['matchScheduleMap'])) {
                    foreach ($scheduleData['matchScheduleMap'] as $scheduleItem) {
                        if (isset($scheduleItem['scheduleAdWrapper'])) {
                            foreach ($scheduleItem['scheduleAdWrapper'] as $schedule) {
                                if (isset($schedule['matchInfo'])) {
                                    $matchInfo = $schedule['matchInfo'];
                                    
                                    // সময় কনভার্ট (মিলিসেকেন্ড থেকে ডেট টাইম)
                                    $startDate = date('Y-m-d', $matchInfo['startDate']/1000);
                                    $startTime = date('H:i:s', $matchInfo['startDate']/1000);
                                    
                                    // টিম ইনফরমেশন
                                    $team1 = $matchInfo['team1'] ?? null;
                                    $team2 = $matchInfo['team2'] ?? null;
                                    
                                    // ম্যাচ ডেটা সেভ/আপডেট
                                    CricketGame::updateOrCreate(
                                        ['match_id' => $matchInfo['matchId']],
                                        [
                                            'title' => $matchInfo['matchDesc'] ?? 'International Match',
                                            'competition' => $matchInfo['seriesName'] ?? '',
                                            'match_date' => $startDate,
                                            'match_time' => $startTime,
                                            'status' => $matchInfo['state'] ?? 'Upcoming',
                                            'teams' => json_encode([
                                                'team1' => [
                                                    'name' => $team1['teamName'] ?? 'Team 1',
                                                    'shortName' => $team1['teamSName'] ?? 'T1',
                                                    'imageId' => $team1['imageId'] ?? null
                                                ],
                                                'team2' => [
                                                    'name' => $team2['teamName'] ?? 'Team 2',
                                                    'shortName' => $team2['teamSName'] ?? 'T2',
                                                    'imageId' => $team2['imageId'] ?? null
                                                ]
                                            ]),
                                            'scores' => json_encode([
                                                'team1' => [
                                                    'runs' => 0,
                                                    'wickets' => 0,
                                                    'overs' => 0
                                                ],
                                                'team2' => [
                                                    'runs' => 0,
                                                    'wickets' => 0,
                                                    'overs' => 0
                                                ]
                                            ]),
                                            'venue' => $matchInfo['venueInfo']['ground'] ?? '',
                                            'match_format' => $matchInfo['matchFormat'] ?? '',
                                            'odds_team1' => 2.0,
                                            'odds_team2' => 2.0,
                                            'odds_draw' => 3.0
                                        ]
                                    );
                                }
                            }
                        }
                    }
                }

                // সব ম্যাচ লোড করে ভিউতে পাঠাই
                $games = CricketGame::orderBy('match_date', 'asc')
                                   ->orderBy('match_time', 'asc')
                                   ->get();
                                   
                return view($this->theme . 'cricket.gameList', compact('games'));
            }

            Log::error('API Error: ' . $response->body());
            return back()->with('error', 'ক্রিকেট শিডিউল লোড করা যায়নি। স্ট্যাটাস: ' . $response->status());

        } catch (\Exception $e) {
            Log::error('Exception: ' . $e->getMessage());
            return back()->with('error', 'ত্রুটি: ' . $e->getMessage());
        }
    }

    public function placeCricketBet(Request $request)
    {
        try {
            Log::info('Cricket Bet Request:', $request->all());

            // ইউজার চেক
            $user = auth()->user();
            if (!$user) {
                return back()->with('error', 'অনুগ্রহ করে লগইন করুন');
            }
            
            // ম্যাচ খুঁজি
            $match = CricketGame::where('match_id', $request->match_id)->first();
            
            if (!$match) {
                return back()->with('error', 'ম্যাচটি খুঁজে পাওয়া যায়নি');
            }

            // ম্যাচ স্ট্যাটাস চেক
            $status = strtolower($match->status);
            if ($status == 'complete' || $status == 'completed') {
                return back()->with('error', 'দুঃখিত, এই ম্যাচটি শেষ হয়ে গেছে। বেট করা যাবে না।');
            }

            if ($status == 'toss') {
                return back()->with('error', 'টস হয়েছে। ম্যাচ শুরু হলে বেট করা যাবে।');
            }

            if ($status != 'in progress' && $status != 'live') {
                return back()->with('error', 'শুধুমাত্র চলমান ম্যাচে বেট করা যাবে');
            }

            // ভ্যালিডেশন
            $validated = $request->validate([
                'match_id' => 'required',
                'bet_amount' => 'required|numeric|min:1',
                'bet_on' => 'required|in:team1,team2',
            ]);

            // বেট এমাউন্ট চেক
            if ($user->balance < $request->bet_amount) {
                return back()->with('error', 'অপর্যাপ্ত ব্যালেন্স');
            }

            // বেট ডেটা সেভ
            $bet = new user_bet_data();
            $bet->user_id = $user->id;
            $bet->bet_amount = $request->bet_amount;
            $bet->game_uid = 'CRICKET_' . $match->match_id;
            $bet->game_round = date('YmdHis') . rand(1000, 9999);
            $bet->member_account = $user->username ?? $user->email;
            $bet->currency_code = config('basic.currency') ?? 'USD';
            $bet->potential_win_amount = $request->bet_amount * 2;
            $bet->win_amount = 0;
            $bet->bet_on = $request->bet_on;
            $bet->match_id = $match->match_id;
            $bet->status = 'pending';
            
            DB::beginTransaction();
            try {
                $bet->save();
                
                // ব্যালেন্স আপডেট
                $user->balance -= $request->bet_amount;
                $user->save();
                
                DB::commit();
                return back()->with('success', 'বেট সফলভাবে প্লেস করা হয়েছে');
                
            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Cricket Bet Transaction Error: ' . $e->getMessage());
                return back()->with('error', 'বেট প্লেস করতে সমস্যা হয়েছে');
            }

        } catch (\Exception $e) {
            Log::error('Cricket Betting Error: ' . $e->getMessage());
            return back()->with('error', 'বেট প্লেস করতে সমস্যা হয়েছে');
        }
    }

    public function getLiveCricketScores()
    {
        try {
            $apiKey = '47516bfd0fmsh6a4b4a5f4c0edfbp12a6ecjsnf57aedbd56a9';
            $apiHost = 'cricbuzz-cricket.p.rapidapi.com';

            $response = Http::withHeaders([
                'X-RapidAPI-Host' => $apiHost,
                'X-RapidAPI-Key' => $apiKey
            ])->get('https://cricbuzz-cricket.p.rapidapi.com/matches/v1/live');

            if ($response->successful()) {
                $matchData = $response->json();
                $updatedMatches = [];
                
                if (isset($matchData['matchScheduleMap'])) {
                    foreach ($matchData['matchScheduleMap'] as $scheduleItem) {
                        if (isset($scheduleItem['scheduleAdWrapper'])) {
                            foreach ($scheduleItem['scheduleAdWrapper'] as $schedule) {
                                if (isset($schedule['matchInfo'])) {
                                    $matchInfo = $schedule['matchInfo'];
                                    $matchScore = $schedule['matchScore'] ?? null;
                                    
                                    // ডাটাবেসে ম্যাচ আপডেট
                                    $match = CricketGame::where('match_id', $matchInfo['matchId'])->first();
                                    
                                    if ($match) {
                                        // স্কোর আপডেট
                                        if ($matchScore) {
                                            $scores = [
                                                'team1' => [
                                                    'runs' => $matchScore['team1Score']['inngs1']['runs'] ?? 0,
                                                    'wickets' => $matchScore['team1Score']['inngs1']['wickets'] ?? 0,
                                                    'overs' => $matchScore['team1Score']['inngs1']['overs'] ?? 0
                                                ],
                                                'team2' => [
                                                    'runs' => $matchScore['team2Score']['inngs1']['runs'] ?? 0,
                                                    'wickets' => $matchScore['team2Score']['inngs1']['wickets'] ?? 0,
                                                    'overs' => $matchScore['team2Score']['inngs1']['overs'] ?? 0
                                                ]
                                            ];
                                            
                                            $match->scores = json_encode($scores);
                                        }
                                        
                                        $match->status = $matchInfo['state'] ?? 'Upcoming';
                                        $match->match_date = date('Y-m-d', $matchInfo['startDate']/1000);
                                        $match->match_time = date('H:i:s', $matchInfo['startDate']/1000);
                                        $match->save();

                                        $updatedMatches[] = [
                                            'match_id' => $match->match_id,
                                            'status' => $match->status,
                                            'scores' => json_decode($match->scores, true),
                                            'match_date' => $match->match_date,
                                            'match_time' => $match->match_time
                                        ];
                                    }
                                }
                            }
                        }
                    }
                }
                
                return response()->json([
                    'success' => true,
                    'matches' => $updatedMatches
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'API কল ব্যর্থ হয়েছে'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'স্কোর আপডেট করতে সমস্যা: ' . $e->getMessage()
            ]);
        }
    }
}
