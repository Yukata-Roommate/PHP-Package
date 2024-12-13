<?php

namespace YukataRm\Proxy;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\MathManager;

/**
 * Math Proxy
 *
 * @package YukataRm\Proxy
 *
 * @method static \YukataRm\Interface\Math\CalculatorInterface calculator()
 *
 * @method static int|float addition(int|float $augend, int|float $addend, bool $isRound = false)
 * @method static int|float add(int|float $augend, int|float $addend, bool $isRound = false)
 * @method static int|float subtraction(int|float $minuend, int|float $subtrahend, bool $isRound = false)
 * @method static int|float sub(int|float $minuend, int|float $subtrahend, bool $isRound = false)
 * @method static int|float multiplication(int|float $multiplicand, int|float $multiplier, bool $isRound = false)
 * @method static int|float mul(int|float $multiplicand, int|float $multiplier, bool $isRound = false)
 * @method static int|float division(int|float $dividend, int|float $divisor, bool $isRound = false)
 * @method static int|float div(int|float $dividend, int|float $divisor, bool $isRound = false)
 * @method static int remainder(int|float $dividend, int|float $divisor)
 * @method static int|float power(int|float $number, int $exponent)
 * @method static int|float squared(int|float $number)
 * @method static int|float cubed(int|float $number)
 *
 * @method static bool isOdd(int $number)
 * @method static bool isEven(int $number)
 * @method static bool isPrime(int $number)
 *
 * @method static string|int factorial(int $number, bool $returnString = false)
 *
 * @method static int primeCount(int $number)
 * @method static array primeFactorization(int $number)
 *
 * @method static int fibonacci(int $number)
 *
 * @see \YukataRm\Proxy\Manager\MathManager
 */
class Math extends MethodProxy
{
    /**
     * called class name
     *
     * @var string
     */
    protected string $className = MathManager::class;
}
