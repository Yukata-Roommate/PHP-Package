<?php

namespace YukataRm\Log;

use YukataRm\Interface\Log\BaseLoggerInterface;

use YukataRm\Env\LogEnvLoader;
use YukataRm\Enum\Log\LogLevelEnum;
use YukataRm\Enum\Log\LogFormatEnum;

use YukataRm\Proxy\File\Writer;

/**
 * Base Logger
 *
 * @package YukataRm\Log
 */
abstract class BaseLogger implements BaseLoggerInterface
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * Log Env Loader
     *
     * @var \YukataRm\Env\LogEnvLoader
     */
    protected LogEnvLoader $env;

    /**
     * constructor
     */
    public function __construct()
    {
        $this->env = new LogEnvLoader();

        $this->info();
    }

    /*----------------------------------------*
     * Log Level
     *----------------------------------------*/

    /**
     * Log Level Enum
     *
     * @var \YukataRm\Enum\Log\LogLevelEnum
     */
    protected LogLevelEnum $logLevel;

    /**
     * get Log Level Enum
     *
     * @return \YukataRm\Enum\Log\LogLevelEnum
     */
    public function logLevel(): LogLevelEnum
    {
        return $this->logLevel;
    }

    /**
     * set Log Level Enum
     *
     * @param \YukataRm\Enum\Log\LogLevelEnum $logLevel
     * @return static
     */
    public function setLogLevel(LogLevelEnum $logLevel): static
    {
        $this->logLevel = $logLevel;

        return $this;
    }

    /**
     * set debug Log Level Enum
     *
     * @return static
     */
    public function debug(): static
    {
        return $this->setLogLevel(LogLevelEnum::DEBUG);
    }

    /**
     * set info Log Level Enum
     *
     * @return static
     */
    public function info(): static
    {
        return $this->setLogLevel(LogLevelEnum::INFO);
    }

    /**
     * set notice Log Level Enum
     *
     * @return static
     */
    public function notice(): static
    {
        return $this->setLogLevel(LogLevelEnum::NOTICE);
    }

    /**
     * set warning Log Level Enum
     *
     * @return static
     */
    public function warning(): static
    {
        return $this->setLogLevel(LogLevelEnum::WARNING);
    }

    /**
     * set error Log Level Enum
     *
     * @return static
     */
    public function error(): static
    {
        return $this->setLogLevel(LogLevelEnum::ERROR);
    }

    /**
     * set critical Log Level Enum
     *
     * @return static
     */
    public function critical(): static
    {
        return $this->setLogLevel(LogLevelEnum::CRITICAL);
    }

    /**
     * set alert Log Level Enum
     *
     * @return static
     */
    public function alert(): static
    {
        return $this->setLogLevel(LogLevelEnum::ALERT);
    }

    /**
     * set emergency Log Level Enum
     *
     * @return static
     */
    public function emergency(): static
    {
        return $this->setLogLevel(LogLevelEnum::EMERGENCY);
    }

    /*----------------------------------------*
     * Logging
     *----------------------------------------*/

    /**
     * logging
     *
     * @param bool $isFlush
     * @return void
     */
    public function logging(bool $isFlush = true): void
    {
        $this->rotateLog();

        if (!$this->isLogging()) return;

        $this->loggingByWriter();

        if ($isFlush) $this->flush();
    }

    /**
     * get log file path
     *
     * @return string
     */
    public function filePath(): string
    {
        return $this->outputDirectory() . DIRECTORY_SEPARATOR . $this->fileName() . "." . $this->fileExtension();
    }

    /**
     * whether logging
     *
     * @return bool
     */
    protected function isLogging(): bool
    {
        return !empty($this->contents);
    }

    /**
     * logging by writer
     *
     * @return void
     */
    protected function loggingByWriter(): void
    {
        Writer::write(
            $this->filePath(),
            $this->contents,
            true,
            true,
            $this->fileMode(),
            $this->fileOwner(),
            $this->fileGroup()
        );
    }

    /*----------------------------------------*
     * Permission
     *----------------------------------------*/

    /**
     * file mode
     *
     * @var int
     */
    protected int $fileMode;

    /**
     * file owner
     *
     * @var string
     */
    protected string $fileOwner;

    /**
     * file group
     *
     * @var string
     */
    protected string $fileGroup;

    /**
     * get file mode
     *
     * @return int
     */
    public function fileMode(): int
    {
        return isset($this->fileMode) ? $this->fileMode : $this->envFileMode();
    }

    /**
     * set file mode
     *
     * @param int $fileMode
     * @return static
     */
    public function setFileMode(int $fileMode): static
    {
        $this->fileMode = $fileMode;

        return $this;
    }

    /**
     * get file owner
     *
     * @return string|null
     */
    public function fileOwner(): string|null
    {
        return isset($this->fileOwner) ? $this->fileOwner : $this->envFileOwner();
    }

    /**
     * set file owner
     *
     * @param string $fileOwner
     * @return static
     */
    public function setFileOwner(string $fileOwner): static
    {
        $this->fileOwner = $fileOwner;

        return $this;
    }

    /**
     * get file group
     *
     * @return string|null
     */
    public function fileGroup(): string|null
    {
        return isset($this->fileGroup) ? $this->fileGroup : $this->envFileGroup();
    }

    /**
     * set file group
     *
     * @param string $fileGroup
     * @return static
     */
    public function setFileGroup(string $fileGroup): static
    {
        $this->fileGroup = $fileGroup;

        return $this;
    }

    /*----------------------------------------*
     * Log Rotation
     *----------------------------------------*/

    /**
     * whether rotate log
     *
     * @var bool|null
     */
    protected bool|null $isRotateLog = null;

    /**
     * retention days
     *
     * @var int|null
     */
    protected int|null $retentionDays = null;

    /**
     * rotate log
     *
     * @return void
     */
    protected function rotateLog(): void
    {
        if (!$this->isRotateLog()) return;

        $retentionDays = $this->retentionDays();

        if ($retentionDays <= 0) return;

        $deleteDate = date("Ymd", strtotime("-{$retentionDays} day"));

        $pattern = $this->outputDirectory() . DIRECTORY_SEPARATOR . "*." . $this->fileExtension();

        $files = glob($pattern);

        if (!is_array($files)) return;

        foreach ($files as $file) {
            $fileDate = date("Ymd", filemtime($file));

            if ($fileDate < $deleteDate) unlink($file);
        }
    }

    /**
     * set whether rotate log
     *
     * @param bool $isRotateLog
     * @return static
     */
    public function setRotateLog(bool $isRotateLog): static
    {
        $this->isRotateLog = $isRotateLog;

        return $this;
    }

    /**
     * get whether rotate log
     *
     * @return bool
     */
    public function isRotateLog(): bool
    {
        return $this->isRotateLog ?? $this->envIsRotate();
    }

    /**
     * set retention days
     *
     * @param int $retentionDays
     * @return static
     */
    public function setRetentionDays(int $retentionDays): static
    {
        $this->retentionDays = $retentionDays;

        return $this;
    }

    /**
     * get retention days
     *
     * @return int
     */
    public function retentionDays(): int
    {
        return $this->retentionDays ?? $this->envRetentionDays();
    }

    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * contents
     *
     * @var array<string>
     */
    protected array $contents = [];

    /**
     * add content
     *
     * @param mixed $message
     * @param mixed $value
     * @return static
     */
    public function add(mixed $message, mixed $value = null): static
    {
        $this->setStackTrace();

        $message = $this->toStringMessage($message);
        $value   = $this->toStringValue($value);

        $content = $this->format($message, $value);

        return $this->addContent($content);
    }

    /**
     * flush content
     *
     * @return static
     */
    public function flush(): static
    {
        $this->contents = [];

        return $this;
    }

    /**
     * format to content
     *
     * @param string $message
     * @param string|null $value
     * @return string
     */
    abstract protected function format(string $message, string|null $value): string;

    /**
     * to string message
     *
     * @param mixed $message
     * @return string
     */
    protected function toStringMessage(mixed $message): string
    {
        return match (true) {
            is_string($message)                       => $message,
            is_null($message)                         => "null",
            is_numeric($message)                      => (string) $message,
            is_bool($message)                         => $message ? "true" : "false",
            is_array($message) || is_object($message) => json_encode($message, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),

            default => $message,
        };
    }

    /**
     * to string value
     *
     * @param mixed $value
     * @return string|null
     */
    protected function toStringValue(mixed $value): string|null
    {
        return match (true) {
            is_string($value)                       => $value,
            is_null($value)                         => null,
            is_numeric($value)                      => (string) $value,
            is_bool($value)                         => $value ? "true" : "false",
            is_array($value) || is_object($value)   => json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),

            default => $value,
        };
    }

    /**
     * get format content
     *
     * @param \YukataRm\Enum\Log\LogFormatEnum $format
     * @return string
     */
    protected function formatContent(LogFormatEnum $format): string
    {
        return match ($format) {
            LogFormatEnum::LOG_LEVEL         => $this->logLevel->value,
            LogFormatEnum::DATETIME          => date("Y-m-d H:i:s"),
            LogFormatEnum::FILE_NAME         => $this->stackTraceFileName(),
            LogFormatEnum::LINE_NUMBER       => $this->stackTraceLineNumber(),
            LogFormatEnum::FUNCTION_NAME     => $this->stackTraceFunctionName(),
            LogFormatEnum::CLASS_NAME        => $this->stackTraceClassName(),
            LogFormatEnum::MEMORY_USAGE      => $this->memoryUsage(),
            LogFormatEnum::MEMORY_PEAK_USAGE => $this->memoryPeakUsage(),
        };
    }

    /**
     * add content
     *
     * @param string $content
     * @return static
     */
    protected function addContent(string $content): static
    {
        $this->contents[] = $content . PHP_EOL;

        return $this;
    }

    /*----------------------------------------*
     * Directory
     *----------------------------------------*/

    /**
     * base directory
     *
     * @var string|null
     */
    protected string|null $baseDirectory = null;

    /**
     * directory
     *
     * @var string|null
     */
    protected string|null $directory = null;

    /**
     * get output directory
     *
     * @return string
     */
    public function outputDirectory(): string
    {
        return $this->baseDirectory() . DIRECTORY_SEPARATOR . $this->directory();
    }

    /**
     * get base directory
     *
     * @return string
     */
    public function baseDirectory(): string
    {
        return $this->baseDirectory ?? $this->envBaseDirectory();
    }

    /**
     * set base directory
     *
     * @param string $baseDirectory
     * @return static
     */
    public function setBaseDirectory(string $baseDirectory): static
    {
        if (empty($baseDirectory)) return $this;

        $this->baseDirectory = $baseDirectory;

        return $this;
    }

    /**
     * add base directory
     *
     * @param string $baseDirectory
     * @return static
     */
    public function addBaseDirectory(string $baseDirectory): static
    {
        if (empty($baseDirectory)) return $this;

        if (empty($this->baseDirectory)) return $this->setBaseDirectory($baseDirectory);

        $this->baseDirectory .= DIRECTORY_SEPARATOR . $baseDirectory;

        return $this;
    }

    /**
     * get directory
     *
     * @return string
     */
    public function directory(): string
    {
        return $this->directory ?? $this->logLevel->value;
    }

    /**
     * set directory
     *
     * @param string $directory
     * @return static
     */
    public function setDirectory(string $directory): static
    {
        if (empty($directory)) return $this;

        $this->directory = $directory;

        return $this;
    }

    /**
     * add directory
     *
     * @param string $directory
     * @return static
     */
    public function addDirectory(string $directory): static
    {
        if (empty($directory)) return $this;

        if (empty($this->directory)) return $this->setDirectory($directory);

        $this->directory .= DIRECTORY_SEPARATOR . $directory;

        return $this;
    }

    /*----------------------------------------*
     * File Name
     *----------------------------------------*/

    /**
     * file name
     *
     * @var string|null
     */
    protected string|null $fileName = null;

    /**
     * file name format
     *
     * @var string|null
     */
    protected string|null $fileNameFormat = null;

    /**
     * get file name
     *
     * @return string
     */
    public function fileName(): string
    {
        return $this->fileName ?? (new \DateTime())->format($this->fileNameFormat());
    }

    /**
     * set file name
     *
     * @param string $fileName
     * @return static
     */
    public function setFileName(string $fileName): static
    {
        if (empty($fileName)) return $this;

        $this->fileName = $fileName;

        return $this;
    }

    /**
     * get file name
     *
     * @return string
     */
    public function fileNameFormat(): string
    {
        return $this->fileNameFormat ?? $this->envFileNameFormat();
    }

    /**
     * set file name
     *
     * @param string $fileNameFormat
     * @return static
     */
    public function setFileNameFormat(string $fileNameFormat): static
    {
        if (empty($fileNameFormat)) return $this;

        $this->fileNameFormat = $fileNameFormat;

        return $this;
    }

    /*----------------------------------------*
     * File Extension
     *----------------------------------------*/

    /**
     * file extension
     *
     * @var string|null
     */
    protected string|null $fileExtension = null;

    /**
     * get file extension
     *
     * @return string
     */
    public function fileExtension(): string
    {
        return $this->fileExtension ?? $this->envFileExtension();
    }

    /**
     * set file extension
     *
     * @param string $fileExtension
     * @return static
     */
    public function setFileExtension(string $fileExtension): static
    {
        $this->fileExtension = $fileExtension;

        return $this;
    }

    /*----------------------------------------*
     * Memory Usage
     *----------------------------------------*/

    /**
     * get memory usage
     *
     * @return string
     */
    protected function memoryUsage(): string
    {
        $usage = memory_get_usage($this->envIsMemoryRealUsage());

        return $this->envIsMemoryFormat() ? $this->formatBytes($usage) : (string)$usage;
    }

    /**
     * get memory peak usage
     *
     * @return string
     */
    protected function memoryPeakUsage(): string
    {
        $usage = memory_get_peak_usage($this->envIsMemoryRealUsage());

        return $this->envIsMemoryFormat() ? $this->formatBytes($usage) : (string)$usage;
    }

    /**
     * format memory bytes
     *
     * @param float $bytes
     * @return string
     */
    protected function formatBytes(float $bytes): string
    {
        $units = [
            3 => "GB",
            2 => "MB",
            1 => "KB",
            0 => "B",
        ];

        foreach ($units as $pow => $unit) {
            $target = 1024 ** $pow;

            if ($bytes < $target) continue;

            return round($bytes / $target, $this->envMemoryPrecision()) . $unit;
        }
    }

    /*----------------------------------------*
     * Stack Trace
     *----------------------------------------*/

    /**
     * stack trace
     *
     * @var array
     */
    protected array $stackTrace = [];

    /**
     * stack trace index
     *
     * @var int
     */
    protected int $stackTraceIndex = 0;

    /**
     * set stack trace index
     *
     * @param int $index
     * @return static
     */
    public function setStackTraceIndex(int $index): static
    {
        $this->stackTraceIndex = $index;

        return $this;
    }

    /**
     * set stack trace
     *
     * @return static
     */
    protected function setStackTrace(): static
    {
        $stackTrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);

        array_shift($stackTrace);

        array_shift($stackTrace);

        $this->stackTrace = $stackTrace;

        return $this;
    }

    /**
     * get stack trace value
     *
     * @param int $index
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function stackTraceValue(int $index, string $key, mixed $default): mixed
    {
        return isset($this->stackTrace[$index][$key]) ? $this->stackTrace[$index][$key] : $default;
    }

    /**
     * get stack trace file name
     *
     * @return string
     */
    protected function stackTraceFileName(): string
    {
        return $this->stackTraceValue($this->stackTraceIndex, "file", "");
    }

    /**
     * get stack trace line number
     *
     * @return int
     */
    protected function stackTraceLineNumber(): int
    {
        return $this->stackTraceValue($this->stackTraceIndex, "line", 0);
    }

    /**
     * get stack trace function name
     *
     * @return string
     */
    protected function stackTraceFunctionName(): string
    {
        return $this->stackTraceValue($this->stackTraceIndex + 1, "function", "");
    }

    /**
     * get stack trace class name
     *
     * @return string
     */
    protected function stackTraceClassName(): string
    {
        return $this->stackTraceValue($this->stackTraceIndex + 1, "class", "");
    }

    /*----------------------------------------*
     * Env
     *----------------------------------------*/

    /**
     * get env is rotate
     *
     * @return bool
     */
    protected function envIsRotate(): bool
    {
        return $this->env->isRotate;
    }

    /**
     * get env retention days
     *
     * @return int
     */
    protected function envRetentionDays(): int
    {
        return $this->env->retentionDays;
    }

    /**
     * get env format
     *
     * @return string
     */
    protected function envFormat(): string
    {
        return $this->env->format;
    }

    /**
     * get env format json
     *
     * @return array<string>
     */
    protected function envFormatJson(): array
    {
        return explode(
            ",",
            str_replace(
                " ",
                "",
                $this->env->formatJson
            )
        );
    }

    /**
     * get env base directory
     *
     * @return string
     */
    protected function envBaseDirectory(): string
    {
        return $this->env->baseDirectory;
    }

    /**
     * get env file name format
     *
     * @return string
     */
    protected function envFileNameFormat(): string
    {
        return $this->env->fileNameFormat;
    }

    /**
     * get env file extension
     *
     * @return string
     */
    protected function envFileExtension(): string
    {
        return $this->env->fileExtension;
    }

    /**
     * get env file mode
     *
     * @return int
     */
    protected function envFileMode(): int
    {
        return $this->env->fileMode;
    }

    /**
     * get env file owner
     *
     * @return string|null
     */
    protected function envFileOwner(): string|null
    {
        return $this->env->fileOwner;
    }

    /**
     * get env file group
     *
     * @return string|null
     */
    protected function envFileGroup(): string|null
    {
        return $this->env->fileGroup;
    }

    /**
     * get env whether real memory usage
     *
     * @return bool
     */
    protected function envIsMemoryRealUsage(): bool
    {
        return $this->env->isMemoryRealUsage;
    }

    /**
     * get env whether memory format
     *
     * @return bool
     */
    protected function envIsMemoryFormat(): bool
    {
        return $this->env->isMemoryFormat;
    }

    /**
     * get env memory usage precision
     *
     * @return int
     */
    protected function envMemoryPrecision(): int
    {
        return $this->env->memoryPrecision;
    }
}
