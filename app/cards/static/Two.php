<?php namespace App\Cards\Static;

use App\Cards\CardInterface as CardInterface;

class Two implements CardInterface {

    public function getIndex()
    {
        return "2";
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
        return 2;
    }

}