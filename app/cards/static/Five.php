<?php namespace App\Cards\Static;

use App\Cards\CardInterface as CardInterface;

class Five implements CardInterface {

    public function getIndex()
    {
        return "5";
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
        return 5;
    }

}