<?php

namespace YukataRm\Proxy;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\RandomManager;

/**
 * Random Proxy
 *
 * @package YukataRm\Proxy
 *
 * @method static \YukataRm\Interface\Random\RandomizerInterface make()
 *
 * @method static string string(string $source, int $length = 16)
 * @method static string alphabet(int $length = 16)
 * @method static string alphabetLower(int $length = 16)
 * @method static string alphabetUpper(int $length = 16)
 * @method static string number(int $length = 16)
 * @method static string alphanumeric(int $length = 16)
 * @method static string alphanumericLower(int $length = 16)
 * @method static string alphanumericUpper(int $length = 16)
 * @method static string password(int $length = 16, string $symbols = "")
 *
 * @method static int int(int $min = 0, int $max = PHP_INT_MAX): int
 * @method static float float(float $min = 0, float $max = 1, int $decimals = 2)
 *
 * @method static bool bool(string|int|float $probability = 0.5, bool $isPercent = false)
 *
 * @see \YukataRm\Proxy\Manager\RandomManager
 */
class Random extends MethodProxy
{
    /**
     * called class name
     *
     * @var string
     */
    protected string $className = RandomManager::class;
}
