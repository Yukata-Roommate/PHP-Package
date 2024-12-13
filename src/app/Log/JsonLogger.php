<?php

namespace YukataRm\Log;

use YukataRm\Interface\Log\JsonLoggerInterface;
use YukataRm\Log\BaseLogger;

use YukataRm\Enum\Log\LogFormatEnum;

/**
 * JSON Logger
 *
 * @package YukataRm\Log
 */
class JsonLogger extends BaseLogger implements JsonLoggerInterface
{
    /*----------------------------------------*
     * Format
     *----------------------------------------*/

    /**
     * log format
     *
     * @var array<string>|null
     */
    protected array|null $logFormat = null;

    /**
     * format to content
     *
     * @param string $message
     * @param string|null $value
     * @return string
     */
    protected function format(string $message, string|null $value): string
    {
        $content = [];

        $logFormat = $this->logFormat();

        foreach (LogFormatEnum::cases() as $case) {
            if (!in_array($case->format(), $logFormat)) continue;

            if ($case === LogFormatEnum::MESSAGE) {
                $contentKey = is_null($value) ? $case->value : $message;

                $content[$contentKey] = is_null($value) ? $message : $value;

                continue;
            }

            $content[$case->value] = $this->formatContent($case);
        }

        return json_encode($content, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * get log format
     *
     * @return array<string>
     */
    public function logFormat(): array
    {
        return $this->logFormat ?? $this->envFormatJson();
    }

    /**
     * set log format
     *
     * @param array<string> $logFormat
     * @return static
     */
    public function setLogFormat(array $logFormat): static
    {
        $this->logFormat = $logFormat;

        return $this;
    }

    /**
     * add log format
     *
     * @param \YukataRm\Enum\Log\LogFormatEnum|string $logFormat
     * @return static
     */
    public function addLogFormat(LogFormatEnum|string $logFormat): static
    {
        $this->logFormat[] = $logFormat instanceof LogFormatEnum ? $logFormat->format() : $logFormat;

        return $this;
    }
}
