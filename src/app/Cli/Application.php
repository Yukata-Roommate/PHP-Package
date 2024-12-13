<?php

namespace YukataRm\Cli;

use YukataRm\Interface\Cli\ApplicationInterface;

use YukataRm\Interface\Cli\CommandInterface;

use YukataRm\Cli\ArgvInput;

use YukataRm\Cli\Command\ListCommand;
use YukataRm\Cli\Command\NotFoundCommand;

/**
 * Application
 *
 * @package YukataRm\Cli
 */
class Application implements ApplicationInterface
{
    /*----------------------------------------*
     * Command
     *----------------------------------------*/

    /**
     * command list
     *
     * @var array<string, \YukataRm\Interface\Cli\CommandInterface>
     */
    protected array $commands = [];

    /**
     * add command
     *
     * @param \YukataRm\Interface\Cli\CommandInterface|string $command
     * @return static
     */
    public function add(CommandInterface|string $command): static
    {
        if (is_string($command)) {
            $command = new $command();

            if (!($command instanceof CommandInterface)) throw new \RuntimeException("{$command} is not instance of CommandInterface");
        }

        $this->commands[$command->commandName()] = $command;

        return $this;
    }

    /**
     * get command list
     *
     * @return array<string, \YukataRm\Interface\Cli\CommandInterface>
     */
    public function commands(): array
    {
        return $this->commands;
    }

    /**
     * run command
     *
     * @return void
     */
    public function run(): void
    {
        $input = new ArgvInput();

        $commandName = $input->commandName();

        $command = match (true) {
            isset($this->commands[$commandName]) => $this->commands[$commandName],

            empty($commandName) || $commandName === "list" => new ListCommand(),

            default => new NotFoundCommand(),
        };

        $command->run($this, $input);
    }
}
