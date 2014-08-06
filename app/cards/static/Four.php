<?php namespace App\Cards\Static;

use App\Cards\CardInterface as CardInterface;

class Four implements CardInterface {

    public function getIndex()
    {
        return "4";
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
        return 4;
    }

}