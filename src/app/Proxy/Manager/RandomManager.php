<?php

namespace YukataRm\Proxy\Manager;

use YukataRm\Interface\Random\RandomizerInterface;
use YukataRm\Random\Randomizer;

/**
 * Random Proxy Manager
 *
 * @package YukataRm\Proxy\Manager
 */
class RandomManager
{
    /**
     * make Randomizer instance
     *
     * @return \YukataRm\Interface\Random\RandomizerInterface
     */
    public function make(): RandomizerInterface
    {
        return new Randomizer();
    }

    /*----------------------------------------*
     * Text
     *----------------------------------------*/

    /**
     * get random string
     *
     * @param string $source
     * @param int $length
     * @return string
     */
    public function string(string $source, int $length = 16): string
    {
        return $this->make()->string($source, $length);
    }

    /**
     * get random alphabet
     *
     * @param int $length
     * @return string
     */
    public function alphabet(int $length = 16): string
    {
        return $this->make()->alphabet($length);
    }

    /**
     * get random lower case alphabet
     *
     * @param int $length
     * @return string
     */
    public function alphabetLower(int $length = 16): string
    {
        return $this->make()->alphabetLower($length);
    }

    /**
     * get random upper case alphabet
     *
     * @param int $length
     * @return string
     */
    public function alphabetUpper(int $length = 16): string
    {
        return $this->make()->alphabetUpper($length);
    }

    /**
     * get random number
     *
     * @param int $length
     * @return string
     */
    public function number(int $length = 16): string
    {
        return $this->make()->number($length);
    }

    /**
     * get random alphanumeric
     *
     * @param int $length
     * @return string
     */
    public function alphanumeric(int $length = 16): string
    {
        return $this->make()->alphanumeric($length);
    }

    /**
     * get random lower case alphanumeric
     *
     * @param int $length
     * @return string
     */
    public function alphanumericLower(int $length = 16): string
    {
        return $this->make()->alphanumericLower($length);
    }

    /**
     * get random upper case alphanumeric
     *
     * @param int $length
     * @return string
     */
    public function alphanumericUpper(int $length = 16): string
    {
        return $this->make()->alphanumericUpper($length);
    }

    /**
     * get random password
     *
     * @param int $length
     * @param string $symbols
     * @return string
     */
    public function password(int $length = 16, string $symbols = ""): string
    {
        return $this->make()->password($length, $symbols);
    }

    /*----------------------------------------*
     * Number
     *----------------------------------------*/

    /**
     * get random int
     *
     * @param int $min
     * @param int $max
     * @return int
     */
    public function int(int $min = 0, int $max = PHP_INT_MAX): int
    {
        return $this->make()->int($min, $max);
    }

    /**
     * get random float
     *
     * @param float $min
     * @param float $max
     * @param int $decimals
     * @return float
     */
    public function float(float $min = 0, float $max = 1, int $decimals = 2): float
    {
        return $this->make()->float($min, $max, $decimals);
    }

    /*----------------------------------------*
     * Bool
     *----------------------------------------*/

    /**
     * get random bool
     *
     * @param string|int|float $probability
     * @param bool $isPercent
     * @return bool
     */
    public function bool(string|int|float $probability = 0.5, bool $isPercent = false): bool
    {
        return $this->make()->bool($probability, $isPercent);
    }
}
