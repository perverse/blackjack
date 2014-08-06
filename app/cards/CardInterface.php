<?php namespace App\Cards;

interface CardInterface {
    public function getIndex();
    public function getVariations();
    public function getValue();
}