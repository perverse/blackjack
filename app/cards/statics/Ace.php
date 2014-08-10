<?php namespace App\Cards\Statics;

use App\Cards\Contracts\CardInterface as CardInterface;

class Ace implements CardInterface {

    public function getIndex()
    {
        return "A";
    }

    public function getVariations()
    {
        return array(
            'S' => '',
            'C' => '',
            'D' => '',
            'H' => ''
        );
    }

    public function getValue()
    {
        return 11;
    }

}