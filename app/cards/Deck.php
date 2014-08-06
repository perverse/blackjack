<?php

class Deck {

    private $deck = array();

    public function __construct(array $cardObjects)
    {
        $this->cardsObjects = $cardObjects;
    }

    public function getDeck()
    {
        // if static deck array is falsey/empty array - generate new deck
        if (empty($this->deck)) {

            $this->deck = array(); // recast as array in case $deck has been set to another falsey value

            foreach ($this->cardObjects as $objName) {

                $cardType = new $objName();
                foreach ($cardType->getVariations() as $suit => $image) {
                    $this->deck[$cardType->getIndex() . $suit] = new $objName();
                }

            }

        }

        return $this->deck;
    }

    public function getCard($cardIndex)
    {
        $deck = $this->getDeck();
        $ret = null;

        // interface validation will take care of card validity
        // create a default of null just in case

        if (isset($deck[$cardIndex])) {
            $ret = $deck[$cardIndex];
        }

        return $ret;
    }

}