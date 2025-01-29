<?php

namespace YukataRm\Env;

use YukataRm\Env\CustomEnvLoader;

/**
 * DB Env Loader
 *
 * @package YukataRm\Env
 */
class DbEnvLoader extends CustomEnvLoader
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * .env common key name prefix
     *
     * @var string
     */
    protected string $prefix = "DB";

    /*=======================================*
     * MySQL
     *=======================================*/

    /**
     * get .env mysql key name
     *
     * @param string $key
     * @return string
     */
    protected function mysqlKey(string $key): string
    {
        return $this->envKey("MYSQL_" . $key);
    }

    /*----------------------------------------*
     * Dump Driver
     *----------------------------------------*/

    /**
     * mysql dump driver
     *
     * @var string
     */
    public string $mysqlDumpDriver;

    /**
     * mysql dump driver default
     *
     * @var string
     */
    protected string $mysqlDumpDriverDefault = "mysqldump";

    /*=======================================*
     * PostgreSQL
     *=======================================*/

    /**
     * get .env pgsql key name
     *
     * @param string $key
     * @return string
     */
    protected function pgsqlKey(string $key): string
    {
        return $this->envKey("PGSQL_" . $key);
    }

    /*----------------------------------------*
     * Dump Driver
     *----------------------------------------*/

    /**
     * pgsql dump driver
     *
     * @var string
     */
    public string $pgsqlDumpDriver;

    /**
     * pgsql dump driver default
     *
     * @var string
     */
    protected string $pgsqlDumpDriverDefault = "pg_dump";

    /**
     * bind .env parameters
     *
     * @return void
     */
    protected function bind(): void
    {
        $this->mysqlDumpDriver = $this->string($this->mysqlKey("DUMP_DRIVER"), $this->mysqlDumpDriverDefault);

        $this->pgsqlDumpDriver = $this->string($this->pgsqlKey("DUMP_DRIVER"), $this->pgsqlDumpDriverDefault);
    }
}
