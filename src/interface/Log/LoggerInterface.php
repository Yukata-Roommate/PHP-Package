<?php

namespace YukataRm\Interface\Log;

use YukataRm\Interface\Log\BaseLoggerInterface;

use YukataRm\Enum\Log\LogFormatEnum;

/**
 * Logger Interface
 *
 * @package YukataRm\Interface\Log
 */
interface LoggerInterface extends BaseLoggerInterface
{
    /*----------------------------------------*
     * Format
     *----------------------------------------*/

    /**
     * get log format
     *
     * @return string
     */
    public function logFormat(): string;

    /**
     * set log format
     *
     * @param \YukataRm\Enum\Log\LogFormatEnum|string $logFormat
     * @return static
     */
    public function setLogFormat(LogFormatEnum|string $logFormat): static;

    /**
     * add log format
     *
     * @param \YukataRm\Enum\Log\LogFormatEnum|string $logFormat
     * @param string $before
     * @param string $after
     * @return static
     */
    public function addLogFormat(LogFormatEnum|string $logFormat, string $before = "", string $after = " "): static;

    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * add empty
     *
     * @return static
     */
    public function addEmpty(): static;

    /**
     * add divider
     *
     * @return static
     */
    public function addDivider(): static;
}
