<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Socialite;
use Auth;
use Exception;
use Carbon\Carbon;


class GoogleController extends Controller
{
    public function redirectToProvider(Request $req){
    
        // $url=null;
        // $i = 1;
        // foreach($req->request as $name => $value){
        //     if ( $req->request->count() === $i) { $url .= $name."=".$value;
        //     }else{ $url .= $name."=".$value."&"; }
        //     $i++;
        // }
        if (isset($req->link)) {
            session()->put('redirect_link',$req->link);
        }

        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email', $googleUser->email)->first();

            if ($existUser) {
                Auth::loginUsingId($existUser->id);
            } else {
                $user = new User;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->email_verified_at = Carbon::now()->toDateTimeString();
                $user->password = bcrypt(request('password'));
                $user->save();
                Auth::loginUsingId($user->id);
            }

            if (session('redirect_link')) {
                return redirect()->intended(session('redirect_link'));
            }else{
                return redirect()->intended('/');
            }

        } catch (Exception $e) {
            return redirect('/register');
        }
    }
}