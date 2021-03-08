<?php
declare(strict_types=1);

namespace App\Src;

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

    public function getSuite(): string
    {
        return $this->suite;
    }

    public function getFace(): string
    {
        return $this->face;
    }

    public function __toString(): string
    {
        return $this->suite . $this->face;
    }
}