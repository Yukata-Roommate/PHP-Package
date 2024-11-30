<?php

namespace YukataRm\Interface\Cli;

/**
 * Application Interface
 *
 * @package YukataRm\Interface\Cli
 */
interface ApplicationInterface
{
    /*----------------------------------------*
     * Command
     *----------------------------------------*/

    /**
     * add command
     *
     * @param \YukataRm\Interface\Cli\CommandInterface|string $command
     * @return static
     */
    public function add(CommandInterface|string $command): static;

    /**
     * get command list
     *
     * @return array<string, \YukataRm\Interface\Cli\CommandInterface>
     */
    public function commands(): array;

    /**
     * run command
     *
     * @return void
     */
    public function run(): void;
}
