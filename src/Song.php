<?php


namespace App;


class Song
{

    /**
     * Song constructor.
     */
    public function __construct()
    {

    }

    public function sing()
    {
//        return file_get_contents(__DIR__ . '/../tests/stubs/lyrics.stub');
        return implode("\r\n", array_map(function ($number) {
            return $this->verse($number);
        }, range(99,0)));
    }

    public function verse($number)
    {
        return
            ($number === 0 ? 'No more' : $number) . ($number === 1 ? ' bottle' : ' bottles') . " of beer on the wall\r\n".
            ($number === 0 ? 'No more' : $number) . ($number === 1 ? ' bottle' : ' bottles') . " of beer\r\n".
            ($number === 0 ? "Go to the store and buy some more\r\n" : "Take one down and pass it around\r\n").
            ($number === 1 ? 'No more' : ($number === 0 ? 99 : ($number-1))) . ($number === 2 ? ' bottle' : ' bottles') . " of beer on the wall"
            . ($number === 0 ? '' : "\r\n");
    }
}