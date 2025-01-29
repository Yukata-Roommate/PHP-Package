<?php

namespace YukataRm\Interface\Log;

use YukataRm\Interface\Log\BaseLoggerInterface;

use YukataRm\Enum\Log\LogFormatEnum;

/**
 * JSON Logger Interface
 *
 * @package YukataRm\Interface\Log
 */
interface JsonLoggerInterface extends BaseLoggerInterface
{
    /*----------------------------------------*
     * Format
     *----------------------------------------*/

    /**
     * get log format
     *
     * @return array<string>
     */
    public function logFormat(): array;

    /**
     * set log format
     *
     * @param array<string> $logFormat
     * @return static
     */
    public function setLogFormat(array $logFormat): static;

    /**
     * add log format
     *
     * @param \YukataRm\Enum\Log\LogFormatEnum|string $logFormat
     * @return static
     */
    public function addLogFormat(LogFormatEnum|string $logFormat): static;
}
