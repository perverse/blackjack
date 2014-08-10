<?php namespace App\Cards;

use App;

class Validator {
    
    public function isacard($attribute, $value, $parameters)
    {
        $cardIndexes = App::make('DeckOfCards')->getCardIndexes();
        return in_array($value, $cardIndexes);
    }

}