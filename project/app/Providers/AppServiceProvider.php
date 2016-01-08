<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $tweetV = \App\Tweet::getStatusVlambeer();
        $tweetR = \App\Tweet::getStatusRami();
        $tweetJ = \App\Tweet::getStatusJan();

        $twitter = [
            'tweetV' => $tweetV,
            'tweetR' => $tweetR,
            'tweetJ' => $tweetJ
        ];
        view()->share('twitter', $twitter);

//        Cookie cart set
        if ( empty($_COOKIE['cart']) ) {
            setcookie("cart", '[]');
        }

        if ( empty()) {
            #)
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
