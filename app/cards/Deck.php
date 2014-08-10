<?php namespace App\Cards;

use App\Cards\Contracts\DeckInterface;

class Deck implements DeckInterface {

    private $cards = array();
    private $cardObjects = array();

    public function __construct(array $cardObjects)
    {
        $this->cardObjects = $cardObjects;
    }

    public function getCards()
    {
        // if static deck array is empty - generate new deck
        if (count($this->cards) < 1) {

            $this->cards = array(); // recast as array in case $deck has been set to another falsey value

            foreach ($this->cardObjects as $objName) {
                $cardType = new $objName();
                foreach ($cardType->getVariations() as $suit => $image) {
                    $this->cards[$cardType->getIndex() . $suit] = new $objName();
                }

            }

        }

        return $this->cards;
    }

    public function getCard($cardIndex)
    {
        $cards = $this->getCards();
        $ret = null;

        // interface validation will take care of card validity
        // create a default of null just in case

        if (isset($cards[$cardIndex])) {
            $ret = $cards[$cardIndex];
        }

        return $ret;
    }

    public function getCardIndexes()
    {
        $cards = $this->getCards();
        return array_keys($cards);
    }

}