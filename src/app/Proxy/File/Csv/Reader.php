<?php

namespace YukataRm\Proxy\File\Csv;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\File\Csv\ReaderManager;

/**
 * CSV File Reader Proxy
 *
 * @package YukataRm\Proxy\File\Csv
 *
 * @method static \YukataRm\Interface\File\Csv\ReaderInterface make()
 * @method static \YukataRm\Interface\File\Csv\ReaderInterface makeFrom(string $path)
 *
 * @method static string|null read(string $path)
 *
 * @method static array readByLine(string $path, int $start = 1)
 * @method static \Generator readLineByLine(string $path, int $start = 1)
 *
 * @method static array readByChunk(string $path, int $row = 1, int $start = 1)
 * @method static \Generator readChunkByChunk(string $path, int $row = 1, int $start = 1)
 *
 * @see \YukataRm\Proxy\Manager\File\Csv\ReaderManager
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
