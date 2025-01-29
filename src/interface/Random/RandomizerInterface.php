<?php

namespace YukataRm\Interface\Random;

/**
 * Randomizer Interface
 *
 * @package YukataRm\Interface\Random
 */
interface RandomizerInterface
{
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
    public function string(string $source, int $length = 16): string;

    /**
     * get random alphabet
     *
     * @param int $length
     * @return string
     */
    public function alphabet(int $length = 16): string;

    /**
     * get random lower case alphabet
     *
     * @param int $length
     * @return string
     */
    public function alphabetLower(int $length = 16): string;

    /**
     * get random upper case alphabet
     *
     * @param int $length
     * @return string
     */
    public function alphabetUpper(int $length = 16): string;

    /**
     * get random number
     *
     * @param int $length
     * @return string
     */
    public function number(int $length = 16): string;

    /**
     * get random alphanumeric
     *
     * @param int $length
     * @return string
     */
    public function alphanumeric(int $length = 16): string;

    /**
     * get random lower case alphanumeric
     *
     * @param int $length
     * @return string
     */
    public function alphanumericLower(int $length = 16): string;

    /**
     * get random upper case alphanumeric
     *
     * @param int $length
     * @return string
     */
    public function alphanumericUpper(int $length = 16): string;

    /**
     * get random password
     *
     * @param int $length
     * @param string $symbols
     * @return string
     */
    public function password(int $length = 16, string $symbols = ""): string;

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
    public function int(int $min = 0, int $max = PHP_INT_MAX): int;

    /**
     * get random float
     *
     * @param float $min
     * @param float $max
     * @return float
     */
    public function float(float $min = 0, float $max = 1): float;

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
    public function bool(string|int|float $probability = 0.5, bool $isPercent = false): bool;
}
