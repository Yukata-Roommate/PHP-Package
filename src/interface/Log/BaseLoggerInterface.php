<?php

namespace YukataRm\Interface\Log;

use YukataRm\Enum\Log\LogLevelEnum;

/**
 * Base Logger Interface
 *
 * @package YukataRm\Interface\Log
 */
interface BaseLoggerInterface
{
    /*----------------------------------------*
     * Log Level
     *----------------------------------------*/

    /**
     * get LogLevelEnum instance
     *
     * @return \YukataRm\Enum\Log\LogLevelEnum
     */
    public function logLevel(): LogLevelEnum;

    /**
     * set Log Level Enum
     *
     * @param \YukataRm\Enum\Log\LogLevelEnum $logLevel
     * @return static
     */
    public function setLogLevel(LogLevelEnum $logLevel): static;

    /**
     * set debug Log Level Enum
     *
     * @return static
     */
    public function debug(): static;

    /**
     * set info Log Level Enum
     *
     * @return static
     */
    public function info(): static;

    /**
     * set notice Log Level Enum
     *
     * @return static
     */
    public function notice(): static;

    /**
     * set warning Log Level Enum
     *
     * @return static
     */
    public function warning(): static;

    /**
     * set error Log Level Enum
     *
     * @return static
     */
    public function error(): static;

    /**
     * set critical Log Level Enum
     *
     * @return static
     */
    public function critical(): static;

    /**
     * set alert Log Level Enum
     *
     * @return static
     */
    public function alert(): static;

    /**
     * set emergency Log Level Enum
     *
     * @return static
     */
    public function emergency(): static;

    /*----------------------------------------*
     * Logging
     *----------------------------------------*/

    /**
     * logging
     *
     * @param bool $isFlush
     * @return void
     */
    public function logging(bool $isFlush = true): void;

    /**
     * get log file path
     *
     * @return string
     */
    public function filePath(): string;

    /*----------------------------------------*
     * Permission
     *----------------------------------------*/

    /**
     * get file mode
     *
     * @return int
     */
    public function fileMode(): int;

    /**
     * set file mode
     *
     * @param int $fileMode
     * @return static
     */
    public function setFileMode(int $fileMode): static;

    /**
     * get file owner
     *
     * @return string|null
     */
    public function fileOwner(): string|null;

    /**
     * set file owner
     *
     * @param string $fileOwner
     * @return static
     */
    public function setFileOwner(string $fileOwner): static;

    /**
     * get file group
     *
     * @return string|null
     */
    public function fileGroup(): string|null;

    /**
     * set file group
     *
     * @param string $fileGroup
     * @return static
     */
    public function setFileGroup(string $fileGroup): static;

    /*----------------------------------------*
     * Log Rotation
     *----------------------------------------*/

    /**
     * set whether rotate log
     *
     * @param bool $isRotateLog
     * @return static
     */
    public function setRotateLog(bool $isRotateLog): static;

    /**
     * get whether rotate log
     *
     * @return bool
     */
    public function isRotateLog(): bool;

    /**
     * set retention days
     *
     * @param int $retentionDays
     * @return static
     */
    public function setRetentionDays(int $retentionDays): static;

    /**
     * get retention days
     *
     * @return int
     */
    public function retentionDays(): int;

    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * add content
     *
     * @param mixed $message
     * @param mixed $value
     * @return static
     */
    public function add(mixed $message, mixed $value = null): static;

    /**
     * flush content
     *
     * @return static
     */
    public function flush(): static;

    /*----------------------------------------*
     * Directory
     *----------------------------------------*/

    /**
     * get output directory
     *
     * @return string
     */
    public function outputDirectory(): string;

    /**
     * get base directory
     *
     * @return string
     */
    public function baseDirectory(): string;

    /**
     * set base directory
     *
     * @param string $baseDirectory
     * @return static
     */
    public function setBaseDirectory(string $baseDirectory): static;

    /**
     * add base directory
     *
     * @param string $baseDirectory
     * @return static
     */
    public function addBaseDirectory(string $baseDirectory): static;

    /**
     * get directory
     *
     * @return string
     */
    public function directory(): string;

    /**
     * set directory
     *
     * @param string $directory
     * @return static
     */
    public function setDirectory(string $directory): static;

    /**
     * add directory
     *
     * @param string $directory
     * @return static
     */
    public function addDirectory(string $directory): static;

    /*----------------------------------------*
     * File Name
     *----------------------------------------*/

    /**
     * get file name
     *
     * @return string
     */
    public function fileName(): string;

    /**
     * set file name
     *
     * @param string $fileName
     * @return static
     */
    public function setFileName(string $fileName): static;

    /**
     * get file name
     *
     * @return string
     */
    public function fileNameFormat(): string;

    /**
     * set file name
     *
     * @param string $fileNameFormat
     * @return static
     */
    public function setFileNameFormat(string $fileNameFormat): static;

    /*----------------------------------------*
     * File Extension
     *----------------------------------------*/

    /**
     * get file extension
     *
     * @return string
     */
    public function fileExtension(): string;

    /**
     * set file extension
     *
     * @param string $fileExtension
     * @return static
     */
    public function setFileExtension(string $fileExtension): static;

    /*----------------------------------------*
     * Stack Trace
     *----------------------------------------*/

    /**
     * set stack trace index
     *
     * @param int $index
     * @return static
     */
    public function setStackTraceIndex(int $index): static;
}
