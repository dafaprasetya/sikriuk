<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\AccessToken;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function showLoginForm()
    {
        $token = session('token');
        $about = About::first();
        $accesstoken = AccessToken::where('token', $token)->first();
        if (!$accesstoken) {
            return redirect()->route('gettoken');
        }
        $data = [
            'title' => 'login',
            'about' => $about,
        ];
        return view('auth.login', $data);
    }
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
