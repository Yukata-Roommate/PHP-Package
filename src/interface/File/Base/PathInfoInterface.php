<?php

namespace YukataRm\Interface\File\Base;

/**
 * Base File PathInfo Interface
 *
 * @package YukataRm\Interface\File\Base
 */
interface PathInfoInterface
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * set path
     *
     * @param string $path
     * @return static
     */
    public function setPath(string $path): static;

    /*----------------------------------------*
     * Info
     *----------------------------------------*/

    /**
     * get path
     *
     * @return string
     */
    public function path(): string;

    /**
     * get real path
     *
     * @return string
     */
    public function realpath(): string;

    /**
     * get path info
     *
     * @return array<string, string>
     */
    public function pathInfo(): array;

    /**
     * get directory name
     *
     * @return string
     */
    public function dirname(): string;

    /**
     * get file name and extension
     *
     * @return string
     */
    public function basename(): string;

    /**
     * get file extension
     *
     * @return string
     */
    public function extension(): string;

    /**
     * get file name
     *
     * @return string
     */
    public function filename(): string;

    /*----------------------------------------*
     * Mime
     *----------------------------------------*/

    /**
     * get mime type
     *
     * @return string
     */
    public function mimetype(): string;

    /*----------------------------------------*
     * Last Modified
     *----------------------------------------*/

    /**
     * get last modified time
     *
     * @return int
     */
    public function lastModified(): int;

    /**
     * get last modified time as DateTime
     *
     * @return \DateTime
     */
    public function lastModifiedDateTime(): \DateTime;

    /*----------------------------------------*
     * Size
     *----------------------------------------*/

    /**
     * get file size
     *
     * @return int
     */
    public function size(): int;

    /**
     * get file size with unit
     *
     * @return string
     */
    public function sizeString(): string;

    /**
     * get file size in kilobytes
     *
     * @return float
     */
    public function sizeKb(): float;

    /**
     * get file size in kilobytes with unit
     *
     * @return string
     */
    public function sizeKbString(): string;

    /**
     * get file size in megabytes
     *
     * @return float
     */
    public function sizeMb(): float;

    /**
     * get file size in megabytes with unit
     *
     * @return string
     */
    public function sizeMbString(): string;

    /**
     * get file size in gigabytes
     *
     * @return float
     */
    public function sizeGb(): float;

    /**
     * get file size in gigabytes with unit
     *
     * @return string
     */
    public function sizeGbString(): string;

    /*----------------------------------------*
     * Permission
     *----------------------------------------*/

    /**
     * get file mode
     *
     * @return string
     */
    public function mode();

    /**
     * get file owner
     *
     * @return string
     */
    public function owner();

    /**
     * get file group
     *
     * @return string
     */
    public function group();

    /*----------------------------------------*
     * Check
     *----------------------------------------*/

    /**
     * whether file exists
     *
     * @return bool
     */
    public function isExists(): bool;

    /**
     * whether directory exists
     *
     * @return bool
     */
    public function isDirExists(): bool;

    /**
     * whether file is directory
     *
     * @return bool
     */
    public function isDir(): bool;

    /**
     * whether file is regular file
     *
     * @return bool
     */
    public function isFile(): bool;

    /**
     * whether file is link
     *
     * @return bool
     */
    public function isLink(): bool;

    /**
     * whether file is readable
     *
     * @return bool
     */
    public function isReadable(): bool;

    /**
     * whether file is writable
     *
     * @return bool
     */
    public function isWritable(): bool;

    /**
     * whether file is executable
     *
     * @return bool
     */
    public function isExecutable(): bool;
}
