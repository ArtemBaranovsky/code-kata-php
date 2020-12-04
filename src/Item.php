<?php


namespace App;


class Item
{
    public $sellIn;

    public $quality;

    /**
     * Item constructor.
     * @param $sellIn
     * @param $quality
     */
    public function __construct($quality, $sellIn)
    {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function tick()
    {
        $this->sellIn--;
        $this->quality--;

        if ($this->sellIn <= 0) {
            $this->quality--;
        }

        if ($this->quality < 0) {
            $this->quality = 0;
        }
    }
}