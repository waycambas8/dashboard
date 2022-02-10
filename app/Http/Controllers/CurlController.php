<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurlController extends Controller
{
    public function curl($req){
        $curl = curl_init();
        $url = $req['url'];
        $token = (!empty(session("token")))?session("token"):"";
        $method = (isset($req['method']))?$req['method']:"POST";

        curl_setopt_array($curl, array(
            CURLOPT_URL => env("REQ_URL").$url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $req['data'],
            CURLOPT_HTTPHEADER => array(
                'Token-Header:'.env("TOKEN_SERVER"),
                'Authorization: Bearer '.$token
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response,true);
    }
}
