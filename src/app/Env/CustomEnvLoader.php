<?php

namespace YukataRm\Env;

use YukataRm\Env\EnvLoader;

/**
 * Custom Env Loader
 *
 * @package YukataRm\Env
 */
abstract class CustomEnvLoader extends EnvLoader
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * .env file path
     *
     * @var string
     */
    protected string $path = __DIR__ . "/../../../../../../";

    /**
     * .env common prefix
     *
     * @var string
     */
    protected string $commonPrefix = "YR";

    /**
     * .env prefix
     *
     * @var string
     */
    protected string $prefix;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * get .env key name
     *
     * @param string $key
     * @return string
     */
    protected function envKey(string $key): string
    {
        return "{$this->commonPrefix}_{$this->prefix}_{$key}";
    }
}
