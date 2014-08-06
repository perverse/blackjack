<?php namespace App\Cards\Static;

use App\Cards\CardInterface as CardInterface;

class Queen implements CardInterface {

    public function getIndex()
    {
        return "Q";
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
        return 10;
    }

}