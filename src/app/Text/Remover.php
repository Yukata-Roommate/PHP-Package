<?php

namespace YukataRm\Text;

use YukataRm\Interface\Text\RemoverInterface;

/**
 * Text Remover
 *
 * @package YukataRm\Text
 */
class Remover implements RemoverInterface
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
    public function remove($search, string $text): string
    {
        return str_replace($search, "", $text);
    }

    /**
     * remove space
     *
     * @param string $text
     * @return string
     */
    public function removeSpace(string $text): string
    {
        return $this->remove([" ", "　"], $text);
    }

    /**
     * remove half width space
     *
     * @param string $text
     * @return string
     */
    public function removeHalfWidthSpace(string $text): string
    {
        return $this->remove(" ", $text);
    }

    /**
     * remove full width space
     *
     * @param string $text
     * @return string
     */
    public function removeFullWidthSpace(string $text): string
    {
        return $this->remove("　", $text);
    }

    /**
     * remove newline
     *
     * @param string $text
     * @return string
     */
    public function removeNewline(string $text): string
    {
        return $this->remove(array_merge(
            ["\r\n", "\n\r", "\r", "\n"],
            [PHP_EOL]
        ), $text);
    }

    /**
     * remove tab
     *
     * @param string $text
     * @return string
     */
    public function removeTab(string $text): string
    {
        return $this->remove("\t", $text);
    }

    /**
     * remove return
     *
     * @param string $text
     * @return string
     */
    public function removeReturn(string $text): string
    {
        return $this->remove("\r", $text);
    }

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
    public function removeLength(string $text, int $start, int $length): string
    {
        return mb_substr($text, $start, $length);
    }

    /**
     * remove from start
     *
     * @param string $text
     * @param int $length
     * @return string
     */
    public function removeFromStart(string $text, int $length): string
    {
        return $this->removeLength($text, 0, $length);
    }

    /**
     * remove from end
     *
     * @param string $text
     * @param int $length
     * @return string
     */
    public function removeFromEnd(string $text, int $length): string
    {
        return $this->removeLength($text, 0, (-1 * $length));
    }
}
