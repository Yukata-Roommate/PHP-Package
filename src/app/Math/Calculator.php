<?php

namespace YukataRm\Math;

use YukataRm\Interface\Math\CalculatorInterface;

/**
 * Calculator
 *
 * @package YukataRm\Math
 */
class Calculator implements CalculatorInterface
{
    /*----------------------------------------*
     * Operate
     *----------------------------------------*/

    /**
     * calculate sum of augend and addend
     *
     * @param int|float $augend
     * @param int|float $addend
     * @param bool $isRound
     * @return int|float
     */
    public function addition(int|float $augend, int|float $addend, bool $isRound = false): int|float
    {
        $result = $augend + $addend;

        return $isRound ? round($result) : $result;
    }

    /**
     * calculate difference between minuend and subtrahend
     *
     * @param int|float $minuend
     * @param int|float $subtrahend
     * @param bool $isRound
     * @return int|float
     */
    public function subtraction(int|float $minuend, int|float $subtrahend, bool $isRound = false): int|float
    {
        $result = $minuend - $subtrahend;

        return $isRound ? round($result) : $result;
    }

    /**
     * calculate product of multiplicand and multiplier
     *
     * @param int|float $multiplicand
     * @param int|float $multiplier
     * @param bool $isRound
     * @return int|float
     */
    public function multiplication(int|float $multiplicand, int|float $multiplier, bool $isRound = false): int|float
    {
        $result = $multiplicand * $multiplier;

        return $isRound ? round($result) : $result;
    }

    /**
     * calculate quotient of dividend and divisor
     *
     * @param int|float $dividend
     * @param int|float $divisor
     * @param bool $isRound
     * @return int|float
     */
    public function division(int|float $dividend, int|float $divisor, bool $isRound = false): int|float
    {
        $result = $dividend / $divisor;

        return $isRound ? round($result) : $result;
    }

    /**
     * calculate remainder of dividend and divisor
     *
     * @param int|float $dividend
     * @param int|float $divisor
     * @return int
     */
    public function remainder(int|float $dividend, int|float $divisor): int
    {
        return $dividend % $divisor;
    }

    /**
     * calculate power of number and exponent
     *
     * @param int|float $number
     * @param int $exponent
     * @return int|float
     */
    public function power(int|float $number, int $exponent): int|float
    {
        return pow($number, $exponent);
    }

    /**
     * calculate square of number
     *
     * @param int|float $number
     * @return int|float
     */
    public function squared(int|float $number): int|float
    {
        return $this->power($number, 2);
    }

    /**
     * calculate cube of number
     *
     * @param int|float $number
     * @return int|float
     */
    public function cubed(int|float $number): int|float
    {
        return $this->power($number, 3);
    }

    /*----------------------------------------*
     * Check
     *----------------------------------------*/

    /**
     * check if number is odd
     *
     * @param int $number
     * @return bool
     */
    public function isOdd(int $number): bool
    {
        return $number & 1;
    }

    /**
     * check if number is even
     *
     * @param int $number
     * @return bool
     */
    public function isEven(int $number): bool
    {
        return !$this->isOdd($number);
    }

    /**
     * check if number is prime
     *
     * @param int $number
     * @return bool
     */
    public function isPrime(int $number): bool
    {
        if ($number <= 1) return false;

        if ($number === 2) return true;

        if ($this->isEven($number)) return false;

        $sqrt = sqrt($number);

        if (is_int($sqrt)) return false;

        $max = floor($sqrt);

        for ($i = 3; $i <= $max; $i += 2) {
            if ($number % $i == 0) return false;
        }

        return true;
    }

    /*----------------------------------------*
     * Factorial
     *----------------------------------------*/

    /**
     * calculate factorial of number
     *
     * @param int $number
     * @param bool $returnString
     * @return string|int
     */
    public function factorial(int $number, bool $returnString = false): string|int
    {
        if ($number < 0) throw new \RuntimeException("factorial of a negative number is not defined.");

        if ($number === 0) return $returnString ? "1" : 1;

        $result = "1";

        for ($i = 1; $i <= $number; $i++) {
            $result = bcmul($result, $i);
        }

        return $returnString ? $result : (int)$result;
    }

    /*----------------------------------------*
     * Prime
     *----------------------------------------*/

    /**
     * count number of prime factors of number
     *
     * @param int $number
     * @param int $primeNumber
     * @return int
     */
    public function primeCount(int $number, int $primeNumber): int
    {
        if (!$this->isPrime($primeNumber)) return 0;

        if ($number <= 1) return 0;

        if ($this->isPrime($number)) return $number === $primeNumber ? 1 : 0;

        $count = 0;

        while ($number % $primeNumber === 0) {
            $count++;
            $number /= $primeNumber;
        }

        return $count;
    }

    /**
     * calculate prime factorization of number
     *
     * @param int $number
     * @return array<int, int>
     */
    public function primeFactorization(int $number): array
    {
        $result = [];

        if ($number <= 1) return $result;

        if ($this->isPrime($number)) return [$number];

        if ($number % 2 === 0) {
            $count = $this->primeCount($number, 2);

            $result[2] = $count;
            $number /= $this->power(2, $count);

            if ($number === 1) return $result;
        }

        $max = floor(sqrt($number));
        $count = 0;

        for ($i = 3; $i <= $max; $i += 2) {

            $count = $this->primeCount($number, $i);

            if ($count > 0) {
                $result[$i] = $count;
                $number /= $this->power($i, $count);
            }

            if ($number === 1) return $result;
        }

        $result[$number] = 1;

        return $result;
    }

    /*----------------------------------------*
     * Fibonacci
     *----------------------------------------*/

    /**
     * calculate fibonacci of number
     *
     * @param int $number
     * @return int
     */
    public function fibonacci(int $number): int
    {
        if ($number <= 0) throw new \RuntimeException("fibonacci of a negative number is not defined.");

        $x = 1 / sqrt(5);
        $a = ((1 + sqrt(5)) / 2) ** $number;
        $b = ((1 - sqrt(5)) / 2) ** $number;

        $result = $x * ($a - $b);

        return round($result);
    }
}
