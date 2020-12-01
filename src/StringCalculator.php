<?php


namespace App;


use Exception;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

//    protected $delimiter = ",|\n";
    protected $delimiter = ",|\n";
//    protected function parseString(string $numbers): array
//    {
//        $customDelimiter = "/\/\/(.)\n";
//
//        if (preg_match("/{$customDelimiter}/", $numbers, $matches)) {
//            $this->delimiter = $matches[1];
//
//            $numbers = str_replace($matches[0], '', $numbers);
//        }
//    }

    public function add(string $numbers)
    {
//        $delimiter = ",|\n";

//        if (! $numbers) {
//            return 0;
//        }

//        $numbers = $this->parseString($numbers);

        $this->disallowNegatives($numbers = $this->parseString($numbers));
//        $numbers = $this->ignoreGreaterThan1000($numbers);
        return array_sum($this
//            ->disallowNegatives($numbers)
            ->ignoreGreaterThan1000($numbers));
//        return intval($numbers);
    }

    /**
     * @param string $numbers
     */
    public function parseString(string $numbers): array
    {
        $customDelimiter = "\/\/(.)\n";

        if (preg_match("/{$customDelimiter}/", $numbers, $matches)) {
            $this->delimiter = $matches[1];
            $numbers = str_replace($matches[0], '', $numbers);
        }

//        $numbers = explode(",", $numbers);
//        $numbers = preg_split("/,|\n/", $numbers);
        return preg_split("/{$this->delimiter}/", $numbers);
    }

    /**
     * @param array $numbers
     * @throws Exception
     * @return StringCalculator
     */
    public function disallowNegatives(array $numbers): StringCalculator
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new Exception('Negative numbers are disallowed');
            }
        }
        return $this;
    }

    /**
     * @param array $numbers
     * @return array
     */
    public function ignoreGreaterThan1000(array $numbers): array
    {
        return array_filter($numbers, function ($number) {
            return $number <= self::MAX_NUMBER_ALLOWED;
        });
//        return array_filter($numbers, fn ($number) => $number <= self::MAX_NUMBER_ALLOWED);   // php 7.4 short closures
    }
}