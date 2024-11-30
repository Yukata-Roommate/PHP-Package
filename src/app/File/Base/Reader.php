<?php

namespace YukataRm\File\Base;

use YukataRm\Interface\File\Base\ReaderInterface;
use YukataRm\File\Base\Operator;

/**
 * Base File Reader
 *
 * @package YukataRm\File\Base
 */
abstract class Reader extends Operator implements ReaderInterface
{
    /*----------------------------------------*
     * Read
     *----------------------------------------*/

    /**
     * read file
     *
     * @return string|null
     */
    public function read(): string|null
    {
        if (!$this->isExists()) throw new \RuntimeException("file not found. path: {$this->path()}");

        $data = file_get_contents($this->path());

        return is_string($data) ? $data : null;
    }

    /*----------------------------------------*
     * Read Line
     *----------------------------------------*/

    /**
     * read file by line
     *
     * @param int $start
     * @return array
     */
    public function readByLine(int $start = 1): array
    {
        if (!$this->isExists()) throw new \RuntimeException("file not found. path: {$this->path()}");

        $data = file($this->path(), FILE_IGNORE_NEW_LINES);

        if (!is_array($data)) return [];

        return array_slice($data, $start - 1);
    }

    /**
     * read file line by line
     *
     * @param int $start
     * @return \Generator
     */
    public function readLineByLine(int $start = 1): \Generator
    {
        if (!$this->isExists()) throw new \RuntimeException("file not found. path: {$this->path()}");

        $file = new \SplFileObject($this->path(), "r");

        if (!$file) throw new \RuntimeException("failed to open file. path: {$this->path()}");

        $loop = 0;

        while (!$file->eof()) {
            $loop++;

            $line = $this->getFileData($file);

            if ($loop < $start) continue;

            yield $line;
        }
    }

    /**
     * get file data
     *
     * @param \SplFileObject $file
     * @return mixed
     */
    abstract protected function getFileData(\SplFileObject $file): mixed;

    /*----------------------------------------*
     * Read Chunk
     *----------------------------------------*/

    /**
     * read file by chunk
     *
     * @param int $row
     * @param int $start
     * @return array
     */
    public function readByChunk(int $row = 1, int $start = 1): array
    {
        $data = $this->readByLine($start);

        return is_array($data) ? array_chunk($data, $row) : [];
    }

    /**
     * read file chunk by chunk
     *
     * @param int $row
     * @param int $start
     * @return \Generator
     */
    public function readChunkByChunk(int $row = 1, int $start = 1): \Generator
    {
        $chunk = [];

        foreach ($this->readLineByLine($start) as $line) {
            $chunk[] = $line;

            if (count($chunk) < $row) continue;

            yield $chunk;

            $chunk = [];
        }
    }
}
