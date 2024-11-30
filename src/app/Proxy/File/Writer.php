<?php

namespace YukataRm\Proxy\File;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\File\WriterManager;

/**
 * File Writer Proxy
 *
 * @package YukataRm\Proxy\File
 *
 * @method static \YukataRm\Interface\File\WriterInterface make()
 * @method static \YukataRm\Interface\File\WriterInterface makeFrom(string $path)
 *
 * @method static bool write(string $path, mixed $content, bool $useFileAppend = false, bool $useLockEx = false, int|null $mode = null, string|null $user = null, string|null $group = null)
 *
 * @see \YukataRm\Proxy\Manager\File\WriterManager
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
