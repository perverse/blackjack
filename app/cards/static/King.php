<?php namespace App\Cards\Static;

use App\Cards\CardInterface as CardInterface;

class King implements CardInterface {

    public function getIndex()
    {
        return "K";
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