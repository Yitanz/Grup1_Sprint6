<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{

   public function redirectToProvider($provider){

   		return Socialite::driver($provider)->redirect();
   
   }

   public function handlerProviderCallback($provider){
   		$user = Socialite::driver($provider)->user();
   		dd($user);



   }

}
