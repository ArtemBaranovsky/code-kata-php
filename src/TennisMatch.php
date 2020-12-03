<?php


namespace App;


class TennisMatch
{
//    protected $playerOnePoints = 0;
//    protected $playerTwoPoints = 0;

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
        // check if we have a winner
        if ($this->hasWinner()) {
            // winner player 1
//            return 'Winner: Player 1';
//            return 'Winner: ' . $this->leader();
            return 'Winner: ' . $this->leader()->name;
            // return $this->playerOnePoints > $this->playerTwoPoints ? 'Winner: Player 1' : 'Winner: Player 2';
        }

        // check if we have a winner
/*        if ($this->playerTwoPoints > 3 && $this->playerTwoPoints >= $this->playerOnePoints + 2) {
            // winner player 2
            return 'Winner: Player 2';
        }*/

        // check for advantage
        if ($this->hasAdvantage()) {
//            return 'Advantage: ' . $this->leader();
            return 'Advantage: ' . $this->leader()->name;
        }

        // check for deuce
        if ($this->isDeuce()) {
            return 'deuce';
        }

        // otherwise provide a default
        return sprintf(
            "%s-%s",
            $this->playerOne->toTerm(),
            $this->playerTwo->toTerm()
//            $this->pointsToTerm($this->playerOne->points),
//            $this->pointsToTerm($this->playerTwo->points)
        );
///*        if ($this->playerOnePoints > $this->playerTwoPoints +2) {
//            return 'forty-love';
//        }
//
//        if ($this->playerOnePoints > $this->playerTwoPoints +1) {
//            return 'thirty-love';
//        }
//
//        if ($this->playerOnePoints > $this->playerTwoPoints) {
//            return 'fifteen-love';
//        }
//
//        return 'love-love';*/
    }

    public function pointTo(Player $player)
    {
        $player->score();
    }

/*    public function pointToPlayerOne()
    {
        $this->playerOne->points++;
    }

    public function pointToPlayerTwo()
    {
        $this->playerTwo->points++;
    }*/

/*    public function pointsToTerm($points)
    {
        switch ($points) {
            case 0:
                return 'love';
            case 1:
                return 'fifteen';
            case 2:
                return 'thirty';
            case 3:
                return 'forty';
//            default: return ;
        }
//        return [
//            0 => 'love',
//            1 => 'fifteen',
//        ];
    }*/

    /**
     * @return bool
     */
    public function hasWinner(): bool
    {
        if (max([$this->playerOne->points, $this->playerTwo->points]) < 4) {
            return false;
        }

        return abs($this->playerOne->points - $this->playerTwo->points) >= 2;

//        return (
//            $this->playerOne->points >= $this->playerTwo->points + 2 ||
//            $this->playerTwo->points >= $this->playerOne->points + 2
//        );

//        return (
//            $this->playerOne->points > 3 && $this->playerOne->points >= $this->playerTwo->points + 2 ||
//            $this->playerTwo->points > 3 && $this->playerTwo->points >= $this->playerOne->points + 2
//        );

//        if ($this->playerOne->points > 3 && $this->playerOne->points >= $this->playerTwo->points + 2) {
//            return true;
//        }
//
//        if ($this->playerTwo->points > 3 && $this->playerTwo->points >= $this->playerOne->points + 2) {
//            return true;
//        }

        return false;
    }

    /**
     * @return string
     */
    public function leader(): Player
    {
        return $this->playerOne->points > $this->playerTwo->points
            ? $this->playerOne
            : $this->playerTwo;
//            ? 'Player 1'
//            : 'Player 2';
    }

    /**
     * @return bool
     */
    protected function isDeuce(): bool
    {
//        $canBeWon = $this->playerOnePoints >= 3 && $this->playerTwoPoints >= 3;
        return $this->canBeWon() && $this->playerOne->points === $this->playerTwo->points;
    }

    protected function hasAdvantage()
    {
/*        if (!$this->canBeWon()) {
            return false;
        }
        return ! $this->isDeuce();*/
        if ($this->canBeWon()) {
            return ! $this->isDeuce();
        }

        return false;

//        if ($this->canBeWon() && $this->playerOnePoints > $this->playerTwoPoints) {
/*        if ($this->playerOnePoints > $this->playerTwoPoints) {
            return true;
        }*/

/*        if (
            $this->playerOnePoints > $this->playerTwoPoints ||
            $this->playerTwoPoints > $this->playerOnePoints
        ) {
            return true;
        }

        return false;
*/

//        return $this->playerOnePoints != $this->playerTwoPoints;
/*        return (
            $this->playerOnePoints > $this->playerTwoPoints ||
            $this->playerTwoPoints > $this->playerOnePoints
        );*/

//        if ($this->canBeWon() && $this->playerTwoPoints > $this->playerOnePoints) {
/*        if ($this->playerTwoPoints > $this->playerOnePoints) {
            return true;
        }*/

    }

    /**
     * @return bool
     */
    protected function canBeWon(): bool
    {
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3;
    }
}