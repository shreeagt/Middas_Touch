<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\Login\RememberMeExpiration;

class LoginController extends Controller
{
    use RememberMeExpiration;

    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
       // dd($request);
        $credentials = $request->getCredentials();
       // dd($credentials);
        if(!Auth::validate($credentials)):
            return redirect()->to('/')->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        // dd($user);
        Auth::login($user, $request->get('remember'));
        //dd(auth()->user()->firstname);
        if($request->get('remember')):
            $this->setRememberMeExpiration($user);
        endif;

        return $this->authenticated($request, $user);
        //dd($user);
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended();
    }

}