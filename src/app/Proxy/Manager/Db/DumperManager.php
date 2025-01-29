<?php

namespace YukataRm\Proxy\Manager\Db;

use YukataRm\Interface\Db\Dumper\MySQLDumperInterface;
use YukataRm\Db\Dumper\MySQLDumper;

/**
 * DB Dumper Proxy Manager
 *
 * @package YukataRm\Proxy\Manager\Db
 */
class DumperManager
{
    /*----------------------------------------*
     * Make
     *----------------------------------------*/

    /**
     * make MySQL Dumper instance
     *
     * @return \YukataRm\Interface\Db\Dumper\MySQLDumperInterface
     */
    public function mysql(): MySQLDumperInterface
    {
        return new MySQLDumper();
    }
}
