<?php

namespace YukataRm\Cli;

use YukataRm\Interface\Cli\ArgvInputInterface;

/**
 * Input from Command Line
 *
 * @package YukataRm\Cli
 */
class ArgvInput implements ArgvInputInterface
{
    /*----------------------------------------*
     * Command
     *----------------------------------------*/

    /**
     * arguments from command line
     *
     * @var array<string|int, string|int>
     */
    protected array $arguments;

    /**
     * script name
     *
     * @var string
     */
    protected string $scriptName;

    /**
     * command name
     *
     * @var string
     */
    protected string $commandName;

    /**
     * constructor
     *
     * @param array<string>|array<string, string> $argv
     */
    public function __construct(array $argv = [])
    {
        $arguments = empty($argv) ? $_SERVER["argv"] : $argv;

        $this->scriptName  = array_shift($arguments);

        $this->commandName = empty($arguments) ? "" : array_shift($arguments);

        $arguments = $this->parseArguments($arguments);

        $this->arguments = $arguments;
    }

    /**
     * get arguments from command line
     *
     * @return array<string|int, string|int>
     */
    public function arguments(): array
    {
        return $this->arguments;
    }

    /**
     * get script name
     *
     * @return string
     */
    public function scriptName(): string
    {
        return $this->scriptName;
    }

    /**
     * get command name
     *
     * @return string
     */
    public function commandName(): string
    {
        return $this->commandName;
    }

    /*----------------------------------------*
     * Getter
     *----------------------------------------*/

    /**
     * get arguments by key
     *
     * @param int|string $name
     * @return int|string|null
     */
    public function get(string|int $name): int|string|null
    {
        return $this->has($name) ? $this->arguments[$name] : null;
    }

    /**
     * get arguments by key
     *
     * @param int|string $name
     * @return int|string|null
     */
    public function __get(string|int $name): int|string|null
    {
        return $this->get($name);
    }

    /*----------------------------------------*
     * Check
     *----------------------------------------*/

    /**
     * check if value of key exists in arguments property
     *
     * @param int|string $name
     * @return bool
     */
    public function has(string|int $name): bool
    {
        return isset($this->arguments[$name]);
    }

    /**
     * check if value of key is a string in arguments property
     *
     * @param int|string $name
     * @return bool
     */
    public function isString(string|int $name): bool
    {
        return $this->has($name) && is_string($this->arguments[$name]);
    }

    /**
     * check if value of key is an integer in arguments property
     *
     * @param int|string $name
     * @return bool
     */
    public function isInt(string|int $name): bool
    {
        return $this->has($name) && is_int($this->arguments[$name]);
    }

    /*----------------------------------------*
     * Parse
     *----------------------------------------*/

    /**
     * parse arguments from command line
     *
     * @param array<string|int, string|int> $arguments
     * @return array<string|int, string|int>
     */
    protected function parseArguments(array $arguments): array
    {
        $parsedArguments = [];

        while (count($arguments) > 0) {
            $argument = array_shift($arguments);

            if (preg_match("/^--/", $argument)) {
                $argument = preg_replace("/^--/", "", $argument);

                if (preg_match("/=/", $argument)) {
                    $argument = explode("=", $argument);

                    $key   = array_shift($argument);
                    $value = array_shift($argument);

                    $parsedArguments[$key] = $value;
                } else {
                    $value = array_shift($arguments);

                    $parsedArguments[$argument] = $value;
                }

                continue;
            }

            $parsedArguments[] = $argument;
        }

        return $parsedArguments;
    }
}
