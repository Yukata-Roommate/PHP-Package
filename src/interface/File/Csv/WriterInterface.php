<?php

namespace YukataRm\Interface\File\Csv;

use YukataRm\Interface\File\Base\WriterInterface as BaseWriterInterface;
use YukataRm\Interface\File\Csv\FormatInterface;

/**
 * CSV File Writer Interface
 *
 * @package YukataRm\Interface\File\Csv
 */
interface WriterInterface extends BaseWriterInterface, FormatInterface
{
    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * get content to write
     *
     * @return array<array<string>>
     */
    public function content(): array;

    /**
     * set content to write
     *
     * @param array<array<string>> $content
     * @return static
     */
    public function setContent(array $content): static;

    /**
     * add content to write
     *
     * @param array<string> $content
     * @return static
     */
    public function addContent(array $content): static;

    /*----------------------------------------*
     * Header
     *----------------------------------------*/

    /**
     * get headers
     *
     * @return array<string>
     */
    public function headers(): array;

    /**
     * set headers
     *
     * @param array<string> $headers
     * @return static
     */
    public function setHeaders(array $headers): static;
}
