<?php

namespace YukataRm\Proxy\File\Markdown;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\File\Markdown\WriterManager;

/**
 * Markdown File Writer Proxy
 *
 * @package YukataRm\Proxy\File\Markdown
 *
 * @method static \YukataRm\Interface\File\Markdown\WriterInterface make()
 * @method static \YukataRm\Interface\File\Markdown\WriterInterface makeFrom(string $path)
 *
 * @method static bool write(string $path, string $content, bool $useFileAppend = false, bool $useLockEx = false)
 *
 * @see \YukataRm\Proxy\Manager\File\Markdown\WriterManager
 */
class Writer extends MethodProxy
{
    /**
     * called class name
     *
     * @var string
     */
    protected string $className = WriterManager::class;
}
