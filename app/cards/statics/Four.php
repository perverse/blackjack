<?php namespace App\Cards\Statics;

use App\Cards\Contracts\CardInterface as CardInterface;

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