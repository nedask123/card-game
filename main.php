<?php

require_once('src/Cards.php');
require_once('src/Card.php');
require_once('src/Player.php');
//You are given such rules for a card game:
//You use full card deck without Jokers (52 cards).
//At the start of the game a trump suite gets selected randomly. A deck is shuffled and each player gets half of the cards. Each turn consists of:

//Both players revealing their topmost card.
//Comparing the card values. Cards are compared by their rank (lowest to highest: 2 to 10, Jack, Queen, King, Ace) with trump cards being higher than non-trump cards.
//Player with a higher ranking card gets both cards and sets them to a separate pile (called score pile).
//If the cards are of equal value, each player gets his own card back to the score pile.
//A game is played until both players do not have cards.
//At the end of the game a winning player is one that has more cards in their score pile. Equal number of cards results in a tie.

function main()
{
    $trumpSuite = selectTrumpSuite();
    $cards = new Cards($trumpSuite);
    $deck = buildDeck();
    shuffle($deck);

    $cardCount = count(Cards::FACES) * count(Cards::SUITS);

    $firstHalf = array_slice($deck,0, $cardCount/2);
    $secondHalf = array_slice($deck, $cardCount/2);
    $player1 = new Player($firstHalf);
    $player2 = new Player($secondHalf);

    while ($player1->hasCards() && $player2->hasCards())
    {
        makeTurn($player1, $player2);
    }


}

/**
 * At the start of the game a trump suite gets selected randomly
 * @return string
 */
function selectTrumpSuite(): string
{
    $randKey = array_rand(Cards::SUITS);
    return Cards::SUITS[$randKey];
}

function buildDeck(): array
{
    $deck = [];
    foreach (Cards::SUITS as $suite)
    {
        foreach (Cards::FACES as $face)
        {
            $deck[] = new Card($suite, $face);
        }
    }

    return $deck;
}

function makeTurn(Player $player1, Player $player2)
{
//    $firstCard = $player1->getTo

}



main();