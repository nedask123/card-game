<?php

class Cards
{
    public const FACES = [
        "1", "2", "3", "4", "5", "6", "7", "8",
        "9", "10", "Jack", "Queen", "King"
    ];

    public const SUITS = [
        '♠', '♥', '♣', '♦'
    ];

    /**
     * @var string
     */
    private $trumpSuite;

    /**
     * @var array|Card[]
     */
    private $deck;

    public function __construct(string $trumpSuite)
    {
        $this->trumpSuite = $trumpSuite;
        $this->deck = [];
    }

    public function shuffle()
    {
        shuffle($this->deck);
    }
}