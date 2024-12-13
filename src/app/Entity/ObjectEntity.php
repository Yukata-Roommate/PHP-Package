<?php

namespace YukataRm\Entity;

use YukataRm\Interface\Entity\ObjectEntityInterface;
use YukataRm\Entity\BaseEntity;

/**
 * Object Entity
 *
 * @package YukataRm\Entity
 */
class ObjectEntity extends BaseEntity implements ObjectEntityInterface
{
    /**
     * get property
     *
     * @param string $name
     * @return mixed
     */
    public function get(string $name): mixed
    {
        return is_object($this->_data) && isset($this->_data->{$name}) ? $this->_data->{$name} : null;
    }

    /**
     * set property
     *
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function set(string $name, mixed $value): static
    {
        if (!is_object($this->_data)) $this->setData(new \stdClass);

        $this->_data->{$name} = $value;

        return $this;
    }

    /**
     * isset data
     *
     * @param string $name
     * @return bool
     */
    public function isset(string $name): bool
    {
        return is_object($this->_data) && isset($this->_data->{$name});
    }

    /**
     * unset data
     *
     * @param string $name
     * @return static
     */
    public function unset(string $name): static
    {
        if (!$this->isset($name)) return $this;

        unset($this->_data->{$name});

        return $this;
    }

    /**
     * get all properties
     *
     * @return array<string, mixed>
     */
    public function all(): array
    {
        $reflector = new \ReflectionClass($this);
        $reflectorClassName = $reflector->getName();

        $properties = $reflector->getProperties(\ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $property) {
            if ($property->class !== $reflectorClassName) continue;
            if ($property->isInitialized($this) === false) continue;
            if ($property->isStatic()) continue;

            $name = $property->getName();

            $all[$name] = $this->{$name};
        }

        return $all;
    }

    /**
     * to array
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->all();
    }

    /**
     * get only properties with keys
     *
     * @param string|array<string> ...$keys
     * @return array<string, mixed>
     */
    public function only(string|array ...$keys): array
    {
        $keys = $this->mergeKeys(...$keys);

        $all = $this->all();

        return array_filter($all, fn($key) => in_array($key, $keys), ARRAY_FILTER_USE_KEY);
    }

    /**
     * get except properties with keys
     *
     * @param string|array<string> ...$keys
     * @return array<string, mixed>
     */
    public function except(string|array ...$keys): array
    {
        $keys = $this->mergeKeys(...$keys);

        $all = $this->all();

        return array_filter($all, fn($key) => !in_array($key, $keys), ARRAY_FILTER_USE_KEY);
    }

    /*----------------------------------------*
     * Call Property
     *----------------------------------------*/

    /**
     * call property
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments): mixed
    {
        if (count($arguments) === 0) return $this->get($name);

        $this->set($name, $arguments);

        return $this;
    }
}
