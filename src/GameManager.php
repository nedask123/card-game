<?php
declare(strict_types=1);

namespace App\Src;

class GameManager
{
    /**
     * @var string
     */
    private $trumpSuite;

    public function __construct(string $trumpSuite)
    {
        $this->trumpSuite = $trumpSuite;
    }

    private function compareCards(Card $card1, Card $card2): int
    {
        if ($this->isTrumpCard($card1) && !$this->isTrumpCard($card2)) {
            return 1;
        } elseif ($this->isTrumpCard($card2) && !$this->isTrumpCard($card1)) {
            return -1;
        }

        return $this->compareByFace($card1, $card2);
    }

    private function isTrumpCard(Card $card): bool
    {
        if ($card->getSuite() === $this->trumpSuite) {
            return true;
        }
        return false;
    }

    private function compareByFace(Card $card1, Card $card2): int
    {
        $score1 = array_search($card1->getFace(), Cards::FACES);
        $score2 = array_search($card2->getFace(), Cards::FACES);

        if ($score1 > $score2) {
            return 1;
        } elseif ($score1 < $score2) {
            return -1;
        }

        return 0;
    }

    public function endGame(Player $player1, Player $player2): void
    {
        if (empty($player1->getScore()) || empty($player2->getScore())) {
            throw new \Exception('Both players need to have score');
        }

        if ($player1->getScore() > $player2->getScore()) {
            echo 'Winner P1: P1 Score: ' . $player1->getScore() . ' P2 Score: ' . $player2->getScore();
            return;
        } elseif ($player1->getScore() < $player2->getScore()) {
            echo 'Winner P2: P1 Score: ' . $player1->getScore() . ' P2 Score: ' . $player2->getScore();
            return;
        } elseif ($player1->getScore() === $player2->getScore()) {
            echo 'Game ended in a TIE Score: ' . $player1->getScore() . ' P2 Score: ' . $player2->getScore();
            return;
        }

        throw new \Exception('Wrong scores');
    }

    public function makeTurn(Player $player1, Player $player2)
    {
        if (!$player1->hasCards() || !$player2->hasCards()) {
            throw new \Exception('Not enough cards');
        } elseif ($player1->getDeckCount() !== $player2->getDeckCount()) {
            throw new \Exception('Card count is not the same');
        }

        $card1 = $player1->drawFirstCard();
        $card2 = $player2->drawFirstCard();

        $result = $this->compareCards($card1, $card2);

        echo 'P1: ' . $card1 . ' P2: ' . $card2 . PHP_EOL;

        switch ($result) {
            case 1:
                echo 'P1 Wins' . PHP_EOL;
                $player1->addToScoreDeck([$card1, $card2]);
                break;
            case -1:
                echo 'P2 Wins' . PHP_EOL;
                $player2->addToScoreDeck([$card1, $card2]);
                break;
            case 0:
                echo 'Tie' . PHP_EOL;
                $player1->addToScoreDeck([$card1]);
                $player2->addToScoreDeck([$card2]);
                break;
        }
    }
}