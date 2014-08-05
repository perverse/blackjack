<?php namespace App\Cards\Static;

use App\Cards\CardInterface as CardInterface;

class Jack implements CardInterface {

    public static function getIndex()
    {
        return "J";
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