<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function login(){
        if(!empty(session("id"))){
            $res['modul'] = "dashboard";
            $res['url'] = "dashboard";
            return view("modul.dashboard.dashboard")->with(compact("res"));
        }
        return view("modul.login.login");
    }

    public function dashboard(){
        $res['modul'] = "dashboard";
        $res['url'] = "dashboard";
        return view("modul.dashboard.dashboard")->with(compact("res"));
    }

    public function menu($name){
        $res['modul'] = explode("_",$name)[0];
        $res['url'] = $name;
        $path = "modul.".$res['modul'].".".$name;
        return view($path)->with(compact("res"));
    }
}
