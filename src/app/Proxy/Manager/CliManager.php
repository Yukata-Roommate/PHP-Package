<?php

namespace YukataRm\Proxy\Manager;

use YukataRm\Interface\Cli\ApplicationInterface;
use YukataRm\Interface\Cli\CommandInterface;
use YukataRm\Cli\Application;
use YukataRm\Cli\ArgvInput;

/**
 * CLI Proxy Manager
 *
 * @package YukataRm\Proxy\Manager
 */
class CliManager
{
    /**
     * make Application instance
     *
     * @return \YukataRm\Interface\Cli\ApplicationInterface
     */
    public function application(): ApplicationInterface
    {
        return new Application();
    }

    /*----------------------------------------*
     * Command
     *----------------------------------------*/

    /**
     * run command
     *
     * @param \YukataRm\Interface\Cli\CommandInterface $command
     * @param array<string|int, string|int> $argv
     * @return void
     */
    public function runCommand(CommandInterface $command, array $argv): void
    {
        $input = new ArgvInput($this->parseArgv($command, $argv));

        $application = $this->application();

        $application->add($command);

        $command->run($application, $input);
    }

    /**
     * parse argv input
     *
     * @param \YukataRm\Interface\Cli\CommandInterface $command
     * @param array<string|int, string|int> $argv
     * @return array<string>
     */
    protected function parseArgv(CommandInterface $command, array $argv): array
    {
        $parsedArgv = [
            basename($this::class),
            $command->commandName()
        ];

        foreach ($argv as $key => $value) {
            if (is_string($key)) $parsedArgv[] = "--{$key}";

            $parsedArgv[] = $value;
        }

        return $parsedArgv;
    }
}
