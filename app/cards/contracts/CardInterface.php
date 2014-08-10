<?php namespace App\Cards\Contracts;

interface CardInterface {
    public function getIndex();
    public function getVariations();
    public function getValue();
}