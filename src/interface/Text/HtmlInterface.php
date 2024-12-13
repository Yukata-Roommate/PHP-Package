<?php

namespace YukataRm\Interface\Text;

/**
 * Html Interface
 *
 * @package YukataRm\Interface\Text
 */
interface HtmlInterface
{
    /**
     * new line to br tag
     *
     * @param string $text
     * @return string
     */
    public function nl2Br(string $text): string;

    /**
     * br tag to new line
     *
     * @param string $text
     * @return string
     */
    public function br2Nl(string $text): string;

    /**
     * escape html special characters
     *
     * @param string $text
     * @param string $charset
     * @param bool $doubleEncode
     * @return string
     */
    public function escape(string $text, string $charset = "UTF-8", bool $doubleEncode = true): string;

    /**
     * escape html special characters and convert newline code to br tag
     *
     * @param string $text
     * @param string $charset
     * @param bool $doubleEncode
     * @return string
     */
    public function enl2br(string $text, string $charset = "UTF-8", bool $doubleEncode = true): string;
}
