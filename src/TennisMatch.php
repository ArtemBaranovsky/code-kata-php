<?php


namespace App;


class TennisMatch
{

    protected $playerOne;
    protected $playerTwo;

    /**
     * TennisMatch constructor.
     * @param Player $playerOne
     * @param Player $playerTwo
     */
    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function score()
    {
        if ($this->hasWinner()) {
            return 'Winner: ' . $this->leader()->name;
        }

        if ($this->hasAdvantage()) {
            return 'Advantage: ' . $this->leader()->name;
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        return sprintf(
            "%s-%s",
            $this->playerOne->toTerm(),
            $this->playerTwo->toTerm()
        );
    }

    public function pointTo(Player $player)
    {
        $player->score();
    }


    /**
     * @return bool
     */
    public function hasWinner(): bool
    {
        if (max([$this->playerOne->points, $this->playerTwo->points]) < 4) {
            return false;
        }

        return abs($this->playerOne->points - $this->playerTwo->points) >= 2;
    }

    /**
     * @return string
     */
    public function leader(): Player
    {
        return $this->playerOne->points > $this->playerTwo->points
            ? $this->playerOne
            : $this->playerTwo;
    }

    /**
     * @return bool
     */
    protected function isDeuce(): bool
    {
        return $this->canBeWon() && $this->playerOne->points === $this->playerTwo->points;
    }

    protected function hasAdvantage()
    {
        if ($this->canBeWon()) {
            return ! $this->isDeuce();
        }

        return false;
    }

    /**
     * @return bool
     */
    protected function canBeWon(): bool
    {
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3;
    }
}