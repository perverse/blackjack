<?php namespace App\Cards;

use Illuminate\Support\ServiceProvider;
use App\Cards\Calculator;
use App\Cards\Deck;
use App\Cards\Validator as CardValidator;
use Config;

class BlackjackProvider extends ServiceProvider {

    public function register()
    {

        $this->app->singleton('DeckOfCards', function(){
            $cards = Config::get('cards');
            return new Deck($cards);
        });

        $this->app->singleton('BlackjackCalculator', function(){
            $deck = $this->app->make('DeckOfCards');
            return new Calculator($deck);
        });

    }

}