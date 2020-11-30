<?php


namespace App;


class Game
{
    /**
     * The number of frames in a game
    */

    const FRAMES_PER_GAME = 10;

    /**
     * All rolls for a game
     *
     * @var array
     */
    protected $rolls = [];

    /**
     * Roll the ball
     *
     * @param int $pins
     */
    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }


    /**
     * Calculate the final score
     *
     * @return int|mixed|void
     */
    public function score()
    {
//        return 0;
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            // check for a strike
            if ($this->isStrike($roll)) {
//                $score += $this->rolls[$roll] + $this->strikeBonus($roll);
                $score += $this->pinCount($roll) + $this->strikeBonus($roll);
                // strike bonus
//                $score += $this->rolls[$roll];
//                // strike bonus
//                $score += $this->strikeBonus($roll);

                $roll++;

                continue;
            }

            $score += $this->defaultFrameScore($roll);

            // check for a spare
            if ($this->isSpare($roll)) {
                // you got a spare
//                $score += $this->defaultFrameScore($roll);
//                $score += $this->spareBonus($roll);
                $score += $this->spareBonus($roll);
            }

            $roll += 2;
        }

        return $score;
//        return array_sum($this->rolls);
    }

    /**
     * Determine if the current roll was a strike
     *
     * @param int $roll
     * @return bool
     */
    public function isStrike(int $roll): bool
    {
//        return $this->rolls[$roll] === 10;
        return $this->pinCount($roll) === 10;
    }

    /**
     * Determine if the current roll was a spare
     * @param int $roll
     * @return bool
     */
    public function isSpare(int $roll): bool
    {
        return $this->defaultFrameScore($roll) === 10;
    }

    /**
     * Calculate the score for a frame
     *
     * @param int $roll
     * @return int
     */
    public function defaultFrameScore(int $roll): int
    {
//        return $this->rolls[$roll] + $this->rolls[$roll + 1];
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }

    /**
     * Gets the bonus for a strike
     * @param int $roll
     * @return int
     */
    public function strikeBonus(int $roll): int
    {
        return $this->pinCount($roll + 1 ) + $this->pinCount($roll + 2);
//        return $this->defaultFrameScore($roll + 1);
//        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }

    /**
     * Gets the bonus for a spare
     * @param int $roll
     * @return int
     */
    public function spareBonus(int $roll): int
    {
        return $this->pinCount($roll + 2);
    }

    public function pinCount(int $roll): int
    {
        return $this->rolls[$roll];
    }
}