<?php namespace App\Cards\Contracts;

interface DeckInterface {
    public function getCards();
    public function getCard($cardIndex);
    public function getCardIndexes();
}