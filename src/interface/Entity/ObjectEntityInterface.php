<?php

namespace YukataRm\Interface\Entity;

use YukataRm\Interface\Entity\EntityInterface;

/**
 * Object Entity Interface
 *
 * @package YukataRm\Interface\Entity
 */
interface ObjectEntityInterface extends EntityInterface
{
    /*----------------------------------------*
     * Data
     *----------------------------------------*/

    /**
     * get all properties
     *
     * @return array<string, mixed>
     */
    public function all(): array;

    /**
     * to array
     *
     * @return array<string, mixed>
     */
    public function toArray(): array;

    /**
     * get only properties with keys
     *
     * @param string|array<string> ...$keys
     * @return array<string, mixed>
     */
    public function only(string|array ...$keys): array;

    /**
     * get except properties with keys
     *
     * @param string|array<string> ...$keys
     * @return array<string, mixed>
     */
    public function except(string|array ...$keys): array;
}
