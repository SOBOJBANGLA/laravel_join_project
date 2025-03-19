<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SeraBajiController extends Controller
{


    public function createAccount()
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
        <CreateAccount xmlns="http://microsoft.com/webservices/">
            <consumerId>360</consumerId>
            <consumerPassword>624860</consumerPassword>
            <userName>ami</userName>
            <password>654321</password>
            <currencyCode>USD</currencyCode>
            <firstName>ami</firstName>
            <lastName>tmi</lastName>
        </CreateAccount>
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


            // Parse the XML Response
            $parsedResponse = $this->parseSoapResponse($response);

            // Return Parsed Response
            return response()->json($parsedResponse);


            // Return Response
            return response()->json(['response' => $response]);

        } catch (\Exception $e) {
            // Handle Exception
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    private function parseSoapResponse($response)
    {
        // Load the XML response
        $xml = simplexml_load_string($response, null, LIBXML_NOCDATA);

        // Register namespace
        $xml->registerXPathNamespace('soap', 'http://schemas.xmlsoap.org/soap/envelope/');
        $xml->registerXPathNamespace('ns', 'http://microsoft.com/webservices/');

        // Extract relevant values
        $createAccountResult = $xml->xpath('//ns:CreateAccountResult');
        $casinoUserName = $xml->xpath('//ns:casinoUserName');

        // Return parsed data
        return [
            'CreateAccountResult' => (string)($createAccountResult[0] ?? 'Unknown'),
            'CasinoUserName' => (string)($casinoUserName[0] ?? 'Unknown'),
        ];
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
        return 'done';


        $xml = new \SimpleXMLElement($response);

        // Register namespaces
        $xml->registerXPathNamespace('soap', 'http://schemas.xmlsoap.org/soap/envelope/');
        $xml->registerXPathNamespace('ns', 'http://microsoft.com/webservices/');
        $xml->registerXPathNamespace('temp', 'http://tempuri.org/');

        // Extract body and parse
        $body = $xml->xpath('//soap:Body')[0];

//        $responsea = $body->xpath('//ns:GetHtml5RngGameListResponse')[0] ?? null;
        $responsea = $xml->xpath('//soap:Body/ns:GetHtml5RngGameListResponse/ns:GetHtml5RngGameListResult');

//        return $responsea;

//        $games = $responsea->xpath('//RngGame') ?? [];
        $resultNode = $xml->xpath('//soap:Body/ns:GetHtml5RngGameListResponse/ns:GetHtml5RngGameListResult/ns:RngGame');
//        $resultNode = $xml->xpath('//soap:Body/ns:GetHtml5RngGameListResponse/ns:GetHtml5RngGameListResult');
//        return $resultNode[0];

//        $games = $xml->xpath('//soap:Body/ns:GetHtml5RngGameListResponse/ns:GetHtml5RngGameListResult//ns:RngGame');

        $array = [];
        for ($i = 0; $i < count($resultNode); $i++) {
            $gameId = (string)$resultNode->xpath('//soap:Body/ns:GetHtml5RngGameListResponse/ns:GetHtml5RngGameListResult/ns:RngGame/temp:Id')[$i];
            array_push($array, $gameId);
        }

        return $array;


        $games = [];
        foreach ($resultNode as $gameNode) {
            // Parse the GameName
            $gameId = (string)$gameNode->xpath('//soap:Body/ns:GetHtml5RngGameListResponse/ns:GetHtml5RngGameListResult/ns:RngGame/temp:Id')[0]; // Get the GameName element
            $gameName = (string)$xml->xpath('//soap:Body/ns:GetHtml5RngGameListResponse/ns:GetHtml5RngGameListResult/ns:RngGame/temp:GameName')[0]; // Get the GameName element
            $gameDiplayName = (string)$xml->xpath('//soap:Body/ns:GetHtml5RngGameListResponse/ns:GetHtml5RngGameListResult/ns:RngGame/temp:GameNameDisplay')[0]; // Get the GameName element
            $ImageUrl = (string)$xml->xpath('//soap:Body/ns:GetHtml5RngGameListResponse/ns:GetHtml5RngGameListResult/ns:RngGame/temp:ImageUrl')[0]; // Get the GameName element
            $ImageName = (string)$xml->xpath('//soap:Body/ns:GetHtml5RngGameListResponse/ns:GetHtml5RngGameListResult/ns:RngGame/temp:ImageName')[0]; // Get the GameName element
            $GameType = (string)$xml->xpath('//soap:Body/ns:GetHtml5RngGameListResponse/ns:GetHtml5RngGameListResult/ns:RngGame/temp:GameType')[0]; // Get the GameName element
            $SubGameType = (string)$xml->xpath('//soap:Body/ns:GetHtml5RngGameListResponse/ns:GetHtml5RngGameListResult/ns:RngGame/temp:SubGameType')[0]; // Get the GameName element


//            return $gameId;
            $games[] = [
                'Id' => $gameId,
                'GameName' => $gameName,  // Adding the parsed GameName
                'GameNameDisplay' => $gameDiplayName,
                'ImageUrl' => $ImageUrl,
                'ImageName' => $ImageName,
                'GameType' => $GameType,
                'SubGameType' => $SubGameType, // Default if missing
            ];
        }

        return $games;


    }

    private function getNodeValue($node, $xpath, $default = null)
    {
        $result = $node->xpath($xpath);
        return isset($result[0]) ? (string)$result[0] : $default;
    }


    private function parseSoapResponseGame($response)
    {
        // Load the XML response
        $xml = simplexml_load_string($response, null, LIBXML_NOCDATA);

        // Register namespace
        $xml->registerXPathNamespace('soap', 'http://schemas.xmlsoap.org/soap/envelope/');
        $xml->registerXPathNamespace('ns', 'http://microsoft.com/webservices/');

        // Extract relevant values (modify as needed based on actual response structure)
//        $gameList = $xml->xpath('//ns:GetHtml5RngGameListResponse//ns:Game');
        $gameName = $xml->xpath('//ns:GameName');

//        return $gameName;

//        $createAccountResult = $xml->xpath('//ns:CreateAccountResult');

        // Format the game list
        $games = [];
        foreach ($gameName as $game) {
            $games[] = [
//                'gameId' => (string)$game->GameId,
                'gameName' => (string)$game->GameName,
            ];
        }

        return [
            'GameList' => $games,
        ];
    }


    public function createAccounta()
    {


        try {
            // WSDL URL or SOAP endpoint
            $wsdl = 'http://apilccwtest_sherabaji.gksic5ousjiw9pldk3apx6dmbte.com/GameConsumerAPIWebService.asmx'; // Replace with the actual WSDL URL or endpoint

            // SOAP Client Options
            $options = [
                'trace' => 1, // Enable trace for debugging
                'exceptions' => true,
            ];

            // Initialize SOAP Client
            $client = new \SoapClient(null, array_merge($options, [
                'location' => $wsdl,
                'uri' => 'http://microsoft.com/webservices/',
            ]));

//            dd($client->__getFunctions());


            // Parameters for the SOAP request
            $params = [
                'consumerId' => 360,
                'consumerPassword' => '624860',
                'userName' => 'TestShanghai',
                'password' => '654321',
                'currencyCode' => 'USD',
                'firstName' => 'Stanley',
                'lastName' => 'Toh',
            ];

            // Call the SOAP method
            $response = $client->__soapCall('CreateAccount', [$params]);

            // Handle Response
            return response()->json($response);

        } catch (\Exception $e) {
            // Handle Exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function slotLogin()
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
        <CreateAccount xmlns="http://microsoft.com/webservices/">
            <consumerId>360</consumerId>
            <consumerPassword>624860</consumerPassword>
            <userName>ami</userName>
            <password>654321</password>
            <currencyCode>USD</currencyCode>
            <firstName>ami</firstName>
            <lastName>tmi</lastName>
        </CreateAccount>
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


            // Parse the XML Response
//            $parsedResponse = $this->parseSoapResponse($response);

            // Return Parsed Response
//            return response()->json($parsedResponse);


            // Return Response
            return response()->json(['response' => $response]);

        } catch (\Exception $e) {
            // Handle Exception
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    private function parseSoapResponseSlot($response)
    {
        // Load the XML response
        $xml = simplexml_load_string($response, null, LIBXML_NOCDATA);

        // Register namespace
        $xml->registerXPathNamespace('soap', 'http://schemas.xmlsoap.org/soap/envelope/');
        $xml->registerXPathNamespace('ns', 'http://microsoft.com/webservices/');

        // Extract relevant values
        $createAccountResult = $xml->xpath('//ns:CreateAccountResult');
        $casinoUserName = $xml->xpath('//ns:casinoUserName');

        // Return parsed data
        return [
            'CreateAccountResult' => (string)($createAccountResult[0] ?? 'Unknown'),
            'CasinoUserName' => (string)($casinoUserName[0] ?? 'Unknown'),
        ];
    }
}
