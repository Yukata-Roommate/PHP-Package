<?php

namespace YukataRm\Proxy\Manager\File\Csv;

use YukataRm\Interface\File\Csv\ReaderInterface;
use YukataRm\File\Csv\Reader;

/**
 * CSV File Reader Proxy Manager
 *
 * @package YukataRm\Proxy\Manager\File\Csv
 */
class ReaderManager
{
    /*----------------------------------------*
     * Make
     *----------------------------------------*/

    /**
     * make Reader instance
     *
     * @return \YukataRm\Interface\File\Csv\ReaderInterface
     */
    public function make(): ReaderInterface
    {
        return new Reader();
    }

    /**
     * make Reader instance from path
     *
     * @param string $path
     * @return \YukataRm\Interface\File\Csv\ReaderInterface
     */
    public function makeFrom(string $path): ReaderInterface
    {
        return $this->make()->setPath($path);
    }

    /*----------------------------------------*
     * Read
     *----------------------------------------*/

    /**
     * read file
     *
     * @param string $path
     * @return string|null
     */
    public function read(string $path): string|null
    {
        return $this->makeFrom($path)->read();
    }

    /*----------------------------------------*
     * Read Line
     *----------------------------------------*/

    /**
     * read file by line
     *
     * @param string $path
     * @param int $start
     * @return array
     */
    public function readByLine(string $path, int $start = 1): array
    {
        return $this->makeFrom($path)->readByLine($start);
    }

    /**
     * read file line by line
     *
     * @param string $path
     * @param int $start
     * @return \Generator
     */
    public function readLineByLine(string $path, int $start = 1): \Generator
    {
        return $this->makeFrom($path)->readLineByLine($start);
    }

    /*----------------------------------------*
     * Read Chunk
     *----------------------------------------*/

    /**
     * read file by chunk
     *
     * @param string $path
     * @param int $row
     * @param int $start
     * @return array
     */
    public function readByChunk(string $path, int $row = 1, int $start = 1): array
    {
        return $this->makeFrom($path)->readByChunk($row, $start);
    }

    /**
     * read file chunk by chunk
     *
     * @param string $path
     * @param int $row
     * @param int $start
     * @return \Generator
     */
    public function readChunkByChunk(string $path, int $row = 1, int $start = 1): \Generator
    {
        return $this->makeFrom($path)->readChunkByChunk($row, $start);
    }
}
