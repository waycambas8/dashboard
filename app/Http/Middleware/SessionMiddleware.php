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
            if(!empty(session("token"))){
                $req['url'] = "check_token";
                $req['data'] = array("id" => session("id"));
                $res = $this->curl->curl($req);
                if($res['response'] == 200){
                    return $next($request);
                }else{
                    Session::flush(); 
                    return redirect()->route('/');
                }
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
    }
}
