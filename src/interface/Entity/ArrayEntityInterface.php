<?php

namespace YukataRm\Interface\Entity;

use YukataRm\Interface\Entity\EntityInterface;

use IteratorAggregate;
use ArrayAccess;
use Countable;

/**
 * Array Entity Interface
 *
 * @package YukataRm\Interface\Entity
 */
interface ArrayEntityInterface extends EntityInterface, IteratorAggregate, ArrayAccess, Countable
{
    /*----------------------------------------*
     * Data
     *----------------------------------------*/

    /**
     * get data keys
     *
     * @return array<int|string>
     */
    public function keys(): array;

    /**
     * get first key
     *
     * @return int|string|null
     */
    public function firstKey(): int|string|null;

    /**
     * get last key
     *
     * @return int|string|null
     */
    public function lastKey(): int|string|null;

    /**
     * get values
     *
     * @return array
     */
    public function values(): array;

    /**
     * get first value
     *
     * @return mixed
     */
    public function first(): mixed;

    /**
     * get last value
     *
     * @return mixed
     */
    public function last(): mixed;

    /*----------------------------------------*
     * Sort
     *----------------------------------------*/

    /**
     * sort data
     *
     * @param callable $callback
     * @return static
     */
    public function sort(callable $callback): static;

    /**
     * sort data by key
     *
     * @param callable $callback
     * @return static
     */
    public function sortKey(callable $callback): static;

    /*----------------------------------------*
     * Filter
     *----------------------------------------*/

    /**
     * filter data
     *
     * @param callable $callback
     * @return static
     */
    public function filter(callable $callback): static;

    /**
     * filter data by key
     *
     * @param callable $callback
     * @return static
     */
    public function filterKey(callable $callback): static;

    /**
     * filter data by value
     *
     * @param callable $callback
     * @return static
     */
    public function filterValue(callable $callback): static;

    /*----------------------------------------*
     * Shuffle
     *----------------------------------------*/

    /**
     * shuffle data
     *
     * @return static
     */
    public function shuffle(): static;

    /**
     * shuffle data keep keys association
     *
     * @return static
     */
    public function shuffleAssoc(): static;

    /*----------------------------------------*
     * Merge
     *----------------------------------------*/

    /**
     * merge data
     *
     * @param array $merged
     * @return static
     */
    public function merge(array ...$merged): static;

    /**
     * merge data recursive
     *
     * @param array $merged
     * @return static
     */
    public function mergeRecursive(array ...$merged): static;

    /**
     * merge data unique
     *
     * @param array $merged
     * @return static
     */
    public function mergeUnique(array ...$merged): static;

    /**
     * merge data unique recursive
     *
     * @param array $merged
     * @return static
     */
    public function mergeUniqueRecursive(array ...$merged): static;

    /*----------------------------------------*
     * Diff
     *----------------------------------------*/

    /**
     * diff data
     *
     * @param array $diff
     * @return static
     */
    public function diff(array $diff): static;

    /**
     * diff data recursive
     *
     * @param array $diff
     * @return static
     */
    public function diffRecursive(array $diff): static;

    /*----------------------------------------*
     * Remove
     *----------------------------------------*/

    /**
     * remove data
     *
     * @param string|array<string> $target
     * @return static
     */
    public function remove(string|array $target): static;

    /**
     * remove data recursive
     *
     * @param string|array<string> $target
     * @return static
     */
    public function removeRecursive(string|array $target): static;

    /**
     * remove empty value
     *
     * @return static
     */
    public function removeEmpty(): static;

    /**
     * remove empty value recursive
     *
     * @return static
     */
    public function removeEmptyRecursive(): static;

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
    public function masking(string|array $target, string $replace = "*******"): static;

    /**
     * masking data recursive
     *
     * @param string|array<string> $target
     * @param string $replace
     * @return static
     */
    public function maskingRecursive(string|array $target, string $replace = "*******"): static;
}
