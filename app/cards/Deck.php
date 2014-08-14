<?php namespace App\Cards;

/*
|--------------------------------------------------------------------------
| app/cards/Deck.php (Implementation of App\Cards\Contracts\DeckInterface)
|--------------------------------------------------------------------------
|
| Primary object for the collation of card objects, provides helpers to access
| instantiated card objects based upon their indexes
|
*/

use App\Cards\Contracts\DeckInterface;

class Deck implements DeckInterface {

    /**
     * Private arrays to hold card class names and instantiated card objects for deck
     */
    private $cards = array();
    private $cardObjects = array();

    /**
     * Class constructor has array of class names representing card types in our deck injected
     * into it
     */
    public function __construct(array $cardObjects)
    {
        $this->cardObjects = $cardObjects; // card class names with namespacing from config
    }

    /**
     * Construct card deck based on injected classnames
     *
     * @return array
     */
    public function getCards()
    {
        // if static deck array is empty - generate new deck
        if (count($this->cards) < 1) {

            $this->cards = array(); // recast as array in case $deck has been set to another falsey value

            foreach ($this->cardObjects as $objName) {
                // build each card object based on rules in class
                // and place in deck with suit variations
                $cardType = new $objName();

                foreach ($cardType->getVariations() as $suit => $image) {
                    $this->cards[$cardType->getIndex() . $suit] = new $objName();
                }
            }

        }

        return $this->cards;
    }

    /**
     * Return card matching given index
     *
     * @return App\Cards\Contracts\CardInterface
     */
    public function getCard($cardIndex)
    {
        $cards = $this->getCards();
        $ret = null;

        // interface validation will take care of card validity
        // use default of null just in case

        if (isset($cards[$cardIndex])) {
            $ret = $cards[$cardIndex];
        }

        return $ret;
    }

    /**
     * Return card indexes (including suits)
     * Primarily used for validation and notifcation to user
     *
     * @return App\Cards\Contracts\CardInterface
     */
    public function getCardIndexes()
    {
        $cards = $this->getCards();
        return array_keys($cards);
    }

}