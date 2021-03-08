<?php
declare(strict_types=1);

namespace App\Src;

use Exception;

class Player
{
    /**
     * @var array|Card[]
     */
    private $deck;

    /**
     * @var array|Card[]
     */
    private $scoreDeck;

    public function __construct(array $deck)
    {
        $this->deck = $deck;
        $this->scoreDeck = [];
    }

    public function hasCards()
    {
        return !empty($this->deck);
    }

    public function getDeckCount(): int
    {
        return count($this->deck);
    }

    public function drawFirstCard(): Card
    {
        if (!$this->hasCards()) {
            throw new Exception('Out of cards');
        }
        $card = $this->deck[0];
        array_shift($this->deck);

        return $card;
    }

    /**
     * @param array|Card[] $cards
     */
    public function addToScoreDeck(array $cards): void
    {
        $this->scoreDeck = array_merge($this->scoreDeck, $cards);
    }

    public function getScore(): int
    {
        return count($this->scoreDeck);
    }
}