<?php

namespace App;

use InvalidArgumentException;

class GildedRose
{
//    public $name;
//
//    public $quality;
//
//    public $sellIn;
//
//    public function __construct($name, $quality, $sellIn)
//    {
//        $this->name = $name;
//        $this->quality = $quality;
//        $this->sellIn = $sellIn;
//    }

    private static $items = [
        'normal' => Item::class,
        'Aged Brie' => Brie::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstagePasses::class,
        'Conjured Mana Cake' => Conjured::class,
    ];

    public static function of($name, $quality, $sellIn)
    {

        if (! array_key_exists($name, self::$items)) {
            throw new InvalidArgumentException('Item type does not exist.');
        }

        $class = self::$items[$name];

        return new $class($quality, $sellIn);

/*        switch ($name) {
            case 'normal':
//                return $this->normalTick();
                return new Item($quality, $sellIn);

            case 'Aged Brie':
//                return $this->brieTick();
                return new Brie($quality, $sellIn);

            case 'Sulfuras, Hand of Ragnaros':
//                return $this->sulfurasTick();
                return new Sulfuras($quality, $sellIn);

            case 'Backstage passes to a TAFKAL80ETC concert':
//                return $this->backstagePassesTick();
                return new BackstagePasses($quality, $sellIn);
        }*/
//        return new static($name, $quality, $sellIn);
    }

//    public function tick()
//    {

//        if ($this->name === 'normal') {
//            return $this->normalTick();
//        }
//
//        if ($this->name === 'Aged Brie') {
//            return $this->brieTick();
//        }
//
//        if ($this->name === 'Sulfuras, Hand of Ragnaros') {
//            return $this->sulfurasTick();
//        }
//
//        if ($this->name === 'Backstage passes to a TAFKAL80ETC concert') {
//            return $this->backstagePassesTick();
//        }

//        if ($this->name != 'Aged Brie' and $this->name != 'Backstage passes to a TAFKAL80ETC concert') {
//            if ($this->quality > 0) {
//                if ($this->name != 'Sulfuras, Hand of Ragnaros') {
//                    $this->quality = $this->quality - 1;
//                }
//            }
//        } else {
//            if ($this->quality < 50) {
//                $this->quality = $this->quality + 1;
//
//                if ($this->name == 'Backstage passes to a TAFKAL80ETC concert') {
//                    if ($this->sellIn < 11) {
//                        if ($this->quality < 50) {
//                            $this->quality = $this->quality + 1;
//                        }
//                    }
//                    if ($this->sellIn < 6) {
//                        if ($this->quality < 50) {
//                            $this->quality = $this->quality + 1;
//                        }
//                    }
//                }
//            }
//        }

//        if ($this->name != 'Sulfuras, Hand of Ragnaros') {
//            $this->sellIn = $this->sellIn - 1;
//        }

//        if ($this->sellIn < 0) {
//            if ($this->name != 'Aged Brie') {
//                if ($this->name != 'Backstage passes to a TAFKAL80ETC concert') {
//                    if ($this->quality > 0) {
//                        if ($this->name != 'Sulfuras, Hand of Ragnaros') {
//                            $this->quality = $this->quality - 1;
//                        }
//                    }
//                } else {
//                    $this->quality = $this->quality - $this->quality;
//                }
//            } else {
//                if ($this->quality < 50) {
//                    $this->quality = $this->quality + 1;
//                }
//            }
//        }
//    }

/*    private function normalTick()
    {
        $this->sellIn--;
//
//        if ($this->quality <= 0) {
//            return;
//        }
        $this->quality--;

        if ($this->sellIn <= 0) { // && $this->quality > 0
            $this->quality--;
        }

        if ($this->quality < 0) {
            $this->quality = 0;
        }
    }*/

/*    private function brieTick()
    {
        $this->sellIn--;
        $this->quality++;

//        if ($this->quality < 50) {
//            $this->quality++;
//        }

//        if ($this->quality < 50) {
            if ($this->sellIn <= 0 ) {
                $this->quality++;
            }
//        }
        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }*/

/*    private function sulfurasTick()
    {

    }*/

/*    private function backstagePassesTick()
    {
//        $this->sellIn--;
        $this->quality++;

        if ($this->sellIn <= 10) {
            $this->quality++;
        }

        if ($this->sellIn <= 5) {
            $this->quality++;
        }

        if ($this->sellIn <= 0) {
            $this->quality = 0;
        }

        if ($this->quality > 50) {
            $this->quality = 50;
        }

        $this->sellIn--;
    }*/
}
