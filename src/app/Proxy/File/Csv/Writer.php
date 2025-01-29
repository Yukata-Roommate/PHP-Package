<?php

namespace YukataRm\Proxy\File\Csv;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\File\Csv\WriterManager;

/**
 * CSV File Writer Proxy
 *
 * @package YukataRm\Proxy\File\Csv
 *
 * @method static \YukataRm\Interface\File\Csv\WriterInterface make()
 * @method static \YukataRm\Interface\File\Csv\WriterInterface makeFrom(string $path)
 *
 * @method static bool write(string $path, array $headers, array $content, bool $useFileAppend = false, bool $useLockEx = false)
 *
 * @see \YukataRm\Proxy\Manager\File\Csv\WriterManager
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
