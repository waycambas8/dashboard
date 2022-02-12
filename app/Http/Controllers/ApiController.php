<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\CurlController;


class ApiController extends Controller
{
    public function __construct(){
        $this->curl = new CurlController;
    }

    public function login(Request $req){
        $res['response'] = 0;

        $validator = Validator::make($req->all(), [
            'email' => 'required|email:rfc,dns|min:2|max:255',
            'password' => 'required|min:8|max:15'
        ]);
        if($validator->fails()){
            $fail = $validator->messages();
            $fail = json_decode($fail,true);
            $res['pesan'] = array();  
            foreach($fail as $v){
                $res['pesan'][] = $v[0];
            }
            return response()->json($res);
        }else{
            $req['data'] = $req->toArray();
            $req['url'] = "login";
            $req['method'] = "POST";
            $res = $this->curl->with_guzzle($req);
            if($res['response'] == 200){
                session([
                    "id"=>$res['user']['id'],
                    "name"=>$res['user']['name'],
                    "email" =>$res['user']['email'],
                    "token_user" => $res['token_user'],
                    "token_auth" => $res['token_auth'],
                ]);
            }
        }
        return $res;
    }

    public function register(Request $req){
        $res['response'] = 0;
        $validator = Validator::make($req->all(), [
            'email' => 'required|email:rfc,dns|min:2|max:255',
            'password' => 'required|min:8|max:15',
            'name' => 'required|min:2|max:15'
        ]);
        if($validator->fails()){
            $fail = $validator->messages();
            $fail = json_decode($fail,true);
            $res['pesan'] = array();  
            foreach($fail as $v){
                $res['pesan'][] = $v[0];
            }
            return response()->json($res);
        }else{
            $req['data'] = $req->toArray();
            $req['url'] = "register";
            $req['method'] = "POST";
            $res = $this->curl->with_guzzle($req);
            if($res['response'] == 200){
                $res['url'] = "login";
            }
        }
        return $res;
    }


    public function add_images(Request $req){
        $res['response'] = 0;
        $validator = Validator::make($req->all(), [
            'nama' => 'required|min:2|max:15',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpg,jpeg,png'
        ]);
        if($validator->fails()){
            $fail = $validator->messages();
            $fail = json_decode($fail,true);
            $res['pesan'] = array();  
            foreach($fail as $v){
                $res['pesan'][] = $v[0];
            }
            return response()->json($res);
        }else{       
            $nama = $req->nama;
            foreach($req->file("images") as $v){
                $images[] = $v->store("images");
            }
            $req['data'] = array(
                "nama" =>  $nama,
                "images" => $images
            );
            $req['url'] = "add_images";
            $req['method'] = "POST";
            $res = $this->curl->with_guzzle($req);
        }
        return $res;
    }

    public function datatable(Request $req){
        $req['url'] = "datatable";
        $req['method'] = "POST";
        $req['data'] = $req->toArray();
        $res = $this->curl->with_guzzle($req);

        $records = $res['records'];

        //print_r($res);exit;
        $data_arr = array();
        foreach($records as $record){
            $id = $record['id_images'];
            $images = $record['nama_images'];
            $upload = $record['images'];
            $action = "tes";

            $data_arr[] = array(
                "id_images" => $id,
                "images" => $images,
                "upload" => $upload,
                "action" => $action
            );
        }

        $response = array(
            "draw" => intval($res['draw']),
            "iTotalRecords" => $res['totalRecords'],
            "iTotalDisplayRecords" => $res['totalRecordswithFilter'],
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit; 
    }
    
}
