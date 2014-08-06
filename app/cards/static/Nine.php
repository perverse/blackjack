<?php namespace App\Cards\Static;

use App\Cards\CardInterface as CardInterface;

class Nine implements CardInterface {

    public function getIndex()
    {
        return "9";
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
        return 9;
    }

}