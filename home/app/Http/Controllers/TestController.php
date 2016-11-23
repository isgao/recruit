<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use Germey\Geetest\CaptchaGeetest;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
	use CaptchaGeetest;
	
    public function redirectToProvider()
    {
        return Socialite::driver('qq')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('qq');
        dd($user);
    }
}
