<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Lumen\Routing\Controller as BaseController;
//use Socialite;
use Laravel\Socialite\Facades\Socialite;
class AuthController extends Controller
{
    //
    public function login()
    {
        Session::flush();
        return view('HTML.login');
    }
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {

        return Socialite::driver('google')->stateless()->redirect();

    }
    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $infor_google = Socialite::driver('google')->stateless()->user();
        $user = User::where('provider_id',$infor_google->id)->first();
        if(!$user)
        {
            $user = User::create([
                'name'=>$infor_google->name,
                'email'=>$infor_google->email,
                'provider'=>'google',
                'provider_id'=>$infor_google->id
            ]);
            Session::put('user',$user);

            return redirect('/');
        }
        else
        {
            Session::put('user',$user);
            return redirect('/');
        }
    }
}
