<?php

namespace YukataRm\Cli\Trait;

/**
 * SAPI trait
 *
 * @package YukataRm\Cli\Trait
 */
trait Sapi
{
    /**
     * get SAPI name
     *
     * @return string
     */
    protected function sapiName(): string
    {
        return php_sapi_name();
    }

    /**
     * check SAPI is CLI
     *
     * @return bool
     */
    protected function isCli(): bool
    {
        return $this->sapiName() === "cli";
    }

    /**
     * get new line string
     *
     * @return string
     */
    protected function newLineString(): string
    {
        return $this->isCli() ? PHP_EOL : "<br />";
    }
}
