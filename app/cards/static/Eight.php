<?php namespace App\Cards\Static;

use App\Cards\CardInterface as CardInterface;

class Eight implements CardInterface {

    public static function getIndex()
    {
        return "8";
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
        return 8;
    }

}