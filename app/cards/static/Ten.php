<?php namespace App\Cards\Static;

use App\Cards\CardInterface as CardInterface;

class Ten implements CardInterface {

    public function getIndex()
    {
        return "10";
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