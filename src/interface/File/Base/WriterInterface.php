<?php

namespace YukataRm\Interface\File\Base;

use YukataRm\Interface\File\Base\OperatorInterface;

/**
 * Base File Writer Interface
 *
 * @package YukataRm\Interface\File\Base
 */
interface WriterInterface extends OperatorInterface
{
    /*----------------------------------------*
     * Write
     *----------------------------------------*/

    /**
     * write file
     *
     * @param int|null $mode
     * @param string|null $user
     * @param string|null $group
     * @return bool
     */
    public function write(int|null $mode = null, string|null $user = null, string|null $group = null): bool;

    /**
     * write file as is
     *
     * @param mixed $data
     * @param int|null $mode
     * @param string|null $user
     * @param string|null $group
     * @return bool
     */
    public function writeAsIs(mixed $data, int|null $mode = null, string|null $user = null, string|null $group = null): bool;

    /*----------------------------------------*
     * Flag
     *----------------------------------------*/

    /**
     * whether to use FILE_APPEND flag
     *
     * @return bool
     */
    public function isUseFileAppend(): bool;

    /**
     * use FILE_APPEND flag
     *
     * @return static
     */
    public function useFileAppend(): static;

    /**
     * not use FILE_APPEND flag
     *
     * @return static
     */
    public function notUseFileAppend(): static;

    /**
     * whether to use LOCK_EX flag
     *
     * @return bool
     */
    public function isUseLockEx(): bool;

    /**
     * use LOCK_EX flag
     *
     * @return static
     */
    public function useLockEx(): static;

    /**
     * not use LOCK_EX flag
     *
     * @return static
     */
    public function notUseLockEx(): static;
}
