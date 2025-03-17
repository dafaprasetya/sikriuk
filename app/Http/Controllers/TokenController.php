<?php

namespace App\Http\Controllers;

use App\Models\AccessToken;
use Illuminate\Http\Request;

class TokenController extends Controller
{

    public function index() {
        $token = session('token');
        $accesstoken = AccessToken::where('token', $token)->first();
        $data = [
            'title'=>'Token Authentication',
        ];
        if ($accesstoken) {
            return redirect()->route('login');;
        }
        return view('token/index', $data);
    }
    public function checkToken(Request $request) {
        $accesstoken = AccessToken::where('token', $request->input('token'))->first();
        if ($accesstoken) {
            session(['token'=>$request->input('token')]);
            return redirect()->route('login');
        } else {
            return redirect()->route('gettoken')->with('error','Invalid Token');
        }
    }
}
