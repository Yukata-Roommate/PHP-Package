<?php

namespace YukataRm\Proxy\Manager\File;

use YukataRm\Interface\File\PathInfoInterface;
use YukataRm\File\PathInfo;

/**
 * File PathInfo Proxy Manager
 *
 * @package YukataRm\Proxy\Manager\File
 */
class PathInfoManager
{
    /*----------------------------------------*
     * Make
     *----------------------------------------*/

    /**
     * make PathInfo instance
     *
     * @return \YukataRm\Interface\File\PathInfoInterface
     */
    public function make(): PathInfoInterface
    {
        return new PathInfo();
    }

    /**
     * make PathInfo instance from path
     *
     * @param string $path
     * @return \YukataRm\Interface\File\PathInfoInterface
     */
    public function makeFrom(string $path): PathInfoInterface
    {
        return $this->make()->setPath($path);
    }

    /*----------------------------------------*
     * Info
     *----------------------------------------*/

    /**
     * get path info
     *
     * @param string $path
     * @return array<string, string>
     */
    public function pathInfo(string $path): array
    {
        return $this->makeFrom($path)->pathInfo();
    }

    /**
     * get directory name
     *
     * @param string $path
     * @return string
     */
    public function dirname(string $path): string
    {
        return $this->makeFrom($path)->dirname();
    }

    /**
     * get file name and extension
     *
     * @param string $path
     * @return string
     */
    public function basename(string $path): string
    {
        return $this->makeFrom($path)->basename();
    }

    /**
     * get file extension
     *
     * @param string $path
     * @return string
     */
    public function extension(string $path): string
    {
        return $this->makeFrom($path)->extension();
    }

    /**
     * get file name
     *
     * @param string $path
     * @return string
     */
    public function filename(string $path): string
    {
        return $this->makeFrom($path)->filename();
    }

    /*----------------------------------------*
     * Mime
     *----------------------------------------*/

    /**
     * get mime type
     *
     * @param string $path
     * @return string
     */
    public function mimetype(string $path): string
    {
        return $this->makeFrom($path)->mimetype();
    }

    /*----------------------------------------*
     * Last Modified
     *----------------------------------------*/

    /**
     * get last modified time
     *
     * @param string $path
     * @return int
     */
    public function lastModified(string $path): int
    {
        return $this->makeFrom($path)->lastModified();
    }

    /**
     * get last modified time as DateTime
     *
     * @param string $path
     * @return \DateTime
     */
    public function lastModifiedDateTime(string $path): \DateTime
    {
        return $this->makeFrom($path)->lastModifiedDateTime();
    }

    /*----------------------------------------*
     * Size
     *----------------------------------------*/

    /**
     * get file size
     *
     * @param string $path
     * @return int
     */
    public function size(string $path): int
    {
        return $this->makeFrom($path)->size();
    }

    /**
     * get file size with unit
     *
     * @param string $path
     * @return string
     */
    public function sizeString(string $path): string
    {
        return $this->makeFrom($path)->sizeString();
    }

    /**
     * get file size in kilobytes
     *
     * @param string $path
     * @return float
     */
    public function sizeKb(string $path): float
    {
        return $this->makeFrom($path)->sizeKb();
    }

    /**
     * get file size in kilobytes with unit
     *
     * @param string $path
     * @return string
     */
    public function sizeKbString(string $path): string
    {
        return $this->makeFrom($path)->sizeKbString();
    }

    /**
     * get file size in megabytes
     *
     * @param string $path
     * @return float
     */
    public function sizeMb(string $path): float
    {
        return $this->makeFrom($path)->sizeMb();
    }

    /**
     * get file size in megabytes with unit
     *
     * @param string $path
     * @return string
     */
    public function sizeMbString(string $path): string
    {
        return $this->makeFrom($path)->sizeMbString();
    }

    /**
     * get file size in gigabytes
     *
     * @param string $path
     * @return float
     */
    public function sizeGb(string $path): float
    {
        return $this->makeFrom($path)->sizeGb();
    }

    /**
     * get file size in gigabytes with unit
     *
     * @param string $path
     * @return string
     */
    public function sizeGbString(string $path): string
    {
        return $this->makeFrom($path)->sizeGbString();
    }

    /*----------------------------------------*
     * Permission
     *----------------------------------------*/

    /**
     * get file mode
     *
     * @param string $path
     * @return string
     */
    public function mode(string $path): string
    {
        return $this->makeFrom($path)->mode();
    }

    /**
     * get file owner
     *
     * @param string $path
     * @return string
     */
    public function owner(string $path): string
    {
        return $this->makeFrom($path)->owner();
    }

    /**
     * get file group
     *
     * @param string $path
     * @return string
     */
    public function group(string $path): string
    {
        return $this->makeFrom($path)->group();
    }

    /*----------------------------------------*
     * Check
     *----------------------------------------*/

    /**
     * whether file exists
     *
     * @param string $path
     * @return bool
     */
    public function isExists(string $path): bool
    {
        return $this->makeFrom($path)->isExists();
    }

    /**
     * whether directory exists
     *
     * @param string $path
     * @return bool
     */
    public function isDirExists(string $path): bool
    {
        return $this->makeFrom($path)->isDirExists();
    }

    /**
     * whether file is directory
     *
     * @param string $path
     * @return bool
     */
    public function isDir(string $path): bool
    {
        return $this->makeFrom($path)->isDir();
    }

    /**
     * whether file is regular file
     *
     * @param string $path
     * @return bool
     */
    public function isFile(string $path): bool
    {
        return $this->makeFrom($path)->isFile();
    }

    /**
     * whether file is link
     *
     * @param string $path
     * @return bool
     */
    public function isLink(string $path): bool
    {
        return $this->makeFrom($path)->isLink();
    }

    /**
     * whether file is readable
     *
     * @param string $path
     * @return bool
     */
    public function isReadable(string $path): bool
    {
        return $this->makeFrom($path)->isReadable();
    }

    /**
     * whether file is writable
     *
     * @param string $path
     * @return bool
     */
    public function isWritable(string $path): bool
    {
        return $this->makeFrom($path)->isWritable();
    }

    /**
     * whether file is executable
     *
     * @param string $path
     * @return bool
     */
    public function isExecutable(string $path): bool
    {
        return $this->makeFrom($path)->isExecutable();
    }
}
