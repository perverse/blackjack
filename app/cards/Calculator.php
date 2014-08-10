<?php namespace App\Cards;

use App\Cards\Contracts\CalculatorInterface;
use App\Cards\Contracts\DeckInterface;

class Calculator implements CalculatorInterface {

    protected $deck;

    public function __construct(DeckInterface $deck)
    {
        $this->deck = $deck;
    }

    public function add(array $cards)
    {
        $cardValues = array();

        foreach ($cards as $cardIndex) {
            $cardValues[] = $this->deck->getCard($cardIndex)->getValue();
        }

        return array_sum($cardValues);
    }

    public function getDeck()
    {
        return $this->deck;
    }

}