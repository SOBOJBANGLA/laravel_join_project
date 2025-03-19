<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameParseController extends Controller
{
    public function parseSoapResponseNew()
    {
        $data = <<< XML
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
    <soap:Body>
        <getDefaultVehicleAndValueByVinResponse xmlns="http://webservice.nada.com/">
            <getDefaultVehicleAndValueByVinResult>
            <Uid>1182699</Uid>
            <VehicleYear>2015</VehicleYear>
            <MakeCode>47</MakeCode>
            </getDefaultVehicleAndValueByVinResult>
       </getDefaultVehicleAndValueByVinResponse>
    </soap:Body>
</soap:Envelope>
XML;


        $xml = new \SimpleXMLElement($data);
        $xml->registerXPathNamespace('soap', 'http://schemas.xmlsoap.org/soap/envelope/');
        $xml->registerXPathNamespace('ns', 'http://microsoft.com/webservices/');
        $xml->registerXPathNamespace('temp', 'http://tempuri.org/');
        $body = $xml->xpath('//soap:Body')[0];
        $responsea = $xml->xpath('//soap:Body/ns:GetHtml5RngGameListResponse/ns:GetHtml5RngGameListResult');

        return $responsea;

    }
}
