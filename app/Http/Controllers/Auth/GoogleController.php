<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Session\Session;
use App\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function Login()
    {   
        if(Auth::check()){
            return redirect()->route('home');
        }
        $client =  new \Google_Client();
        $client->setAuthConfig('client_secret_104608349064-pie4mtqc2hif7800mbi8b7hvo4g51cfj.apps.googleusercontent.com.json');        
        $client->addScope(\Google_Service_Oauth2::USERINFO_PROFILE);
        $client->addScope(\Google_Service_Oauth2::USERINFO_EMAIL);
        return redirect($client->createAuthUrl());
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function LoginCallback()
    {
        
        if (!Input::get('code')) {
            return redirect()->url('/login');
        }
        session_start();        
        $client = new \Google_Client();        
        $client->setAuthConfig('client_secret_104608349064-pie4mtqc2hif7800mbi8b7hvo4g51cfj.apps.googleusercontent.com.json');

        $client->fetchAccessTokenWithAuthCode(Input::get('code'));  
        
        $objRes = new \Google_Service_Oauth2($client);
        $_SESSION['access_token'] = $client->getAccessToken();        
        
        if (isset($_SESSION['access_token'])) {
            $client->setAccessToken($_SESSION['access_token']);
        }
          //store with user data
        if ($client->getAccessToken()) {
            $userData = $objRes->userinfo_v2_me->get();            
            $_SESSION['access_token'] = $client->getAccessToken();
        } 
        $user = User::where('email',$userData->email)->first();
        if(!$user){
            $user = new User();
            $user->email = $userData->email;
            $user->name = $userData->name;
            $user->hd = $userData->hd;            
            $user->save();
        }
        Auth::loginUsingId($user->id);        
        return redirect()->route('home');
    }
    public function Logout(){
        session_start();
        session_destroy();
        Auth::logout();
        return redirect('login');
    }
}
