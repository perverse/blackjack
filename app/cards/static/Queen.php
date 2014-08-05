<?php namespace App\Cards\Static;

use App\Cards\CardInterface as CardInterface;

class Queen implements CardInterface {

    public static function getIndex()
    {
        return "Q";
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
        return 10;
    }

}