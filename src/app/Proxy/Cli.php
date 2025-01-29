<?php

namespace YukataRm\Proxy;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\CliManager;

/**
 * CLI Proxy
 *
 * @package YukataRm\Proxy
 *
 * @method static \YukataRm\Interface\Cli\ApplicationInterface application()
 *
 * @method static void runCommand(\YukataRm\Interface\Cli\CommandInterface $command, array<string|int, string|int> $argv)
 *
 * @see \YukataRm\Proxy\Manager\CliManager
 */
class Cli extends MethodProxy
{
    /**
     * called class name
     *
     * @var string
     */
    protected string $className = CliManager::class;
}
