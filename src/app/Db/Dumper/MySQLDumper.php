<?php

namespace YukataRm\Db\Dumper;

use YukataRm\Interface\Db\Dumper\MySQLDumperInterface;
use YukataRm\Db\Dumper\BaseDumper;

use YukataRm\Proxy\Text;

/**
 * MySQL Dumper
 *
 * @package YukataRm\Db\Dumper
 *
 * @method static bindAddress(string $ipAddress)
 * @method static compress()
 * @method static compressionAlgorithms(string $algorithm)
 * @method static defaultAuth(string $plugin)
 * @method static enableCleartextPlugin()
 * @method static getServerPublicKey()
 * @method static host(string $host)
 * @method static loginPath(string $path)
 * @method static password(string $password)
 * @method static pipe()
 * @method static pluginDir(string $directory)
 * @method static port(int $port)
 * @method static protocol(string $protocol)
 * @method static serverPublicKeyPath(string $path)
 * @method static socket(string $path)
 * @method static ssl()
 * @method static sslFipsMode(string $mode)
 * @method static tlsCiphersuites(string $ciphersuites)
 * @method static tlsVersion(string $version)
 * @method static user(string $user)
 * @method static zstdCompressionLevel(string $level)
 *
 * @method static defaultsExtraFile(string $file)
 * @method static defaultsFile(string $file)
 * @method static defaultsGroupSuffix(string $suffix)
 * @method static noDefaults()
 * @method static printDefaults()
 *
 * @method static addDropDatabase()
 * @method static addDropTable()
 * @method static addDropTrigger()
 * @method static allTablespaces()
 * @method static noCreateDb()
 * @method static noCreateInfo()
 * @method static noTablespaces()
 * @method static replace()
 *
 * @method static allowKeywords()
 * @method static comments()
 * @method static debug(string $option)
 * @method static debugCheck()
 * @method static debugInfo()
 * @method static dumpDate()
 * @method static force()
 * @method static logError(string $file)
 * @method static skipComments()
 * @method static verbose()
 *
 * @method static help()
 * @method static version()
 *
 * @method static characterSetsDir(string $directory)
 * @method static defaultCharacterSet(string $charset)
 * @method static noSetNames()
 * @method static setCharset()
 *
 * @method static applySlaveStatements()
 * @method static deleteMasterLogs()
 * @method static dumpSlave(string $value)
 * @method static includeMasterHostPort()
 * @method static masterData(string $value)
 * @method static setGtidPurged(string $value)
 *
 * @method static compact()
 * @method static compatible(string $name)
 * @method static completeInsert()
 * @method static createOptions()
 * @method static fieldsTerminatedBy(string $value)
 * @method static fieldsEnclosedBy(string $value)
 * @method static fieldsOptionallyEnclosedBy(string $value)
 * @method static fieldsEscapedBy(string $value)
 * @method static hexBlob()
 * @method static linesTerminatedBy(string $value)
 * @method static quoteNames()
 * @method static resultFile(string $file)
 * @method static showCreateSkipSecondaryEngine(string $value)
 * @method static tab(string $value)
 * @method static tzUtc()
 * @method static xml()
 *
 * @method static events()
 * @method static ignoreError(array $errors)
 * @method static ignoreTable(string $table)
 * @method static noData()
 * @method static routines()
 * @method static tables()
 * @method static triggers()
 * @method static where(string $condition)
 *
 * @method static columnStatistics()
 * @method static disableKeys()
 * @method static extendedInsert()
 * @method static insertIgnore()
 * @method static maxAllowedPacket(string $value)
 * @method static netBufferLength(string $value)
 * @method static networkTimeout()
 * @method static opt()
 * @method static quick()
 * @method static skipOpt()
 *
 * @method static addLocks()
 * @method static flushLogs()
 * @method static flushPrivileges()
 * @method static lockAllTables()
 * @method static lockTables()
 * @method static noAutocommit()
 * @method static orderByPrimary()
 * @method static sharedMemoryBaseName(string $name)
 * @method static singleTransaction()
 */
class MySQLDumper extends BaseDumper implements MySQLDumperInterface
{
    /*----------------------------------------*
     * Dump Database
     *----------------------------------------*/

    /**
     * get driver name
     *
     * @return string
     */
    public function driver(): string
    {
        return $this->env->mysqlDumpDriver;
    }

    /**
     * set dump command
     *
     * @return void
     */
    protected function setCommand(): void
    {
        $this->addDriverName();
        $this->addDatabase();
        $this->addOptions();
        $this->addDumpFile();
    }

    /*----------------------------------------*
     * Database
     *----------------------------------------*/

    /**
     * whether dump all databases
     *
     * @var bool
     */
    protected bool $allDatabases = false;

    /**
     * database name
     *
     * @var array<string>
     */
    protected array $database = [];

    /**
     * table names
     *
     * @var array<string>
     */
    protected array $tables = [];

    /**
     * get all databases
     *
     * @return bool
     */
    public function allDatabases(): bool
    {
        return $this->allDatabases;
    }

    /**
     * set all databases
     *
     * @param bool $allDatabases
     * @return static
     */
    public function setAllDatabases(bool $allDatabases = true): static
    {
        $this->allDatabases = true;

        return $this;
    }

    /**
     * get database name
     *
     * @return array<string>
     */
    public function database(): array
    {
        return $this->database;
    }

    /**
     * set database name
     *
     * @param string|array<string> $database
     * @return static
     */
    public function setDatabase(string|array $database): static
    {
        $this->database = is_string($database) ? [$database] : $database;

        return $this;
    }

    /**
     * get table names
     *
     * @return array<string>
     */
    public function tables(): array
    {
        return $this->tables;
    }

    /**
     * set table names
     *
     * @param array<string> $tables
     * @return static
     */
    public function setTables(array $tables): static
    {
        $this->tables = $tables;

        return $this;
    }

    /**
     * add database
     *
     * @return void
     */
    protected function addDatabase(): void
    {
        if (!$this->allDatabases && empty($this->database())) throw new \RuntimeException("database name is required");

        $count = count($this->database());

        match (true) {
            $this->allDatabases => $this->addAllDatabases(),
            $count === 1        => $this->addDatabaseName(),
            $count > 1          => $this->addDatabaseNames(),
        };
    }

    /**
     * add all databases
     *
     * @return void
     */
    protected function addAllDatabases(): void
    {
        $this->addCommand("--all-databases");
    }

    /**
     * add database name and table names
     *
     * @return void
     */
    protected function addDatabaseName(): void
    {
        $this->addCommand($this->database()[0]);

        if (empty($this->tables())) return;

        foreach ($this->tables() as $table) {
            $this->addCommand($table);
        }
    }

    /**
     * add database names
     *
     * @return void
     */
    protected function addDatabaseNames(): void
    {
        $this->addCommand("--databases");

        foreach ($this->database() as $database) {
            $this->addCommand($database);
        }
    }

    /*----------------------------------------*
     * Option
     *----------------------------------------*/

    /**
     * options
     *
     * @var array<string>
     */
    protected array $options = [];

    /**
     * get options
     *
     * @return array<string>
     */
    public function options(): array
    {
        return $this->options;
    }

    /**
     * get option string
     *
     * @return string
     */
    public function optionString(): string
    {
        return implode(" ", $this->options());
    }

    /**
     * set options
     *
     * @param array<string> $options
     * @return static
     */
    public function setOptions(array $options): static
    {
        $this->options = $options;

        return $this;
    }

    /**
     * add option
     *
     * @param string $name
     * @param string|array<string>|null $value
     * @return static
     */
    public function addOption(string $name, string|array|null $value = null): static
    {
        $name = $this->formatOptionName($name);

        $value = $this->formatOptionValue($value);

        $this->options[] = $this->formatOption($name, $value);

        return $this;
    }

    /**
     * format option name
     *
     * @param string $name
     * @return string
     */
    protected function formatOptionName(string $name): string
    {
        return $name;
    }

    /**
     * format option value
     *
     * @param string|array<string>|null $value
     * @return string|null
     */
    protected function formatOptionValue(string|array|null $value): string|null
    {
        return match (true) {
            is_null($value)  => null,
            empty($value)    => null,
            is_array($value) => implode(",", $value),

            default => $value,
        };
    }

    /**
     * format option
     *
     * @param string $name
     * @param string|null $value
     * @return string
     */
    protected function formatOption(string $name, string|null $value): string
    {
        return is_null($value) ? $name : "{$name}={$value}";
    }

    /**
     * call add option
     *
     * @param string $name
     * @param array<string> $arguments
     * @return static
     */
    public function __call(string $name, array $arguments): static
    {
        $name = Text::toKebab($name);

        $value = $arguments[0] ?? null;

        return $this->addOption("--{$name}", $value);
    }

    /**
     * add option to command
     *
     * @return void
     */
    protected function addOptions(): void
    {
        foreach ($this->options() as $option) {
            $this->addCommand($option);
        }
    }

    /*----------------------------------------*
     * Dump File
     *----------------------------------------*/

    /**
     * add dump file path
     *
     * @return void
     */
    protected function addDumpFile(): void
    {
        $this->addCommand(">");
        $this->addCommand($this->dumpFile());
    }
}
