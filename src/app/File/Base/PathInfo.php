<?php

namespace YukataRm\File\Base;

use YukataRm\Interface\File\Base\PathInfoInterface;

/**
 * Base File PathInfo
 *
 * @package YukataRm\File\Base
 */
abstract class PathInfo implements PathInfoInterface
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * file path
     *
     * @var string
     */
    protected string $path = "";

    /**
     * set path
     *
     * @param string $path
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /*----------------------------------------*
     * Info
     *----------------------------------------*/

    /**
     * get path
     *
     * @return string
     */
    public function path(): string
    {
        return $this->path;
    }

    /**
     * get real path
     *
     * @return string
     */
    public function realpath(): string
    {
        $realpath = realpath($this->path());

        if ($realpath === false) throw new \RuntimeException("failed to get real path.");

        return $realpath;
    }

    /**
     * get path info
     *
     * @return array<string, string>
     */
    public function pathInfo(): array
    {
        return pathinfo($this->path());
    }

    /**
     * get directory name
     *
     * @return string
     */
    public function dirname(): string
    {
        return $this->pathInfo()["dirname"];
    }

    /**
     * get file name and extension
     *
     * @return string
     */
    public function basename(): string
    {
        return $this->pathInfo()["basename"];
    }

    /**
     * get file extension
     *
     * @return string
     */
    public function extension(): string
    {
        return $this->pathInfo()["extension"];
    }

    /**
     * get file name
     *
     * @return string
     */
    public function filename(): string
    {
        return $this->pathInfo()["filename"];
    }

    /*----------------------------------------*
     * Mime
     *----------------------------------------*/

    /**
     * get mime type
     *
     * @return string
     */
    public function mimetype(): string
    {
        $mimetype = mime_content_type($this->path());

        if ($mimetype === false) throw new \RuntimeException("failed to get mime type.");

        return $mimetype;
    }

    /*----------------------------------------*
     * Last Modified
     *----------------------------------------*/

    /**
     * get last modified time
     *
     * @return int
     */
    public function lastModified(): int
    {
        $lastModified = filemtime($this->path());

        if ($lastModified === false) throw new \RuntimeException("failed to get last modified time.");

        return $lastModified;
    }

    /**
     * get last modified time as DateTime
     *
     * @return \DateTime
     */
    public function lastModifiedDateTime(): \DateTime
    {
        $lastModified = $this->lastModified();

        return new \DateTime("@$lastModified");
    }

    /*----------------------------------------*
     * Size
     *----------------------------------------*/

    /**
     * get file size
     *
     * @return int
     */
    public function size(): int
    {
        $size = filesize($this->path());

        if ($size === false) throw new \RuntimeException("failed to get file size.");

        return $size;
    }

    /**
     * get file size with unit
     *
     * @return string
     */
    public function sizeString(): string
    {
        return $this->size() . " bytes";
    }

    /**
     * get file size in kilobytes
     *
     * @return float
     */
    public function sizeKb(): float
    {
        return $this->size() / 1024;
    }

    /**
     * get file size in kilobytes with unit
     *
     * @return string
     */
    public function sizeKbString(): string
    {
        return $this->sizeKb() . " KB";
    }

    /**
     * get file size in megabytes
     *
     * @return float
     */
    public function sizeMb(): float
    {
        return $this->sizeKb() / 1024;
    }

    /**
     * get file size in megabytes with unit
     *
     * @return string
     */
    public function sizeMbString(): string
    {
        return $this->sizeMb() . " MB";
    }

    /**
     * get file size in gigabytes
     *
     * @return float
     */
    public function sizeGb(): float
    {
        return $this->sizeMb() / 1024;
    }

    /**
     * get file size in gigabytes with unit
     *
     * @return string
     */
    public function sizeGbString(): string
    {
        return $this->sizeGb() . " GB";
    }

    /*----------------------------------------*
     * Permission
     *----------------------------------------*/

    /**
     * get file mode
     *
     * @return string
     */
    public function mode(): string
    {
        $mode = fileperms($this->path());

        if ($mode === false) throw new \RuntimeException("failed to get file mode.");

        return substr(sprintf("%o", $mode), -4);
    }

    /**
     * get file owner
     *
     * @return string
     */
    public function owner(): string
    {
        $owner = fileowner($this->path());

        if ($owner === false) throw new \RuntimeException("failed to get file owner.");

        $pwuid = posix_getpwuid($owner);

        if ($pwuid === false) throw new \RuntimeException("failed to get file owner information.");

        return $pwuid["name"];
    }

    /**
     * get file group
     *
     * @return string
     */
    public function group(): string
    {
        $group = filegroup($this->path());

        if ($group === false) throw new \RuntimeException("failed to get file group.");

        $grgid = posix_getgrgid($group);

        if ($grgid === false) throw new \RuntimeException("failed to get file group information.");

        return $grgid["name"];
    }

    /*----------------------------------------*
     * Check
     *----------------------------------------*/

    /**
     * whether file exists
     *
     * @return bool
     */
    public function isExists(): bool
    {
        return file_exists($this->path());
    }

    /**
     * whether directory exists
     *
     * @return bool
     */
    public function isDirExists(): bool
    {
        return is_dir($this->dirname());
    }

    /**
     * whether file is directory
     *
     * @return bool
     */
    public function isDir(): bool
    {
        return is_dir($this->path());
    }

    /**
     * whether file is regular file
     *
     * @return bool
     */
    public function isFile(): bool
    {
        return is_file($this->path());
    }

    /**
     * whether file is link
     *
     * @return bool
     */
    public function isLink(): bool
    {
        return is_link($this->path());
    }

    /**
     * whether file is readable
     *
     * @return bool
     */
    public function isReadable(): bool
    {
        return is_readable($this->path());
    }

    /**
     * whether file is writable
     *
     * @return bool
     */
    public function isWritable(): bool
    {
        return is_writable($this->path());
    }

    /**
     * whether file is executable
     *
     * @return bool
     */
    public function isExecutable(): bool
    {
        return is_executable($this->path());
    }
}
