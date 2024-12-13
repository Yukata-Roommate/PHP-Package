<?php

namespace YukataRm\Interface\Entity;

use Serializable;

/**
 * Entity Interface
 *
 * @package YukataRm\Interface\Entity
 */
interface EntityInterface extends Serializable
{
    /*----------------------------------------*
     * Data
     *----------------------------------------*/

    /**
     * get data
     *
     * @return array|object|null
     */
    public function data(): array|object|null;

    /**
     * set data
     *
     * @param array|object $data
     * @return static
     */
    public function setData(array|object $data): static;

    /**
     * get property
     *
     * @param string $name
     * @return mixed
     */
    public function get(string $name): mixed;

    /**
     * set property
     *
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function set(string $name, mixed $value): static;

    /**
     * isset data
     *
     * @param string $name
     * @return bool
     */
    public function isset(string $name): bool;

    /**
     * unset data
     *
     * @param string $name
     * @return static
     */
    public function unset(string $name): static;

    /**
     * flush data
     *
     * @return static
     */
    public function flush(): static;

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * get property as nullable string
     *
     * @param string $name
     * @return string|null
     */
    public function nullableString(string $name): string|null;

    /**
     * get property as string
     *
     * @param string $name
     * @param string|null $default
     * @return string
     */
    public function string(string $name, string|null $default = null): string;

    /**
     * get property as nullable int
     *
     * @param string $name
     * @return int|null
     */
    public function nullableInt(string $name): int|null;

    /**
     * get property as int
     *
     * @param string $name
     * @param int|null $default
     * @return int
     */
    public function int(string $name, int|null $default = null): int;

    /**
     * get property as nullable float
     *
     * @param string $name
     * @return float|null
     */
    public function nullableFloat(string $name): float|null;

    /**
     * get property as float
     *
     * @param string $name
     * @param float|null $default
     * @return float
     */
    public function float(string $name, float|null $default = null): float;

    /**
     * get property as nullable bool
     *
     * @param string $name
     * @return bool|null
     */
    public function nullableBool(string $name): bool|null;

    /**
     * get property as bool
     *
     * @param string $name
     * @param bool|null $default
     * @return bool
     */
    public function bool(string $name, bool|null $default = null): bool;

    /**
     * get property as nullable array
     *
     * @param string $name
     * @return array|null
     */
    public function nullableArray(string $name): array|null;

    /**
     * get property as array
     *
     * @param string $name
     * @param array|null $default
     * @return array
     */
    public function array(string $name, array|null $default = null): array;

    /**
     * get property as nullable object
     *
     * @param string $name
     * @return object|null
     */
    public function nullableObject(string $name): object|null;

    /**
     * get property as object
     *
     * @param string $name
     * @param object|null $default
     * @return object
     */
    public function object(string $name, object|null $default = null): object;

    /**
     * get property as nullable enum
     *
     * @param string $name
     * @param string $enumClass
     * @return \UnitEnum|null
     */
    public function nullableEnum(string $name, string $enumClass): \UnitEnum|null;

    /**
     * get property as enum
     *
     * @param string $name
     * @param string $enumClass
     * @param \UnitEnum|null $default
     * @return \UnitEnum
     */
    public function enum(string $name, string $enumClass, \UnitEnum|null $default = null): \UnitEnum;
}
