<?php

namespace YukataRm\Proxy\Manager;

use YukataRm\Interface\Entity\ArrayEntityInterface;
use YukataRm\Entity\ArrayEntity;
use YukataRm\Interface\Entity\ObjectEntityInterface;
use YukataRm\Entity\ObjectEntity;

/**
 * Entity Proxy Manager
 *
 * @package YukataRm\Proxy\Manager
 */
class EntityManager
{
    /*----------------------------------------*
     * Array
     *----------------------------------------*/

    /**
     * make ArrayEntity
     *
     * @param array|null $data
     * @return \YukataRm\Interface\Entity\ArrayEntityInterface
     */
    public function array(array|null $data = null): ArrayEntityInterface
    {
        return new ArrayEntity($data);
    }

    /*----------------------------------------*
     * Array - Data
     *----------------------------------------*/

    /**
     * get keys
     *
     * @param array $data
     * @return array
     */
    public function keys(array $data): array
    {
        return $this->array($data)->keys();
    }

    /**
     * get first key
     *
     * @param array $data
     * @return int|string|null
     */
    public function firstKey(array $data): int|string|null
    {
        return $this->array($data)->firstKey();
    }

    /**
     * get last key
     *
     * @param array $data
     * @return int|string|null
     */
    public function lastKey(array $data): int|string|null
    {
        return $this->array($data)->lastKey();
    }

    /**
     * get values
     *
     * @param array $data
     * @return array
     */
    public function values(array $data): array
    {
        return $this->array($data)->values();
    }

    /**
     * get first value
     *
     * @param array $data
     * @return mixed
     */
    public function first(array $data): mixed
    {
        return $this->array($data)->first();
    }

    /**
     * get last value
     *
     * @param array $data
     * @return mixed
     */
    public function last(array $data): mixed
    {
        return $this->array($data)->last();
    }

    /*----------------------------------------*
     * Array - Countable
     *----------------------------------------*/

    /**
     * count
     *
     * @param array $data
     * @return int
     */
    public function count(array $data): int
    {
        return $this->array($data)->count();
    }

    /*----------------------------------------*
     * Array - Sort
     *----------------------------------------*/

    /**
     * sort data
     *
     * @param array $data
     * @param callable $callback
     * @return array
     */
    public function sort(array $data, callable $callback): array
    {
        return $this->array($data)->sort($callback)->data();
    }

    /**
     * sort data by key
     *
     * @param array $data
     * @param callable $callback
     * @return array
     */
    public function sortKey(array $data, callable $callback): array
    {
        return $this->array($data)->sortKey($callback)->data();
    }

    /*----------------------------------------*
     * Array - Filter
     *----------------------------------------*/

    /**
     * filter data
     *
     * @param array $data
     * @param callable $callback
     * @return array
     */
    public function filter(array $data, callable $callback): array
    {
        return $this->array($data)->filter($callback)->data();
    }

    /**
     * filter data by key
     *
     * @param array $data
     * @param callable $callback
     * @return array
     */
    public function filterKey(array $data, callable $callback): array
    {
        return $this->array($data)->filterKey($callback)->data();
    }

    /**
     * filter data by value
     *
     * @param array $data
     * @param callable $callback
     * @return array
     */
    public function filterValue(array $data, callable $callback): array
    {
        return $this->array($data)->filterValue($callback)->data();
    }

    /*----------------------------------------*
     * Array - Shuffle
     *----------------------------------------*/

    /**
     * shuffle data
     *
     * @param array $data
     * @return array
     */
    public function shuffle(array $data): array
    {
        return $this->array($data)->shuffle()->data();
    }

    /**
     * shuffle data keep keys association
     *
     * @param array $data
     * @return array
     */
    public function shuffleAssoc(array $data): array
    {
        return $this->array($data)->shuffleAssoc()->data();
    }

    /*----------------------------------------*
     * Array - Merge
     *----------------------------------------*/

    /**
     * merge data
     *
     * @param array $data
     * @param array $merged
     * @return array
     */
    public function merge(array $data, array ...$merged): array
    {
        return $this->array($data)->merge(...$merged)->data();
    }

    /**
     * merge data recursive
     *
     * @param array $data
     * @param array $merged
     * @return array
     */
    public function mergeRecursive(array $data, array ...$merged): array
    {
        return $this->array($data)->mergeRecursive(...$merged)->data();
    }

    /**
     * merge data unique
     *
     * @param array $data
     * @param array $merged
     * @return array
     */
    public function mergeUnique(array $data, array ...$merged): array
    {
        return $this->array($data)->mergeUnique(...$merged)->data();
    }

    /**
     * merge data unique recursive
     *
     * @param array $data
     * @param array $merged
     * @return array
     */
    public function mergeUniqueRecursive(array $data, array ...$merged): array
    {
        return $this->array($data)->mergeUniqueRecursive(...$merged)->data();
    }

    /*----------------------------------------*
     * Array - Diff
     *----------------------------------------*/

    /**
     * diff data
     *
     * @param array $data
     * @param array $diff
     * @return array
     */
    public function diff(array $data, array $diff): array
    {
        return $this->array($data)->diff($diff)->data();
    }

    /**
     * diff data recursive
     *
     * @param array $data
     * @param array $diff
     * @return array
     */
    public function diffRecursive(array $data, array $diff): array
    {
        return $this->array($data)->diffRecursive($diff)->data();
    }

    /*----------------------------------------*
     * Array - Remove
     *----------------------------------------*/

    /**
     * remove data
     *
     * @param array $data
     * @param string|array<string> $target
     * @return array
     */
    public function remove(array $data, string|array $target): array
    {
        return $this->array($data)->remove($target)->data();
    }

    /**
     * remove data recursive
     *
     * @param array $data
     * @param string|array<string> $target
     * @return array
     */
    public function removeRecursive(array $data, string|array $target): array
    {
        return $this->array($data)->removeRecursive($target)->data();
    }

    /**
     * remove empty value
     *
     * @param array $data
     * @return array
     */
    public function removeEmpty(array $data): array
    {
        return $this->array($data)->removeEmpty()->data();
    }

    /**
     * remove empty value recursive
     *
     * @param array $data
     * @return array
     */
    public function removeEmptyRecursive(array $data): array
    {
        return $this->array($data)->removeEmptyRecursive()->data();
    }

    /*----------------------------------------*
     * Array - Masking
     *----------------------------------------*/

    /**
     * masking data
     *
     * @param array $data
     * @param string|array<string> $target
     * @param string $replace
     * @return array
     */
    public function masking(array $data, string|array $target, string $replace = "*******"): array
    {
        return $this->array($data)->masking($target, $replace)->data();
    }

    /**
     * masking data recursive
     *
     * @param array $data
     * @param string|array<string> $target
     * @param string $replace
     * @return array
     */
    public function maskingRecursive(array $data, string|array $target, string $replace = "*******"): array
    {
        return $this->array($data)->maskingRecursive($target, $replace)->data();
    }

    /*----------------------------------------*
     * Object
     *----------------------------------------*/

    /**
     * make ObjectEntity
     *
     * @param object|null $data
     * @return \YukataRm\Interface\Entity\ObjectEntityInterface
     */
    public function object(object|null $data = null): ObjectEntityInterface
    {
        return new ObjectEntity($data);
    }

    /*----------------------------------------*
     * Object - Data
     *----------------------------------------*/

    /**
     * get all properties
     *
     * @param object $data
     * @return array<string, mixed>
     */
    public function all(object $data): array
    {
        return $this->object($data)->all();
    }

    /**
     * object to array
     *
     * @param object $data
     * @return array<string, mixed>
     */
    public function toArray(object $data): array
    {
        return $this->object($data)->toArray();
    }

    /**
     * get only properties
     *
     * @param object $data
     * @param string|array<string> ...$keys
     * @return array<string, mixed>
     */
    public function only(object $data, string|array ...$keys): array
    {
        return $this->object($data)->only(...$keys);
    }

    /**
     * get except properties
     *
     * @param object $data
     * @param string|array<string> ...$keys
     * @return array<string, mixed>
     */
    public function except(object $data, string|array ...$keys): array
    {
        return $this->object($data)->except(...$keys);
    }
}
