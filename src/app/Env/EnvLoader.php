<?php

namespace YukataRm\Env;

use YukataRm\Entity\ArrayEntity;

use Dotenv\Dotenv;

/**
 * Env Loader
 *
 * @package YukataRm\Env
 */
abstract class EnvLoader extends ArrayEntity
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     */
    public function __construct()
    {
        $this->init();

        parent::__construct($_ENV);

        $this->bind();
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * .env file path
     *
     * @var string
     */
    protected string $path;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * init Dotenv
     *
     * @return void
     */
    protected function init(): void
    {
        $this->load($this->dotenv());
    }

    /**
     * get Dotenv
     *
     * @return \Dotenv\Dotenv
     */
    protected function dotenv(): Dotenv
    {
        return Dotenv::createImmutable($this->path());
    }

    /**
     * load .env file
     *
     * @param \Dotenv\Dotenv $dotenv
     * @return void
     */
    protected function load(Dotenv $dotenv): void
    {
        $dotenv->safeLoad();
    }

    /**
     * get .env path
     *
     * @return string
     */
    protected function path(): string
    {
        return $this->path;
    }

    /**
     * bind .env parameters
     *
     * @return void
     */
    abstract protected function bind(): void;
}
