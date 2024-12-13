<?php

namespace YukataRm\Db\Dumper;

use YukataRm\Interface\Db\Dumper\BaseDumperInterface;

use YukataRm\Env\DbEnvLoader;
use YukataRm\Proxy\File\Operator;

/**
 * Base Dumper
 *
 * @package YukataRm\Db\Dumper
 */
abstract class BaseDumper implements BaseDumperInterface
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * EnvLoader instance
     *
     * @var \YukataRm\Env\DbEnvLoader
     */
    protected DbEnvLoader $env;

    /**
     * constructor
     */
    public function __construct()
    {
        $this->env = new DbEnvLoader();
    }

    /*----------------------------------------*
     * Dump Database
     *----------------------------------------*/

    /**
     * get driver name
     *
     * @return string
     */
    abstract public function driver(): string;

    /**
     * dump database
     *
     * @return bool
     */
    public function dump(): bool
    {
        $this->setCommand();

        $this->createDumpFile();

        return $this->executeCommand();
    }

    /**
     * add driver name
     *
     * @return void
     */
    protected function addDriverName(): void
    {
        $this->addCommand($this->driver());
    }

    /**
     * set dump command
     *
     * @return void
     */
    abstract protected function setCommand(): void;

    /**
     * execute dump command
     *
     * @return bool
     */
    protected function executeCommand(): bool
    {
        $command = $this->commandString();

        $command = $this->prepareExecuteCommand($command);

        $output = exec($command);

        $output = $this->passesExecuteCommand($output);

        return $output !== null;
    }

    /**
     * prepare execute command
     *
     * @param string $command
     * @return string
     */
    protected function prepareExecuteCommand(string $command): string
    {
        return $command;
    }

    /**
     * passes execute command
     *
     * @param string $output
     * @return string
     */
    protected function passesExecuteCommand(string $output): string
    {
        return $output;
    }

    /*----------------------------------------*
     * Dump Command
     *----------------------------------------*/

    /**
     * dump commands
     *
     * @var array<string>
     */
    protected array $commands = [];

    /**
     * get dump command
     *
     * @return array<string>
     */
    public function command(): array
    {
        return $this->commands;
    }

    /**
     * get dump command string
     *
     * @return string
     */
    public function commandString(): string
    {
        return implode(" ", $this->commands);
    }

    /**
     * add dump command
     *
     * @param string $command
     * @return static
     */
    public function addCommand(string $command): static
    {
        $this->commands[] = $command;

        return $this;
    }

    /*----------------------------------------*
     * Dump File
     *----------------------------------------*/

    /**
     * dump file path
     *
     * @var string
     */
    protected string $dumpFile;

    /**
     * get dump file path
     *
     * @return string
     */
    public function dumpFile(): string
    {
        return $this->dumpFile;
    }

    /**
     * set dump file path
     *
     * @param string $dumpFile
     * @return static
     */
    public function setDumpFile(string $dumpFile): static
    {
        $this->dumpFile = $dumpFile;

        return $this;
    }

    /**
     * add dump file path
     *
     * @return void
     */
    abstract protected function addDumpFile(): void;

    /**
     * create dump file
     *
     * @return void
     */
    protected function createDumpFile(): void
    {
        $operator = Operator::makeFrom($this->dumpFile);

        if ($operator->isExists()) return;

        $operator->create();
    }
}
