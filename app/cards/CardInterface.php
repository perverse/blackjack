<?php namespace App\Cards;

interface CardInterface {
    public static function getIndex();
    public static function getVariations();
    public function getValue();
}