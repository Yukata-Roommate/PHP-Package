<?php

namespace YukataRm\Entity;

use YukataRm\Interface\Entity\EntityInterface;

/**
 * Base Entity
 *
 * @package YukataRm\Entity
 */
abstract class BaseEntity implements EntityInterface
{
    /*----------------------------------------*
     * Data
     *----------------------------------------*/

    /**
     * data
     *
     * @var array|object|null
     */
    protected array|object|null $_data = null;

    /**
     * constructor
     *
     * @param array|object|null $data
     */
    public function __construct(array|object|null $data = null)
    {
        if (!is_null($data)) $this->setData($data);
    }

    /**
     * get data
     *
     * @return array|object|null
     */
    public function data(): array|object|null
    {
        return $this->_data;
    }

    /**
     * set data
     *
     * @param array|object $data
     * @return static
     */
    public function setData(array|object $data): static
    {
        $this->_data = $data;

        return $this;
    }

    /**
     * get property
     *
     * @param string $name
     * @return mixed
     */
    abstract public function get(string $name): mixed;

    /**
     * set property
     *
     * @param string $name
     * @param mixed $value
     * @return static
     */
    abstract public function set(string $name, mixed $value): static;

    /**
     * isset data
     *
     * @param string $name
     * @return bool
     */
    abstract public function isset(string $name): bool;

    /**
     * unset data
     *
     * @param string $name
     * @return static
     */
    abstract public function unset(string $name): static;

    /**
     * flush data
     *
     * @return static
     */
    public function flush(): static
    {
        $this->_data = null;

        return $this;
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * get property as nullable string
     *
     * @param string $name
     * @return string|null
     */
    public function nullableString(string $name): string|null
    {
        $property = $this->get($name);

        return is_string($property) ? strval($property) : null;
    }

    /**
     * get property as string
     *
     * @param string $name
     * @param string|null $default
     * @return string
     */
    public function string(string $name, string|null $default = null): string
    {
        $property = $this->nullableString($name);

        if (!is_null($property)) return $property;

        if (!is_null($default)) return $default;

        $this->throwRequiredException($name);
    }

    /**
     * get property as nullable int
     *
     * @param string $name
     * @return int|null
     */
    public function nullableInt(string $name): int|null
    {
        $property = $this->get($name);

        return is_numeric($property) ? intval($property) : null;
    }

    /**
     * get property as int
     *
     * @param string $name
     * @param int|null $default
     * @return int
     */
    public function int(string $name, int|null $default = null): int
    {
        $property = $this->nullableInt($name);

        if (!is_null($property)) return $property;

        if (!is_null($default)) return $default;

        $this->throwRequiredException($name);
    }

    /**
     * get property as nullable float
     *
     * @param string $name
     * @return float|null
     */
    public function nullableFloat(string $name): float|null
    {
        $property = $this->get($name);

        return is_numeric($property) ? floatval($property) : null;
    }

    /**
     * get property as float
     *
     * @param string $name
     * @param float|null $default
     * @return float
     */
    public function float(string $name, float|null $default = null): float
    {
        $property = $this->nullableFloat($name);

        if (!is_null($property)) return $property;

        if (!is_null($default)) return $default;

        $this->throwRequiredException($name);
    }

    /**
     * get property as nullable bool
     *
     * @param string $name
     * @return bool|null
     */
    public function nullableBool(string $name): bool|null
    {
        $property = $this->get($name);

        if (intval($property) === 1 || intval($property) === 0) $property = boolval($property);

        return is_bool($property) ? boolval($property) : null;
    }

    /**
     * get property as bool
     *
     * @param string $name
     * @param bool|null $default
     * @return bool
     */
    public function bool(string $name, bool|null $default = null): bool
    {
        $property = $this->nullableBool($name);

        if (!is_null($property)) return $property;

        if (!is_null($default)) return $default;

        $this->throwRequiredException($name);
    }

    /**
     * get property as nullable array
     *
     * @param string $name
     * @return array|null
     */
    public function nullableArray(string $name): array|null
    {
        $property = $this->get($name);

        return is_array($property) ? $property : null;
    }

    /**
     * get property as array
     *
     * @param string $name
     * @param array|null $default
     * @return array
     */
    public function array(string $name, array|null $default = null): array
    {
        $property = $this->nullableArray($name);

        if (!is_null($property)) return $property;

        if (!is_null($default)) return $default;

        $this->throwRequiredException($name);
    }

    /**
     * get property as nullable object
     *
     * @param string $name
     * @return object|null
     */
    public function nullableObject(string $name): object|null
    {
        $property = $this->get($name);

        if (is_string($property)) $property = json_decode($property);

        return is_object($property) ? $property : null;
    }

    /**
     * get property as object
     *
     * @param string $name
     * @param object|null $default
     * @return object
     */
    public function object(string $name, object|null $default = null): object
    {
        $property = $this->nullableObject($name);

        if (!is_null($property)) return $property;

        if (!is_null($default)) return $default;

        $this->throwRequiredException($name);
    }

    /**
     * get property as nullable enum
     *
     * @param string $name
     * @param string $enumClass
     * @return \UnitEnum|null
     */
    public function nullableEnum(string $name, string $enumClass): \UnitEnum|null
    {
        $property = $this->get($name);

        if (is_null($property)) return null;

        if (!enum_exists($enumClass)) return null;

        return $property instanceof $enumClass ? $property : $enumClass::tryFrom($property);
    }

    /**
     * get property as enum
     *
     * @param string $name
     * @param string $enumClass
     * @param \UnitEnum|null $default
     * @return \UnitEnum
     */
    public function enum(string $name, string $enumClass, \UnitEnum|null $default = null): \UnitEnum
    {
        $property = $this->nullableEnum($name, $enumClass);

        if (!is_null($property)) return $property;

        if (!is_null($default) && $default instanceof $enumClass) return $default;

        $this->throwRequiredException($name);
    }

    /*----------------------------------------*
     * Serializable
     *----------------------------------------*/

    /**
     * serialize
     *
     * @return string
     */
    public function serialize(): string
    {
        return serialize($this->_data);
    }

    /**
     * unserialize
     *
     * @param string $serialized
     */
    public function unserialize($serialized): void
    {
        $this->_data = unserialize($serialized);
    }

    /*----------------------------------------*
     * Protected
     *----------------------------------------*/

    /**
     * throw required exception
     *
     * @param string $key
     * @return void
     */
    protected function throwRequiredException(string $key): void
    {
        throw new \RuntimeException("{$key} is required.");
    }

    /**
     * merge keys
     *
     * @param string|array<string> ...$args
     * @return array<string>
     */
    protected function mergeKeys(string|array ...$args): array
    {
        $keys = [];

        foreach ($args as $key) {
            if (is_array($key)) {
                $keys = array_merge($keys, $key);
            } else {
                $keys[] = $key;
            }
        }

        return $keys;
    }
}
