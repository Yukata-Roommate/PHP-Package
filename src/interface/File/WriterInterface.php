<?php

namespace YukataRm\Interface\File;

use YukataRm\Interface\File\Base\WriterInterface as BaseWriterInterface;

/**
 * File Writer Interface
 *
 * @package YukataRm\Interface\File
 */
interface WriterInterface extends BaseWriterInterface
{
    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * get content to write
     *
     * @return mixed
     */
    public function content(): mixed;

    /**
     * set content to write
     *
     * @param mixed $content
     * @return static
     */
    public function setContent(mixed $content): static;
}
