<?php namespace App\Cards\Static;

use App\Cards\CardInterface as CardInterface;

class Ace implements CardInterface {

    public static function getIndex()
    {
        return "A";
    }

    public static function getVariations()
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