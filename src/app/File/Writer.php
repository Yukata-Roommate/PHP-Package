<?php

namespace YukataRm\File;

use YukataRm\Interface\File\WriterInterface;
use YukataRm\File\Base\Writer as BaseWriter;

/**
 * File Writer
 *
 * @package YukataRm\File
 */
class Writer extends BaseWriter implements WriterInterface
{
    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * content to write
     *
     * @var mixed
     */
    protected mixed $content = null;

    /**
     * get content to write
     *
     * @return mixed
     */
    public function content(): mixed
    {
        return $this->content;
    }

    /**
     * set content to write
     *
     * @param mixed $content
     * @return static
     */
    public function setContent(mixed $content): static
    {
        $this->content = $content;

        return $this;
    }
}
