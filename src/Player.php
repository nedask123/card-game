<?php


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

    public function getDeck(): array
    {
        return $this->deck;
    }

    public function getTopCard(): Card
    {
        return $this->deck[0];
    }
}