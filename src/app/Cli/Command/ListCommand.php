<?php

namespace YukataRm\Cli\Command;

use YukataRm\Cli\BaseCommand;

/**
 * Output All Registered Command List Command
 *
 * @package YukataRm\Cli\Command
 */
class ListCommand extends BaseCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "list";

    /**
     * command description
     *
     * @var string
     */
    protected string $description = "登録されているコマンド一覧を表示する";

    /**
     * execute command process
     *
     * @return void
     */
    protected function execute(): void
    {
        $this->output("Registered commands:");

        foreach ($this->application()->commands() as $command) {
            $this->output("\t{$command->commandName()}\t{$command->description()}");
        }
    }
}
