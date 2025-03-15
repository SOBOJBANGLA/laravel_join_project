<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\evolution_live;
use App\Models\GameCategory;
use App\Models\GameMatch;
use App\Models\Language;
use App\Models\Template;
use App\Models\Subscriber;
use App\Http\Traits\Notify;
use Illuminate\Http\Request;
use App\Models\ContentDetails;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    use Notify;

    public function __construct()
    {
        $this->theme = template();
    }


    public function index()
    {
        $templateSection = ['hero', 'contact-us'];
        $data['templates'] = Template::templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');

        $contentSection = ['slider'];
        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');

        $data['gameCategories'] = GameCategory::with(['activeTournament'])->withCount('gameActiveMatch')->whereStatus(1)->orderBy('game_active_match_count', 'desc')->get();

//        $games = $this->get_all_sports();

//        $data['games'] = $games;

//        return $data['games'][0]['name'];
        $data['games'] = evolution_live::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();

        return view($this->theme . 'home', $data);
   
    }


    public function open_game_by_name()
    {
        $templateSection = ['hero', 'contact-us'];
        $data['templates'] = Template::templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');

        $contentSection = ['slider'];
        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');

        $data['gameCategories'] = GameCategory::with(['activeTournament'])->withCount('gameActiveMatch')->whereStatus(1)->orderBy('game_active_match_count', 'desc')->get();

//        $games = $this->get_all_sports();

//        $data['games'] = $games;

//        return $data['games'][0]['name'];
        $data['games'] = evolution_live::where('game_icon', '!=', '?')->where('game_icon', '!=', '')->get();

        return view($this->theme . 'home', $data);
    }


    public function get_all_sports()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://betfair-sports-casino-live-tv-result-odds.p.rapidapi.com/api/allSportsID', [
            'headers' => [
                'x-rapidapi-host' => 'betfair-sports-casino-live-tv-result-odds.p.rapidapi.com',
                'x-rapidapi-key' => '03bfde86d4msh2fe82b717cc6ebfp14eb36jsn15528a266c22',
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }


    public function category($slug = null, $id)
    {
        $contentSection = ['slider'];
        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');
        $data['gameCategories'] = GameCategory::with(['activeTournament'])->withCount('gameActiveMatch')->whereStatus(1)->orderBy('game_active_match_count', 'desc')->get();
        return view($this->theme . 'home', $data);
    }


    public function tournament($slug = null, $id)
    {
        $contentSection = ['slider'];
        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');
        $data['gameCategories'] = GameCategory::with(['activeTournament'])->withCount('gameActiveMatch')->whereStatus(1)->orderBy('game_active_match_count', 'desc')->get();
        return view($this->theme . 'home', $data);
    }

    public function match($slug = null, $id)
    {
        $contentSection = ['slider'];
        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');
        $data['gameCategories'] = GameCategory::with(['activeTournament'])->withCount('gameActiveMatch')->whereStatus(1)->orderBy('game_active_match_count', 'desc')->get();
        return view($this->theme . 'home', $data);
    }


    public function about()
    {

        $templateSection = ['about-us', 'testimonial'];
        $data['templates'] = Template::templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');

        $contentSection = ['testimonial'];
        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');
        return view($this->theme . 'about', $data);
    }


    public function blog()
    {
        $data['title'] = "Blog";
        $contentSection = ['blog'];

        $templateSection = ['blog'];
        $data['templates'] = Template::templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');

        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');
        return view($this->theme . 'blog', $data);
    }

    public function blogDetails($slug = null, $id)
    {
        $getData = Content::findOrFail($id);

        $contentSection = [$getData->name];
        $contentDetail = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->where('content_id', $getData->id)
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');

        $singleItem['title'] = @$contentDetail[$getData->name][0]->description->title;
        $singleItem['description'] = @$contentDetail[$getData->name][0]->description->description;
        $singleItem['date'] = dateTime(@$contentDetail[$getData->name][0]->created_at, 'd M, Y');
        $singleItem['image'] = getFile(config('location.content.path') . @$contentDetail[$getData->name][0]->content->contentMedia->description->image);


        $contentSectionPopular = ['blog'];
        $popularContentDetails = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->where('content_id', '!=', $getData->id)
            ->whereHas('content', function ($query) use ($contentSectionPopular) {
                return $query->whereIn('name', $contentSectionPopular);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');


        return view($this->theme . 'blogDetails', compact('singleItem', 'popularContentDetails'));
    }


    public function faq()
    {

        $templateSection = ['faq'];
        $data['templates'] = Template::templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');

        $contentSection = ['faq'];
        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');

        $data['increment'] = 1;
        return view($this->theme . 'faq', $data);
    }

    public function contact()
    {
        $templateSection = ['contact-us'];
        $templates = Template::templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');
        $title = 'Contact Us';
        $contact = @$templates['contact-us'][0]->description;

        return view($this->theme . 'contact', compact('title', 'contact'));
    }

    public function contactSend(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|max:91',
            'subject' => 'required|max:100',
            'message' => 'required|max:1000',
        ]);
        $requestData = Purify::clean($request->except('_token', '_method'));

        $basic = (object)config('basic');
        $basicEmail = $basic->sender_email;

        $name = $requestData['name'];
        $email_from = $requestData['email'];
        $subject = $requestData['subject'];
        $message = $requestData['message'] . "<br>Regards<br>" . $name;
        $from = $email_from;

        $headers = "From: <$from> \r\n";
        $headers .= "Reply-To: <$from> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $to = $basicEmail;

        if (@mail($to, $subject, $message, $headers)) {
            // echo 'Your message has been sent.';
        } else {
            //echo 'There was a problem sending the email.';
        }

        return back()->with('success', 'Mail has been sent');
    }

    public function getLink($getLink = null, $id)
    {
        $getData = Content::findOrFail($id);

        $contentSection = [$getData->name];
        $contentDetail = ContentDetails::select('id', 'content_id', 'description', 'created_at')
            ->where('content_id', $getData->id)
            ->whereHas('content', function ($query) use ($contentSection) {
                return $query->whereIn('name', $contentSection);
            })
            ->with(['content:id,name',
                'content.contentMedia' => function ($q) {
                    $q->select(['content_id', 'description']);
                }])
            ->get()->groupBy('content.name');

        $title = @$contentDetail[$getData->name][0]->description->title;
        $description = @$contentDetail[$getData->name][0]->description->description;
        return view($this->theme . 'getLink', compact('contentDetail', 'title', 'description'));
    }

    public function subscribe(Request $request)
    {
        $rules = [
            'email' => 'required|email|max:255|unique:subscribers'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect(url()->previous() . '#subscribe')->withErrors($validator);
        }
        $data = new Subscriber();
        $data->email = $request->email;
        $data->save();
        return redirect(url()->previous() . '#subscribe')->with('success', 'Subscribed Successfully');
    }

    public function language($code)
    {
        $language = Language::where('short_name', $code)->first();
        if (!$language) $code = 'US';
        session()->put('trans', $code);
        session()->put('rtl', $language ? $language->rtl : 0);
        return redirect()->back();
    }

    public function betResult()
    {
        $data['betResult'] = GameMatch::with(['gameQuestions.gameOptionResult', 'gameTeam1', 'gameTeam2'])
            ->whereHas('gameQuestions.gameOptionResult', function ($qq) {
                $qq->where('result', '1');
            })
            ->where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        return view($this->theme . 'user.betResult.index', $data);
    }


    public function live_casino()
    {
        $data['gameCategories'] = GameCategory::with(['activeTournament'])->withCount('gameActiveMatch')->whereStatus(1)->orderBy('game_active_match_count', 'desc')->get();

        $game_url = $this->casino_game_url();
//        return $game_url;
        $dataa = $game_url;

        $data = $dataa['stream_url'];


        return view($this->theme . 'liveCasilo', compact('data'));
    }


    public function casino_game_url()
    {
        $client = new \GuzzleHttp\Client();

//        $response = $client->request('POST', 'https://evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com/casino/get-game-url', [
//            'body' => '{"userId":"Integritygrove123","gameId":"1189baca156e1bbbecc3b26651a63565","lang":"en"}',
//            'headers' => [
//                'Content-Type' => 'application/json',
//                'x-rapidapi-host' => 'evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com',
//                'x-rapidapi-key' => 'a3aab90d14msh996f3a97a1c893bp1f8aacjsnb261ed4c8cef',
//            ],
//        ]);


        $response = $client->request('GET', 'https://diamond-casino.p.rapidapi.com/api/casino/stream?name=Andarbahar', [
            'headers' => [
                'x-rapidapi-host' => 'diamond-casino.p.rapidapi.com',
                'x-rapidapi-key' => '03bfde86d4msh2fe82b717cc6ebfp14eb36jsn15528a266c22',
            ],
        ]);


        $data = $response->getBody();
        $a = json_decode($data, true);

        return $a;

        return redirect($a['payload']['game_launch_url']);

    }

    public function jili_game()
    {

        $j_games = $this->jili_game_get();
        $data = $j_games['data'];

//        return $data;

        return view($this->theme . 'jiliGames', compact('data'));
    }


    public function jili_game_get()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://jili-slots-casino-api-coin-base-more-then-180-games.p.rapidapi.com/jili/get-all-jili-bets', [
            'headers' => [
                'x-rapidapi-host' => 'jili-slots-casino-api-coin-base-more-then-180-games.p.rapidapi.com',
                'x-rapidapi-key' => '03bfde86d4msh2fe82b717cc6ebfp14eb36jsn15528a266c22',
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }


    public function jili_game_open($id)
    {
        $game_id = $id;
        $client = new \GuzzleHttp\Client();


        $response = $client->request('POST', 'https://jili-slots-casino-api-coin-base-more-then-180-games.p.rapidapi.com/jili/get-jili-url', [
            'body' => '{"userId":"Integritygrove123","gameId":"1","lang":"en-Us"}',
            'headers' => [
                'Content-Type' => 'application/json',
                'x-rapidapi-host' => 'jili-slots-casino-api-coin-base-more-then-180-games.p.rapidapi.com',
                'x-rapidapi-key' => 'a3aab90d14msh996f3a97a1c893bp1f8aacjsnb261ed4c8cef',
            ],
        ]);

        $game = json_decode($response->getBody()->getContents(), true);
        return redirect($game['Data']);
    }


    public function evolution_game()
    {
        $j_games = $this->get_evolution_games();
        $data = $j_games['data'];

//        return $data;

        return view($this->theme . 'evolutionGames', compact('data'));
    }


    public function get_evolution_games()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com/casino/get-all-bets?page=1&startDate=2024-12-01&endDate=2024-12-03&provider=pgsoft&limit=25', [
            'headers' => [
                'x-rapidapi-host' => 'evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com',
                'x-rapidapi-key' => 'a3aab90d14msh996f3a97a1c893bp1f8aacjsnb261ed4c8cef',
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function evolution_game_open($id)
    {
        $game_id = $id;
        $client = new \GuzzleHttp\Client();

        $gdata = [
            "userId" => "Integritygrove123", "gameId" => $game_id, "lang" => "en"
        ];

//        return json_encode($gdata);


        $response = $client->request('POST', 'https://evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com/casino/get-game-url', [
            'body' => json_encode($gdata),
            'headers' => [
                'Content-Type' => 'application/json',
                'x-rapidapi-host' => 'evolution-ezugi-60-providers-live-casino-slots.p.rapidapi.com',
                'x-rapidapi-key' => 'a3aab90d14msh996f3a97a1c893bp1f8aacjsnb261ed4c8cef',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        $ga = $data['payload']['game_launch_url'];
        return redirect($ga);
        return json_decode($response->getBody()->getContents(), true);
    }


    public function diamond_game()
    {
        return view($this->theme . 'diamondGame');
    }

    public function dmd_all_sports()
    {


        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://diamond-betting-api.p.rapidapi.com/allSportid', [
            'headers' => [
                'x-rapidapi-host' => 'diamond-betting-api.p.rapidapi.com',
                'x-rapidapi-key' => 'a3aab90d14msh996f3a97a1c893bp1f8aacjsnb261ed4c8cef',
            ],
        ]);

        $sports = json_decode($response->getBody()->getContents(), true);
        $data = $sports['data'];

        return view($this->theme . 'diamondAllSports', compact('data'));
    }

    public function dmd_all_sports_open($id)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://diamond-betting-api.p.rapidapi.com/esid?sid=4', [
            'headers' => [
                'x-rapidapi-host' => 'diamond-betting-api.p.rapidapi.com',
                'x-rapidapi-key' => 'a3aab90d14msh996f3a97a1c893bp1f8aacjsnb261ed4c8cef',
            ],
        ]);

        echo $response->getBody();
    }


    public function getHtml5RngGameList()
    {
        try {
            // SOAP Endpoint
            $endpoint = 'http://apilccwtest_sherabaji.gksic5ousjiw9pldk3apx6dmbte.com/GameConsumerAPIWebService.asmx';

            // SOAP Request XML Body
            $xmlBody = <<<XML
<?xml version="1.0" encoding="utf-16"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
    <soap:Body>
        <GetHtml5RngGameList xmlns="http://microsoft.com/webservices/">
            <consumerId>360</consumerId>
            <consumerPassword>624860</consumerPassword>
        </GetHtml5RngGameList>
    </soap:Body>
</soap:Envelope>
XML;

            // cURL Initialization
            $ch = curl_init();

            // cURL Options
            curl_setopt($ch, CURLOPT_URL, $endpoint);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: text/xml; charset=utf-8',
                'Content-Length: ' . strlen($xmlBody),
            ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlBody);

            // Execute and Get Response
            $response = curl_exec($ch);

            // Handle Errors
            if (curl_errno($ch)) {
                throw new \Exception(curl_error($ch));
            }

            curl_close($ch);

//            return response()->json(['response' => $response]);

            // Parse the XML Response
            $parsedResponse = $this->parseSoapResponseNew($response);


            return view($this->theme . 'seraBaji', compact('parsedResponse'));


            // Return Parsed Response
            return response()->json($parsedResponse);

        } catch (\Exception $e) {
            // Handle Exception
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function parseSoapResponseNew($response)
    {

        $xmlObject = simplexml_load_string($response, null, LIBXML_NOCDATA);

// Register namespaces
        $namespaces = $xmlObject->getNamespaces(true);

// Access the body data
        $body = $xmlObject->children($namespaces['soap'])->Body;
        $response = $body->children($namespaces[''])->GetHtml5RngGameListResponse;
        $gameListResult = $response->GetHtml5RngGameListResult;

        // Extract game data
        $games = [];
        foreach ($gameListResult->RngGame as $game) {
            $gameDetails = [
                'Id' => (string)$game->children('http://tempuri.org/')->Id,
                'GameName' => (string)$game->children('http://tempuri.org/')->GameName,
                'GameNameDisplay' => (string)$game->children('http://tempuri.org/')->GameNameDisplay,
                'ImageUrl' => (string)$game->children('http://tempuri.org/')->ImageUrl,
                'ImageName' => (string)$game->children('http://tempuri.org/')->ImageName,
                'GameType' => (string)$game->children('http://tempuri.org/')->GameType,
                'SubGameType' => (string)$game->children('http://tempuri.org/')->SubGameType,
            ];
            $games[] = $gameDetails;
        }

// Output the result
//        dd($games);
        return $games;


    }


}
