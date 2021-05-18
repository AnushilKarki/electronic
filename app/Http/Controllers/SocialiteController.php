<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class SocialiteController extends Controller
{
    public function github()
     {
        return Socialite::driver('github')->redirect();
     }
     public function githubRedirect()
 {
        $user = Socialite::driver('github')->user();
        $user=User::firstOrCreate([
            'email'=>$user->email
        ],
        [

        'name' => $user->name,
        'password'=>Hash::make(Str::random(24))
        ]);
        Auth::login($user,true);
        return redirect('/home');
    }
    public function facebook()
     {
       return Socialite::driver('facebook')->redirect();
     }
     public function facebookRedirect()
      {
         $user=Socialite::driver('facebook')->user();
         $user=User::firstOrCreate([
            'email'=>$user->email
        ],
        [

        'name' => $user->name,
        'password'=>Hash::make(Str::random(24))
        ]);
        Auth::login($user,true);
        return redirect('/home');
      }
}
