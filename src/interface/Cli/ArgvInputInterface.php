<?php

namespace YukataRm\Interface\Cli;

/**
 * ArgvInput Interface
 *
 * @package YukataRm\Interface\Cli
 */
interface ArgvInputInterface
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * get arguments from command line
     *
     * @return array<string|int, string|int>
     */
    public function arguments(): array;

    /**
     * get script name
     *
     * @return string
     */
    public function scriptName(): string;

    /**
     * get command name
     *
     * @return string
     */
    public function commandName(): string;

    /*----------------------------------------*
     * Getter
     *----------------------------------------*/

    /**
     * get arguments by key
     *
     * @param int|string $name
     * @return int|string|null
     */
    public function get(string|int $name): int|string|null;

    /**
     * get arguments by key
     *
     * @param int|string $name
     * @return int|string|null
     */
    public function __get(string|int $name): int|string|null;

    /*----------------------------------------*
     * Check
     *----------------------------------------*/

    /**
     * check if value of key exists in arguments property
     *
     * @param int|string $name
     * @return bool
     */
    public function has(string|int $name): bool;

    /**
     * check if value of key is a string in arguments property
     *
     * @param int|string $name
     * @return bool
     */
    public function isString(string|int $name): bool;

    /**
     * check if value of key is an integer in arguments property
     *
     * @param int|string $name
     * @return bool
     */
    public function isInt(string|int $name): bool;
}
