<?php

namespace YukataRm\Interface\Text;

/**
 * Remover Interface
 *
 * @package YukataRm\Interface\Text
 */
interface RemoverInterface
{
    /*----------------------------------------*
     * Str Replace
     *----------------------------------------*/

    /**
     * remove
     *
     * @param string|array $search
     * @param string $text
     * @return string
     */
    public function remove($search, string $text): string;

    /**
     * remove space
     *
     * @param string $text
     * @return string
     */
    public function removeSpace(string $text): string;

    /**
     * remove half width space
     *
     * @param string $text
     * @return string
     */
    public function removeHalfWidthSpace(string $text): string;

    /**
     * remove full width space
     *
     * @param string $text
     * @return string
     */
    public function removeFullWidthSpace(string $text): string;

    /**
     * remove newline
     *
     * @param string $text
     * @return string
     */
    public function removeNewline(string $text): string;

    /**
     * remove tab
     *
     * @param string $text
     * @return string
     */
    public function removeTab(string $text): string;

    /**
     * remove return
     *
     * @param string $text
     * @return string
     */
    public function removeReturn(string $text): string;

    /*----------------------------------------*
     * Substr
     *----------------------------------------*/

    /**
     * remove by length
     *
     * @param string $text
     * @param int $start
     * @param int $length
     * @return string
     */
    public function removeLength(string $text, int $start, int $length): string;

    /**
     * remove from start
     *
     * @param string $text
     * @param int $length
     * @return string
     */
    public function removeFromStart(string $text, int $length): string;

    /**
     * remove from end
     *
     * @param string $text
     * @param int $length
     * @return string
     */
    public function removeFromEnd(string $text, int $length): string;
}
