<?php

namespace YukataRm\Proxy;

/**
 * Method Proxy
 *
 * @package YukataRm\Proxy
 */
abstract class MethodProxy
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * called class name
     *
     * @var string
     */
    protected string $className;

    /**
     * callable methods
     *
     * @var array<string>
     */
    protected array $callableMethods = [];

    /**
     * uncallable methods
     *
     * @var array<string>
     */
    protected array $uncallableMethods = [];

    /*----------------------------------------*
     * Call Static
     *----------------------------------------*/

    /**
     * call dynamic method statically
     *
     * @param string $method
     * @param array<mixed> $parameters
     * @return mixed
     */
    public static function __callStatic(string $method, array $parameters): mixed
    {
        $instance = new static($method, $parameters);

        return $instance->callMethod();
    }

    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * called method
     *
     * @var string
     */
    protected string $method;

    /**
     * called method parameters
     *
     * @var array<mixed>
     */
    protected array $parameters;

    /**
     * constructor
     *
     * @param string $method
     * @param array<string> $parameters
     */
    public function __construct(string $method, array $parameters)
    {
        $this->method     = $method;
        $this->parameters = $parameters;
    }

    /*----------------------------------------*
     * Call Method
     *----------------------------------------*/

    /**
     * call dynamic method
     *
     * @return mixed
     */
    public function callMethod(): mixed
    {
        $instance = $this->getClassInstance();

        if (!$this->isCallableMethod()) throw new \RuntimeException("method {$this->method} can not call");

        return $instance->{$this->method}(...$this->parameters);
    }

    /**
     * get called class instance
     *
     * @return object
     */
    protected function getClassInstance(): object
    {
        $className = $this->className();

        if (!class_exists($className)) throw new \RuntimeException("class {$className} does not exist");

        $instance = new $className();

        if (!method_exists($instance, $this->method)) throw new \RuntimeException("method {$this->method} does not exist on class {$className}");

        return $instance;
    }

    /**
     * whether method is callable
     *
     * @return bool
     */
    protected function isCallableMethod(): bool
    {
        $callableMethods = $this->callableMethods();

        if (!empty($callableMethods) && !in_array($this->method, $callableMethods)) return false;

        $uncallableMethods = $this->uncallableMethods();

        if (!empty($uncallableMethods) && in_array($this->method, $uncallableMethods)) return false;

        return true;
    }

    /**
     * get called class name
     *
     * @return string
     */
    protected function className(): string
    {
        return $this->className;
    }

    /**
     * get callable methods
     *
     * @return array<string>
     */
    protected function callableMethods(): array
    {
        return $this->callableMethods;
    }

    /**
     * get uncallable methods
     *
     * @return array<string>
     */
    protected function uncallableMethods(): array
    {
        return $this->uncallableMethods;
    }
}
