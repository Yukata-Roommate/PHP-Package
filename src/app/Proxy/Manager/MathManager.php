<?php

namespace YukataRm\Proxy\Manager;

use YukataRm\Interface\Math\CalculatorInterface;
use YukataRm\Math\Calculator;

/**
 * Math Proxy Manager
 *
 * @package YukataRm\Proxy\Manager
 */
class MathManager
{
    /**
     * make Calculator instance
     *
     * @return \YukataRm\Interface\Math\CalculatorInterface
     */
    public function calculator(): CalculatorInterface
    {
        return new Calculator();
    }

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
        return $this->calculator()->addition($augend, $addend, $isRound);
    }

    /**
     * calculate sum of augend and addend
     *
     * @param int|float $augend
     * @param int|float $addend
     * @param bool $isRound
     * @return int|float
     */
    public function add(int|float $augend, int|float $addend, bool $isRound = false): int|float
    {
        return $this->addition($augend, $addend, $isRound);
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
        return $this->calculator()->subtraction($minuend, $subtrahend, $isRound);
    }

    /**
     * calculate difference between minuend and subtrahend
     *
     * @param int|float $minuend
     * @param int|float $subtrahend
     * @param bool $isRound
     * @return int|float
     */
    public function sub(int|float $minuend, int|float $subtrahend, bool $isRound = false): int|float
    {
        return $this->subtraction($minuend, $subtrahend, $isRound);
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
        return $this->calculator()->multiplication($multiplicand, $multiplier, $isRound);
    }

    /**
     * calculate product of multiplicand and multiplier
     *
     * @param int|float $multiplicand
     * @param int|float $multiplier
     * @param bool $isRound
     * @return int|float
     */
    public function mul(int|float $multiplicand, int|float $multiplier, bool $isRound = false): int|float
    {
        return $this->multiplication($multiplicand, $multiplier, $isRound);
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
        return $this->calculator()->division($dividend, $divisor, $isRound);
    }

    /**
     * calculate quotient of dividend and divisor
     *
     * @param int|float $dividend
     * @param int|float $divisor
     * @param bool $isRound
     * @return int|float
     */
    public function div(int|float $dividend, int|float $divisor, bool $isRound = false): int|float
    {
        return $this->division($dividend, $divisor, $isRound);
    }

    /**
     * calculate remainder of dividend and divisor
     *
     * @param int $dividend
     * @param int $divisor
     * @return int
     */
    public function remainder(int|float $dividend, int|float $divisor): int
    {
        return $this->calculator()->remainder($dividend, $divisor);
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
        return $this->calculator()->power($number, $exponent);
    }

    /**
     * calculate square of number
     *
     * @param int|float $number
     * @return int|float
     */
    public function squared(int|float $number): int|float
    {
        return $this->calculator()->squared($number);
    }

    /**
     * calculate cube of number
     *
     * @param int|float $number
     * @return int|float
     */
    public function cubed(int|float $number): int|float
    {
        return $this->calculator()->cubed($number);
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
        return $this->calculator()->isOdd($number);
    }

    /**
     * check if number is even
     *
     * @param int $number
     * @return bool
     */
    public function isEven(int $number): bool
    {
        return $this->calculator()->isEven($number);
    }

    /**
     * check if number is prime
     *
     * @param int $number
     * @return bool
     */
    public function isPrime(int $number): bool
    {
        return $this->calculator()->isPrime($number);
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
        return $this->calculator()->factorial($number, $returnString);
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
        return $this->calculator()->primeCount($number, $primeNumber);
    }

    /**
     * calculate prime factorization of number
     *
     * @param int $number
     * @return array<int, int>
     */
    public function primeFactorization(int $number): array
    {
        return $this->calculator()->primeFactorization($number);
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
        return $this->calculator()->fibonacci($number);
    }
}
