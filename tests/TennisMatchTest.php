<?php


use App\Player;
use App\TennisMatch;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    /**
     * @test
     * @dataProvider scores
     */
//    function it_scores_0_to_0()
    function it_scores_a_tennis_match($playerOnePoints, $playerTwoPoints, $score)
    {
//        $match = new TennisMatch();
//        $match = new TennisMatch('Player 1', 'Player 2');
//        $match = new TennisMatch('John', 'Jane');
        $match = new TennisMatch(
            $john = new Player('John'),
            $jane = new Player('Jane')
        );

        for ($i = 0; $i < $playerOnePoints; $i++) {
//            $match->pointToPlayerOne();
//            $match->pointTo($john);
            $john->score();
        }

        for ($i = 0; $i < $playerTwoPoints; $i++) {
//            $match->pointToPlayerTwo();
//            $match->pointTo($jane);
            $jane->score();
        }

//        $match->pointToPlayerTwo();
        $this->assertEquals($score, $match->score());
//        $this->assertEquals('love-love', $match->score());
    }

    function scores()
    {
        return [
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [1, 1, 'fifteen-fifteen'], // 'fifteen-all'
            [2, 0, 'thirty-love'],
            [2, 2, 'thirty-thirty'],
            [3, 0, 'forty-love'],
            [3, 3, 'deuce'],
            [4, 4, 'deuce'],
            [5, 5, 'deuce'],
            [4, 3, 'Advantage: John'],
            [3, 4, 'Advantage: Jane'],
            [4, 0, 'Winner: John'],
            [0, 4, 'Winner: Jane'],
        ];
    }


/*    function it_scores_1_to_0()
    {
        $match = new TennisMatch();

        $match->pointToPlayerOne();

        $this->assertEquals('fifteen-love', $match->score());
    }*/

/*    function it_scores_2_to_0()
    {
        $match = new TennisMatch();

        $match->pointToPlayerOne();
        $match->pointToPlayerOne();
//        $match->pointToPlayerTwo();

        $this->assertEquals('thirty-love', $match->score());
    }*/
}
