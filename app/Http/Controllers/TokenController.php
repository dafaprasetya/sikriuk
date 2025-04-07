<?php

namespace App\Http\Controllers;

use App\Models\AccessToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
            Session::forget('fail');
            return redirect()->route('login');
        } else {
            $failCount = session('fail', 0) + 1;
            session(['fail' => $failCount]);
            if ($failCount > 3) {
                session()->forget('token');
                session()->forget('fail');
                abort(403);
            }
            return redirect()->route('gettoken')->with('error','Invalid Token, '.$failCount.' dari 3 kesempatan terpakai');
        }
    }
}
