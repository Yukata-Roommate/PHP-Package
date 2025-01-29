<?php

namespace YukataRm\Cli\Command;

use YukataRm\Cli\BaseCommand;

/**
 * Not Found Command
 *
 * @package YukataRm\Cli\Command
 */
class NotFoundCommand extends BaseCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "not-found";

    /**
     * command description
     *
     * @var string
     */
    protected string $description = "コマンドラインにエラーメッセージを表示する";

    /**
     * execute command process
     *
     * @return void
     */
    protected function execute(): void
    {
        $commandName = $this->input()->commandName();
        $arguments   = json_encode($this->input()->arguments(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        $this->output("Command not found.");
        $this->output("Command Name\t{$commandName}");
        $this->output("Arguments\t{$arguments}");
    }
}
