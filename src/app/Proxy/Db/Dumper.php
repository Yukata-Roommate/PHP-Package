<?php

namespace YukataRm\Proxy\Db;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\Db\DumperManager;

/**
 * DB Dumper Proxy
 *
 * @package YukataRm\Proxy\Db
 *
 * @method static \YukataRm\Interface\Db\Dumper\MySQLDumperInterface mysql()
 *
 * @see \YukataRm\Proxy\Manager\Db\DumperManager
 */
class Dumper extends MethodProxy
{
    /**
     * called class name
     *
     * @var string
     */
    protected string $className = DumperManager::class;
}
