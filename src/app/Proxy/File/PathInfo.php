<?php

namespace YukataRm\Proxy\File;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\File\PathInfoManager;

/**
 * File PathInfo Proxy
 *
 * @package YukataRm\Proxy\File
 *
 * @method static \YukataRm\Interface\File\PathInfoInterface make()
 * @method static \YukataRm\Interface\File\PathInfoInterface makeFrom(string $path)
 *
 * @method static array<string, string> pathInfo(string $path)
 * @method static string dirname(string $path)
 * @method static string basename(string $path)
 * @method static string extension(string $path)
 * @method static string filename(string $path)
 *
 * @method static string mimetype(string $path)
 *
 * @method static int lastModified(string $path)
 * @method static \DateTime lastModifiedDateTime(string $path)
 *
 * @method static int size(string $path)
 * @method static string sizeString(string $path)
 * @method static float sizeKb(string $path)
 * @method static string sizeKbString(string $path)
 * @method static float sizeMb(string $path)
 * @method static string sizeMbString(string $path)
 * @method static float sizeGb(string $path)
 * @method static string sizeGbString(string $path)
 *
 * @method static string mode(string $path)
 * @method static string owner(string $path)
 * @method static string group(string $path)
 *
 * @method static bool isExists(string $path)
 * @method static bool isDirExists(string $path)
 * @method static bool isDir(string $path)
 * @method static bool isFile(string $path)
 * @method static bool isLink(string $path)
 * @method static bool isReadable(string $path)
 * @method static bool isWritable(string $path)
 * @method static bool isExecutable(string $path)
 *
 * @see \YukataRm\Proxy\Manager\File\PathInfoManager
 */
class PathInfo extends MethodProxy
{
    /**
     * called class name
     *
     * @var string
     */
    protected string $className = PathInfoManager::class;
}
