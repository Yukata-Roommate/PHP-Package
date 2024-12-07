<?php

namespace YukataRm\Interface\Cli;

use YukataRm\Interface\Cli\ApplicationInterface;
use YukataRm\Interface\Cli\ArgvInputInterface;

/**
 * Command Interface
 *
 * @package YukataRm\Interface\Cli
 */
interface CommandInterface
{
    /*----------------------------------------*
     * Config
     *----------------------------------------*/

    /**
     * get command name
     *
     * @return string
     */
    public function commandName(): string;

    /**
     * get command description
     *
     * @return string
     */
    public function description(): string;

    /*----------------------------------------*
     * Run
     *----------------------------------------*/

    /**
     * run command
     *
     * @param \YukataRm\Interface\Cli\ApplicationInterface $application
     * @param \YukataRm\Interface\Cli\ArgvInputInterface $input
     * @return void
     */
    public function run(ApplicationInterface $application, ArgvInputInterface $input): void;
}
