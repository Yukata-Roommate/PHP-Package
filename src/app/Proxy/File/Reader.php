<?php

namespace YukataRm\Proxy\File;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\File\ReaderManager;

/**
 * File Reader Proxy
 *
 * @package YukataRm\Proxy\File
 *
 * @method static \YukataRm\Interface\File\ReaderInterface make()
 * @method static \YukataRm\Interface\File\ReaderInterface makeFrom(string $path)
 *
 * @method static string|null read(string $path)
 *
 * @method static array readByLine(string $path, int $start = 1)
 * @method static \Generator readLineByLine(string $path, int $start = 1)
 *
 * @method static array readByChunk(string $path, int $row = 1, int $start = 1)
 * @method static \Generator readChunkByChunk(string $path, int $row = 1, int $start = 1)
 *
 * @see \YukataRm\Proxy\Manager\File\ReaderManager
 */
class Reader extends MethodProxy
{
    /**
     * called class name
     *
     * @var string
     */
    protected string $className = ReaderManager::class;
}
