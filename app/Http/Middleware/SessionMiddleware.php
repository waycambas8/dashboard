<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\CurlController;
use Session;

class SessionMiddleware
{

    public function __construct(){
        $this->curl = new CurlController;
    }
    
    public function handle(Request $request, Closure $next)
    {
        if(!empty(session("id"))){
            if(!empty(session("token_user"))){
                $req['url'] = "check_token";
                $req['data'] = array("id" => session("id"));
                $res = $this->curl->with_guzzle($req);
                if($res['response'] == 200){
                    return $next($request);
                }
            }
        }
        Session::flush(); 
        return redirect()->route('login');

    }
}
