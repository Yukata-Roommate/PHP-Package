<?php

namespace YukataRm\Interface\File\Base;

use YukataRm\Interface\File\Base\OperatorInterface;

/**
 * Base File Reader Interface
 *
 * @package YukataRm\Interface\File\Base
 */
interface ReaderInterface extends OperatorInterface
{
    /*----------------------------------------*
     * Read
     *----------------------------------------*/

    /**
     * read file
     *
     * @return string|null
     */
    public function read(): string|null;

    /*----------------------------------------*
     * Read Line
     *----------------------------------------*/

    /**
     * read file by line
     *
     * @param int $start
     * @return array
     */
    public function readByLine(int $start = 1): array;

    /**
     * read file line by line
     *
     * @param int $start
     * @return \Generator
     */
    public function readLineByLine(int $start = 1): \Generator;

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
    public function readByChunk(int $row = 1, int $start = 1): array;

    /**
     * read file chunk by chunk
     *
     * @param int $row
     * @param int $start
     * @return \Generator
     */
    public function readChunkByChunk(int $row = 1, int $start = 1): \Generator;
}
