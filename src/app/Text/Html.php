<?php

namespace YukataRm\Text;

use YukataRm\Interface\Text\HtmlInterface;

/**
 * Html
 *
 * @package YukataRm\Text
 */
class Html implements HtmlInterface
{
    /**
     * new line to br tag
     *
     * @param string $text
     * @return string
     */
    public function nl2Br(string $text): string
    {
        return str_replace(array_merge(
            ["\r\n", "\n\r", "\r", "\n"],
            [PHP_EOL]
        ), "<br \>", $text);
    }

    /**
     * br tag to new line
     *
     * @param string $text
     * @return string
     */
    public function br2Nl(string $text): string
    {
        return preg_replace("/\<br(\s*)?\/?\>/i", PHP_EOL, $text);
    }

    /**
     * escape html special characters
     *
     * @param string $text
     * @param string $charset
     * @param bool $doubleEncode
     * @return string
     */
    public function escape(string $text, string $charset = "UTF-8", bool $doubleEncode = true): string
    {
        return htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, $charset, $doubleEncode);
    }

    /**
     * escape html special characters and convert newline code to br tag
     *
     * @param string $text
     * @param string $charset
     * @param bool $doubleEncode
     * @return string
     */
    public function enl2br(string $text, string $charset = "UTF-8", bool $doubleEncode = true): string
    {
        return $this->nl2Br($this->escape($text, $charset, $doubleEncode));
    }
}
