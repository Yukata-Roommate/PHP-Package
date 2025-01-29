<?php

namespace YukataRm\Entity;

use YukataRm\Interface\Entity\ArrayEntityInterface;
use YukataRm\Entity\BaseEntity;

/**
 * Array Entity
 *
 * @package YukataRm\Entity
 */
class ArrayEntity extends BaseEntity implements ArrayEntityInterface
{
    /*----------------------------------------*
     * Data
     *----------------------------------------*/

    /**
     * get property
     *
     * @param string $name
     * @return mixed
     */
    public function get(string $name): mixed
    {
        return is_array($this->_data) && isset($this->_data[$name]) ? $this->_data[$name] : null;
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
        if (!is_array($this->_data)) $this->setData([]);

        $this->_data[$name] = $value;

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
        return is_array($this->_data) && isset($this->_data[$name]);
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

        unset($this->_data[$name]);

        return $this;
    }

    /**
     * get data keys
     *
     * @return array<int|string>
     */
    public function keys(): array
    {
        return array_keys($this->_data);
    }

    /**
     * get first key
     *
     * @return int|string|null
     */
    public function firstKey(): int|string|null
    {
        return array_key_first($this->_data);
    }

    /**
     * get last key
     *
     * @return int|string|null
     */
    public function lastKey(): int|string|null
    {
        return array_key_last($this->_data);
    }

    /**
     * get values
     *
     * @return array
     */
    public function values(): array
    {
        return array_values($this->_data);
    }

    /**
     * get first value
     *
     * @return mixed
     */
    public function first(): mixed
    {
        return reset($this->values()) ?: null;
    }

    /**
     * get last value
     *
     * @return mixed
     */
    public function last(): mixed
    {
        return end($this->values()) ?: null;
    }

    /*----------------------------------------*
     * IteratorAggregate
     *----------------------------------------*/

    /**
     * get iterator
     *
     * @return \Traversable
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->_data);
    }

    /*----------------------------------------*
     * ArrayAccess
     *----------------------------------------*/

    /**
     * offset exists
     *
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->_data[$offset]);
    }

    /**
     * offset get
     *
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset): mixed
    {
        return isset($this->_data[$offset]) ? $this->_data[$offset] : null;
    }

    /**
     * offset set
     *
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->_data[] = $value;
        } else {
            $this->_data[$offset] = $value;
        }
    }

    /**
     * offset unset
     *
     * @param mixed $offset
     */
    public function offsetUnset($offset): void
    {
        unset($this->_data[$offset]);
    }

    /*----------------------------------------*
     * Countable
     *----------------------------------------*/

    /**
     * count
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->_data);
    }

    /*----------------------------------------*
     * Sort
     *----------------------------------------*/

    /**
     * sort data
     *
     * @param callable $callback
     * @return static
     */
    public function sort(callable $callback): static
    {
        $tmp = $this->_data;

        usort($tmp, $callback);

        $this->_data = $tmp;

        return $this;
    }

    /**
     * sort data by key
     *
     * @param callable $callback
     * @return static
     */
    public function sortKey(callable $callback): static
    {
        $tmp = $this->_data;

        uksort($tmp, $callback);

        $this->_data = $tmp;

        return $this;
    }

    /*----------------------------------------*
     * Filter
     *----------------------------------------*/

    /**
     * filter data
     *
     * @param callable $callback
     * @return static
     */
    public function filter(callable $callback): static
    {
        $tmp = [];

        foreach ($this->_data as $key => $value) {
            if ($callback($key, $value)) $tmp[$key] = $value;
        }

        $this->_data = $tmp;

        return $this;
    }

    /**
     * filter data by key
     *
     * @param callable $callback
     * @return static
     */
    public function filterKey(callable $callback): static
    {
        $tmp = [];

        foreach ($this->_data as $key => $value) {
            if ($callback($key)) $tmp[$key] = $value;
        }

        $this->_data = $tmp;

        return $this;
    }

    /**
     * filter data by value
     *
     * @param callable $callback
     * @return static
     */
    public function filterValue(callable $callback): static
    {
        $tmp = [];

        foreach ($this->_data as $key => $value) {
            if ($callback($value)) $tmp[$key] = $value;
        }

        $this->_data = $tmp;

        return $this;
    }

    /*----------------------------------------*
     * Shuffle
     *----------------------------------------*/

    /**
     * shuffle data
     *
     * @return static
     */
    public function shuffle(): static
    {
        $keys = $this->keys();

        shuffle($keys);

        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = $this->_data[$key];
        }

        $this->_data = $tmp;

        return $this;
    }

    /**
     * shuffle data keep keys association
     *
     * @return static
     */
    public function shuffleAssoc(): static
    {
        $keys = $this->keys();

        shuffle($keys);

        $tmp = [];
        foreach ($keys as $key) {
            $tmp[$key] = $this->_data[$key];
        }

        $this->_data = $tmp;

        return $this;
    }

    /*----------------------------------------*
     * Merge
     *----------------------------------------*/

    /**
     * merge data
     *
     * @param array $merged
     * @return static
     */
    public function merge(array ...$merged): static
    {
        $tmp = $this->_data;

        foreach ($merged as $item) {
            $tmp = array_merge($tmp, $item);
        }

        $this->_data = $tmp;

        return $this;
    }

    /**
     * merge data recursive
     *
     * @param array $merged
     * @return static
     */
    public function mergeRecursive(array ...$merged): static
    {
        $tmp = $this->_data;

        foreach ($merged as $item) {
            $tmp = array_merge_recursive($tmp, $item);
        }

        $this->_data = $tmp;

        return $this;
    }

    /**
     * merge data unique
     *
     * @param array $merged
     * @return static
     */
    public function mergeUnique(array ...$merged): static
    {
        $tmp = $this->_data;

        foreach ($merged as $item) {
            $tmp = array_merge($tmp, $item);

            $tmp = array_unique($tmp);

            $tmp = array_values($tmp);
        }

        $this->_data = $tmp;

        return $this;
    }

    /**
     * merge data unique recursive
     *
     * @param array $merged
     * @return static
     */
    public function mergeUniqueRecursive(array ...$merged): static
    {
        $tmp = $this->_data;

        foreach ($merged as $item) {
            $tmp = array_merge_recursive($tmp, $item);

            $tmp = array_map("unserialize", array_unique(array_map("serialize", $tmp)));
        }

        $this->_data = $tmp;

        return $this;
    }

    /*----------------------------------------*
     * Diff
     *----------------------------------------*/

    /**
     * diff data
     *
     * @param array $diff
     * @return static
     */
    public function diff(array $diff): static
    {
        $tmp = array_diff($this->_data, $diff);

        $this->_data = $tmp;

        return $this;
    }

    /**
     * diff data recursive
     *
     * @param array $diff
     * @return static
     */
    public function diffRecursive(array $diff): static
    {
        foreach ($diff as $key => $value) {
            if (is_array($value)) {
                $this->_data[$key] = (new static($this->_data[$key]))->diffRecursive($value)->data();
            } else {
                if (in_array($value, $this->_data)) unset($this->_data[$key]);
            }
        }

        return $this;
    }

    /*----------------------------------------*
     * Remove
     *----------------------------------------*/

    /**
     * remove data
     *
     * @param string|array<string> $target
     * @return static
     */
    public function remove(string|array $target): static
    {
        if (is_string($target)) $target = [$target];

        $tmp = [];

        foreach ($this->_data as $key => $value) {
            if (in_array($key, $target)) continue;

            $tmp[$key] = $value;
        }

        $this->_data = $tmp;

        return $this;
    }

    /**
     * remove data recursive
     *
     * @param string|array<string> $target
     * @return static
     */
    public function removeRecursive(string|array $target): static
    {
        if (is_string($target)) $target = [$target];

        $tmp = [];

        foreach ($this->_data as $key => $value) {
            if (is_array($value)) $value = (new static($value))->removeRecursive($target)->data();

            if (in_array($key, $target)) continue;

            $tmp[$key] = $value;
        }

        $this->_data = $tmp;

        return $this;
    }

    /**
     * remove empty value
     *
     * @return static
     */
    public function removeEmpty(): static
    {
        $tmp = [];

        foreach ($this->_data as $key => $value) {
            if (empty($value)) continue;

            $tmp[$key] = $value;
        }

        $this->_data = $tmp;

        return $this;
    }

    /**
     * remove empty value recursive
     *
     * @return static
     */
    public function removeEmptyRecursive(): static
    {
        $tmp = [];

        foreach ($this->_data as $key => $value) {
            if (is_array($value)) $value = (new static($value))->removeEmptyRecursive()->data();

            if (empty($value)) continue;

            $tmp[$key] = $value;
        }

        $this->_data = $tmp;

        return $this;
    }

    /*----------------------------------------*
     * Masking
     *----------------------------------------*/

    /**
     * masking data
     *
     * @param string|array<string> $target
     * @param string $replace
     * @return static
     */
    public function masking(string|array $target, string $replace = "*******"): static
    {
        if (is_string($target)) $target = [$target];

        $tmp = [];

        foreach ($this->_data as $key => $value) {
            if (in_array($key, $target)) $value = $replace;

            $tmp[$key] = $value;
        }

        $this->_data = $tmp;

        return $this;
    }

    /**
     * masking data recursive
     *
     * @param string|array<string> $target
     * @param string $replace
     * @return static
     */
    public function maskingRecursive(string|array $target, string $replace = "*******"): static
    {
        if (is_string($target)) $target = [$target];

        $tmp = [];

        foreach ($this->_data as $key => $value) {
            if (is_array($value)) $value = (new static($value))->maskingRecursive($target, $replace)->data();

            if (in_array($key, $target)) $value = $replace;

            $tmp[$key] = $value;
        }

        $this->_data = $tmp;

        return $this;
    }
}
