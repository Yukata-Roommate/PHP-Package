<?php

namespace YukataRm\Log;

use YukataRm\Interface\Log\LoggerInterface;
use YukataRm\Log\BaseLogger;

use YukataRm\Enum\Log\LogFormatEnum;

/**
 * Logger
 *
 * @package YukataRm\Log
 */
class Logger extends BaseLogger implements LoggerInterface
{
    /*----------------------------------------*
     * Format
     *----------------------------------------*/

    /**
     * log format
     *
     * @var string|null
     */
    protected string|null $logFormat = null;

    /**
     * format to content
     *
     * @param string $message
     * @param string|null $value
     * @return string
     */
    protected function format(string $message, string|null $value): string
    {
        $content = rtrim($this->logFormat());

        if (is_string($value)) $message = "{$message}: {$value}";

        foreach (LogFormatEnum::cases() as $case) {
            if (!str_contains($content, $case->format())) continue;

            $formatContent = $case === LogFormatEnum::MESSAGE
                ? $message
                : $this->formatContent($case);

            $content = str_replace(
                $case->format(),
                $formatContent,
                $content
            );
        }

        return $content;
    }

    /**
     * get log format
     *
     * @return string
     */
    public function logFormat(): string
    {
        return $this->logFormat ?? $this->envFormat();
    }

    /**
     * set log format
     *
     * @param \YukataRm\Enum\Log\LogFormatEnum|string $logFormat
     * @return static
     */
    public function setLogFormat(LogFormatEnum|string $logFormat): static
    {
        $this->logFormat = $logFormat instanceof LogFormatEnum
            ? $logFormat->format()
            : $logFormat;

        return $this;
    }

    /**
     * add log format
     *
     * @param \YukataRm\Enum\Log\LogFormatEnum|string $logFormat
     * @param string $before
     * @param string $after
     * @return static
     */
    public function addLogFormat(LogFormatEnum|string $logFormat, string $before = "", string $after = " "): static
    {
        if ($logFormat instanceof LogFormatEnum) $logFormat = $logFormat->format();

        if (is_null($this->logFormat)) $this->logFormat = "";

        $this->logFormat = "{$this->logFormat}{$before}{$logFormat}{$after}";

        return $this;
    }

    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * add empty
     *
     * @return static
     */
    public function addEmpty(): static
    {
        return $this->add("");
    }

    /**
     * add divider
     *
     * @return static
     */
    public function addDivider(): static
    {
        return $this->addEmpty()->add("===========================")->addEmpty();
    }
}
