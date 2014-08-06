<?php namespace App\Cards\Static;

use App\Cards\CardInterface as CardInterface;

class Seven implements CardInterface {

    public function getIndex()
    {
        return "7";
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
        return 7;
    }

}