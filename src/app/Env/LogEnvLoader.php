<?php

namespace YukataRm\Env;

use YukataRm\Env\CustomEnvLoader;

/**
 * Log Env Loader
 *
 * @package YukataRm\Env
 */
class LogEnvLoader extends CustomEnvLoader
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * .env common key name prefix
     *
     * @var string
     */
    protected string $prefix = "LOG";

    /*----------------------------------------*
     * Rotate
     *----------------------------------------*/

    /**
     * whether rotate
     *
     * @var bool
     */
    public bool $isRotate;

    /**
     * whether rotate default
     *
     * @var bool
     */
    protected bool $isRotateDefault = true;

    /*----------------------------------------*
     * Retention Days
     *----------------------------------------*/

    /**
     * retention days
     *
     * @var int
     */
    public int $retentionDays;

    /**
     * retention days default
     *
     * @var int
     */
    protected int $retentionDaysDefault = 7;

    /*----------------------------------------*
     * Format
     *----------------------------------------*/

    /**
     * format
     *
     * @var string
     */
    public string $format;

    /**
     * format default
     *
     * @var string
     */
    protected string $formatDefault = "[%datetime%] %level%: %message%";

    /*----------------------------------------*
     * Format JSON
     *----------------------------------------*/

    /**
     * json format
     *
     * @var string
     */
    public string $formatJson;

    /**
     * json format default
     *
     * @var string
     */
    protected string $formatJsonDefault = "%datetime%, %level%, %message%";

    /*----------------------------------------*
     * Base Directory
     *----------------------------------------*/

    /**
     * base directory
     *
     * @var string
     */
    public string $baseDirectory;

    /**
     * base directory default
     *
     * @var string
     */
    protected string $baseDirectoryDefault = "logs";

    /*----------------------------------------*
     * File Name Format
     *----------------------------------------*/

    /**
     * file name format
     *
     * @var string
     */
    public string $fileNameFormat;

    /**
     * file name format default
     *
     * @var string
     */
    protected string $fileNameFormatDefault = "Y-m-d";

    /*----------------------------------------*
     * File Extension
     *----------------------------------------*/

    /**
     * file extension
     *
     * @var string
     */
    public string $fileExtension;

    /**
     * file extension default
     *
     * @var string
     */
    protected string $fileExtensionDefault = "log";

    /*----------------------------------------*
     * File Mode
     *----------------------------------------*/

    /**
     * file mode
     *
     * @var int
     */
    public int $fileMode;

    /**
     * file mode default
     *
     * @var int
     */
    protected int $fileModeDefault = 0666;

    /*----------------------------------------*
     * File Owner
     *----------------------------------------*/

    /**
     * file owner
     *
     * @var string|null
     */
    public string|null $fileOwner;

    /*----------------------------------------*
     * File Group
     *----------------------------------------*/

    /**
     * file group
     *
     * @var string|null
     */
    public string|null $fileGroup;

    /*----------------------------------------*
     * Memory Real Usage
     *----------------------------------------*/

    /**
     * whether real memory usage
     *
     * @var bool
     */
    public bool $isMemoryRealUsage;

    /**
     * whether real memory usage default
     *
     * @var bool
     */
    protected bool $isMemoryRealUsageDefault = true;

    /*----------------------------------------*
     * Memory Format
     *----------------------------------------*/

    /**
     * whether memory format
     *
     * @var bool
     */
    public bool $isMemoryFormat;

    /**
     * whether memory format default
     *
     * @var bool
     */
    protected bool $isMemoryFormatDefault = true;

    /*----------------------------------------*
     * Memory Precision
     *----------------------------------------*/

    /**
     * memory usage precision
     *
     * @var int
     */
    public int $memoryPrecision;

    /**
     * memory usage precision default
     *
     * @var int
     */
    protected int $memoryPrecisionDefault = 2;

    /**
     * bind .env parameters
     *
     * @return void
     */
    protected function bind(): void
    {
        $this->isRotate          = $this->bool($this->envKey("IS_ROTATE"), $this->isRotateDefault);
        $this->retentionDays     = $this->int($this->envKey("RETENTION_DAYS"), $this->retentionDaysDefault);
        $this->format            = $this->string($this->envKey("FORMAT"), $this->formatDefault);
        $this->formatJson        = $this->string($this->envKey("FORMAT_JSON"), $this->formatJsonDefault);
        $this->baseDirectory     = $this->string($this->envKey("BASE_DIRECTORY"), $this->baseDirectoryDefault);
        $this->fileNameFormat    = $this->string($this->envKey("FILE_NAME_FORMAT"), $this->fileNameFormatDefault);
        $this->fileExtension     = $this->string($this->envKey("FILE_EXTENSION"), $this->fileExtensionDefault);
        $this->fileMode          = $this->int($this->envKey("FILE_MODE"), $this->fileModeDefault);
        $this->fileOwner         = $this->nullableString($this->envKey("FILE_OWNER"));
        $this->fileGroup         = $this->nullableString($this->envKey("FILE_GROUP"));
        $this->isMemoryRealUsage = $this->bool($this->envKey("IS_MEMORY_REAL_USAGE"), $this->isMemoryRealUsageDefault);
        $this->isMemoryFormat    = $this->bool($this->envKey("IS_MEMORY_FORMAT"), $this->isMemoryFormatDefault);
        $this->memoryPrecision   = $this->int($this->envKey("MEMORY_PRECISION"), $this->memoryPrecisionDefault);
    }
}
