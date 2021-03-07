<?php

class Card
{
    /**
     * @var string
     */
    private $suite;

    /**
     * @var string
     */
    private $face;

    public function __construct(string $suite, string $face)
    {
        $this->suite = $suite;
        $this->face = $face;
    }
}