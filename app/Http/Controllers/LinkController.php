<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function login(){
        return view("modul.login.login");
    }

    public function dashboard(){
        $res['modul'] = "dashboard";
        $res['url'] = "dashboard";
        return view("modul.dashboard.dashboard")->with(compact("res"));
    }
}
