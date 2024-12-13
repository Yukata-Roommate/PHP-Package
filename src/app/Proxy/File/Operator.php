<?php

namespace YukataRm\Proxy\File;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\File\OperatorManager;

/**
 * File Operator Proxy
 *
 * @package YukataRm\Proxy\File
 *
 * @method static \YukataRm\Interface\File\OperatorInterface make()
 * @method static \YukataRm\Interface\File\OperatorInterface makeFrom(string $path)
 *
 * @method static static|null create(string $path)
 *
 * @method static bool remove(string $path)
 *
 * @method static static|null copy(string $source, string $destination)
 *
 * @method static static|null move(string $source, string $destination)
 *
 * @method static static|null zip(string $path, string|null $destination = null)
 * @method static static|array|null unzip(string $path, string|null $destination = null)
 *
 * @method static bool chmod(string $path, int $mode)
 * @method static bool chown(string $path, string $user)
 * @method static bool chgrp(string $path, string $group)
 *
 * @see \YukataRm\Proxy\Manager\File\OperatorManager
 */
class Operator extends MethodProxy
{
    /**
     * called class name
     *
     * @var string
     */
    protected string $className = OperatorManager::class;
}
