<?php

namespace YukataRm\Proxy\Manager\File\Markdown;

use YukataRm\Interface\File\Markdown\WriterInterface;
use YukataRm\File\Markdown\Writer;

/**
 * Markdown File Writer Proxy Manager
 *
 * @package YukataRm\Proxy\Manager\File\Markdown
 */
class WriterManager
{
    /*----------------------------------------*
     * Make
     *----------------------------------------*/

    /**
     * make Writer instance
     *
     * @return \YukataRm\Interface\File\Markdown\WriterInterface
     */
    public function make(): WriterInterface
    {
        return new Writer();
    }

    /**
     * make Writer instance from path
     *
     * @param string $path
     * @return \YukataRm\Interface\File\Markdown\WriterInterface
     */
    public function makeFrom(string $path): WriterInterface
    {
        return $this->make()->setPath($path);
    }

    /*----------------------------------------*
     * Write
     *----------------------------------------*/

    /**
     * write file
     *
     * @param string $path
     * @param string $content
     * @param bool $useFileAppend
     * @param bool $useLockEx
     * @return bool
     */
    public function write(string $path, string $content, bool $useFileAppend = false, bool $useLockEx = false): bool
    {
        $writer = $this->makeFrom($path)->setContent($content);

        if ($useFileAppend) $writer->useFileAppend();
        if ($useLockEx) $writer->useLockEx();

        return $writer->write();
    }
}
