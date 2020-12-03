<?php


namespace App;


class Player
{
    /**
     * @var string
     */
    public $name;
    public $points = 0;


    /**
     * Player constructor.
     * @param string $string
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function score()
    {
        $this->points++;
    }

    public function toTerm()
    {
        switch ($this->points) {
            case 0:
                return 'love';
            case 1:
                return 'fifteen';
            case 2:
                return 'thirty';
            case 3:
                return 'forty';
        }
    }
}