<?php

namespace YukataRm\Proxy;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\EntityManager;

/**
 * Entity Proxy
 *
 * @package YukataRm\Proxy
 *
 * @method static \YukataRm\Interface\Entity\ArrayEntityInterface array(array|null $data = null)
 * @method static array keys(array $data)
 * @method static int|string|null firstKey(array $data)
 * @method static int|string|null lastKey(array $data)
 * @method static array values(array $data)
 * @method static array first(array $data)
 * @method static array last(array $data)
 * @method static int count(array $data)
 * @method static array sort(array $data, callable $callback)
 * @method static array sortKey(array $data, callable $callback)
 * @method static array filter(array $data, callable $callback)
 * @method static array filterKey(array $data, callable $callback)
 * @method static array filterValue(array $data, callable $callback)
 * @method static array shuffle(array $data)
 * @method static array shuffleAssoc(array $data)
 * @method static array merge(array $data, array ...$merged)
 * @method static array mergeRecursive(array $data, array ...$merged)
 * @method static array mergeUnique(array $data, array ...$merged)
 * @method static array mergeUniqueRecursive(array $data, array ...$merged)
 * @method static array diff(array $data, array $diff)
 * @method static array diffRecursive(array $data, array $diff)
 * @method static array remove(array $data, string|array<string> $target)
 * @method static array removeRecursive(array $data, string|array<string> $target)
 * @method static array removeEmpty(array $data)
 * @method static array removeEmptyRecursive(array $data)
 * @method static array masking(array $data, string|array<string> $target, string $replace = "*******")
 * @method static array maskingRecursive(array $data, string|array<string> $target, string $replace = "*******")
 *
 * @method static \YukataRm\Interface\Entity\ObjectEntityInterface object(object|null $data = null)
 * @method static array all(object $data)
 * @method static array toArray(object $data)
 * @method static array only(object $data, string|array<string> ...$keys)
 * @method static array except(object $data, string|array<string> ...$keys)
 *
 * @see \YukataRm\Proxy\Manager\EntityManager
 */
class Entity extends MethodProxy
{
    /**
     * called class name
     *
     * @var string
     */
    protected string $className = EntityManager::class;
}
