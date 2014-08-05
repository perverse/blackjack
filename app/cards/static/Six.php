<?php namespace App\Cards\Static;

use App\Cards\CardInterface as CardInterface;

class Six implements CardInterface {

    public static function getIndex()
    {
        return "6";
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
        return 6;
    }

}