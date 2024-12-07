<?php

namespace YukataRm\Proxy\Manager\File;

use YukataRm\Interface\File\WriterInterface;
use YukataRm\File\Writer;

/**
 * File Writer Proxy Manager
 *
 * @package YukataRm\Proxy\Manager\File
 */
class WriterManager
{
    /*----------------------------------------*
     * Make
     *----------------------------------------*/

    /**
     * make Writer instance
     *
     * @return \YukataRm\Interface\File\WriterInterface
     */
    public function make(): WriterInterface
    {
        return new Writer();
    }

    /**
     * make Writer instance from path
     *
     * @param string $path
     * @return \YukataRm\Interface\File\WriterInterface
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
     * @param mixed $content
     * @param bool $useFileAppend
     * @param bool $useLockEx
     * @param int|null $mode
     * @param string|null $user
     * @param string|null $group
     * @return bool
     */
    public function write(
        string $path,
        mixed $content,
        bool $useFileAppend = false,
        bool $useLockEx = false,
        int|null $mode = null,
        string|null $user = null,
        string|null $group = null
    ): bool {
        $writer = $this->makeFrom($path)->setContent($content);

        if ($useFileAppend) $writer->useFileAppend();
        if ($useLockEx) $writer->useLockEx();

        return $writer->write($mode, $user, $group);
    }
}
