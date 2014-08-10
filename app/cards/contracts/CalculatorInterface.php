<?php namespace App\Cards\Contracts;

interface CalculatorInterface {
    public function add(array $cards);
    public function getDeck();
}