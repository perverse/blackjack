<?php namespace App\Cards\Static;

use App\Cards\CardInterface as CardInterface;

class Six implements CardInterface {

    public function getIndex()
    {
        return "6";
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
        return 6;
    }

}