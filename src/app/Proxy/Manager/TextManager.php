<?php

namespace YukataRm\Proxy\Manager;

use YukataRm\Interface\Text\ConverterInterface;
use YukataRm\Interface\Text\CheckerInterface;
use YukataRm\Interface\Text\RemoverInterface;
use YukataRm\Interface\Text\HtmlInterface;

use YukataRm\Text\Converter;
use YukataRm\Text\Checker;
use YukataRm\Text\Remover;
use YukataRm\Text\Html;

/**
 * Text Proxy Manager
 *
 * @package YukataRm\Proxy\Manager
 */
class TextManager
{
    /*----------------------------------------*
     * Converter
     *----------------------------------------*/

    /**
     * make Converter instance
     *
     * @return \YukataRm\Interface\Text\ConverterInterface
     */
    public function converter(): ConverterInterface
    {
        return new Converter();
    }

    /**
     * convert to pascal case
     *
     * @param string $text
     * @return string
     */
    public function toPascal(string $text): string
    {
        return $this->converter()->toPascal($text);
    }

    /**
     * convert to camel case
     *
     * @param string $text
     * @return string
     */
    public function toCamel(string $text): string
    {
        return $this->converter()->toCamel($text);
    }

    /**
     * convert to snake case
     *
     * @param string $text
     * @return string
     */
    public function toSnake(string $text): string
    {
        return $this->converter()->toSnake($text);
    }

    /**
     * convert to kebab case
     *
     * @param string $text
     * @return string
     */
    public function toKebab(string $text): string
    {
        return $this->converter()->toKebab($text);
    }

    /**
     * convert to upper case
     *
     * @param string $text
     * @return string
     */
    public function toUpper(string $text): string
    {
        return $this->converter()->toUpper($text);
    }

    /**
     * convert to lower case
     *
     * @param string $text
     * @return string
     */
    public function toLower(string $text): string
    {
        return $this->converter()->toLower($text);
    }

    /**
     * convert to upper snake case
     *
     * @param string $text
     * @return string
     */
    public function toUpperSnake(string $text): string
    {
        return $this->converter()->toUpperSnake($text);
    }

    /*----------------------------------------*
     * Checker
     *----------------------------------------*/

    /**
     * make Checker instance
     *
     * @return \YukataRm\Interface\Text\CheckerInterface
     */
    public function checker(): CheckerInterface
    {
        return new Checker();
    }

    /**
     * whether string configured only
     *
     * @param string $pattern
     * @param string $text
     * @return bool
     */
    public function is(string $pattern, string $text): bool
    {
        return $this->checker()->is($pattern, $text);
    }

    /**
     * whether string contains
     *
     * @param string $pattern
     * @param string $text
     * @return bool
     */
    public function has(string $pattern, string $text): bool
    {
        return $this->checker()->has($pattern, $text);
    }

    /**
     * whether string configured only hiragana
     *
     * @param string $text
     * @return bool
     */
    public function isHiragana(string $text): bool
    {
        return $this->checker()->isHiragana($text);
    }

    /**
     * whether string contains hiragana
     *
     * @param string $text
     * @return bool
     */
    public function hasHiragana(string $text): bool
    {
        return $this->checker()->hasHiragana($text);
    }

    /**
     * whether string configured only katakana
     *
     * @param string $text
     * @return bool
     */
    public function isKatakana(string $text): bool
    {
        return $this->checker()->isKatakana($text);
    }

    /**
     * whether string contains katakana
     *
     * @param string $text
     * @return bool
     */
    public function hasKatakana(string $text): bool
    {
        return $this->checker()->hasKatakana($text);
    }

    /**
     * whether string configured only kanji
     *
     * @param string $text
     * @return bool
     */
    public function isKanji(string $text): bool
    {
        return $this->checker()->isKanji($text);
    }

    /**
     * whether string contains kanji
     *
     * @param string $text
     * @return bool
     */
    public function hasKanji(string $text): bool
    {
        return $this->checker()->hasKanji($text);
    }

    /**
     * whether string configured only alphabet
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabet(string $text): bool
    {
        return $this->checker()->isAlphabet($text);
    }

    /**
     * whether string contains alphabet
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabet(string $text): bool
    {
        return $this->checker()->hasAlphabet($text);
    }

    /**
     * whether string configured only alphabet lower case
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetLower(string $text): bool
    {
        return $this->checker()->isAlphabetLower($text);
    }

    /**
     * whether string contains alphabet lower case
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetLower(string $text): bool
    {
        return $this->checker()->hasAlphabetLower($text);
    }

    /**
     * whether string configured only alphabet upper case
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetUpper(string $text): bool
    {
        return $this->checker()->isAlphabetUpper($text);
    }

    /**
     * whether string contains alphabet upper case
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetUpper(string $text): bool
    {
        return $this->checker()->hasAlphabetUpper($text);
    }

    /**
     * whether string configured only alphabet full width
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetFullWidth(string $text): bool
    {
        return $this->checker()->isAlphabetFullWidth($text);
    }

    /**
     * whether string contains alphabet full width
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetFullWidth(string $text): bool
    {
        return $this->checker()->hasAlphabetFullWidth($text);
    }

    /**
     * whether string configured only alphabet full width lower case
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetFullWidthLower(string $text): bool
    {
        return $this->checker()->isAlphabetFullWidthLower($text);
    }

    /**
     * whether string contains alphabet full width lower case
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetFullWidthLower(string $text): bool
    {
        return $this->checker()->hasAlphabetFullWidthLower($text);
    }

    /**
     * whether string configured only alphabet full width upper case
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetFullWidthUpper(string $text): bool
    {
        return $this->checker()->isAlphabetFullWidthUpper($text);
    }

    /**
     * whether string contains alphabet full width upper case
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetFullWidthUpper(string $text): bool
    {
        return $this->checker()->hasAlphabetFullWidthUpper($text);
    }

    /**
     * whether string configured only number
     *
     * @param string $text
     * @return bool
     */
    public function isNumber(string $text): bool
    {
        return $this->checker()->isNumber($text);
    }

    /**
     * whether string contains number
     *
     * @param string $text
     * @return bool
     */
    public function hasNumber(string $text): bool
    {
        return $this->checker()->hasNumber($text);
    }

    /**
     * whether string configured only number full width
     *
     * @param string $text
     * @return bool
     */
    public function isNumberFullWidth(string $text): bool
    {
        return $this->checker()->isNumberFullWidth($text);
    }

    /**
     * whether string contains number full width
     *
     * @param string $text
     * @return bool
     */
    public function hasNumberFullWidth(string $text): bool
    {
        return $this->checker()->hasNumberFullWidth($text);
    }

    /*----------------------------------------*
     * Remover
     *----------------------------------------*/

    /**
     * make Remover instance
     *
     * @return \YukataRm\Interface\Text\RemoverInterface
     */
    public function remover(): RemoverInterface
    {
        return new Remover();
    }

    /**
     * remove
     *
     * @param string|array $search
     * @param string $text
     * @return string
     */
    public function remove($search, string $text): string
    {
        return $this->remover()->remove($search, $text);
    }

    /**
     * remove space
     *
     * @param string $text
     * @return string
     */
    public function removeSpace(string $text): string
    {
        return $this->remover()->removeSpace($text);
    }

    /**
     * remove half width space
     *
     * @param string $text
     * @return string
     */
    public function removeHalfWidthSpace(string $text): string
    {
        return $this->remover()->removeHalfWidthSpace($text);
    }

    /**
     * remove full width space
     *
     * @param string $text
     * @return string
     */
    public function removeFullWidthSpace(string $text): string
    {
        return $this->remover()->removeFullWidthSpace($text);
    }

    /**
     * remove newline
     *
     * @param string $text
     * @return string
     */
    public function removeNewline(string $text): string
    {
        return $this->remover()->removeNewline($text);
    }

    /**
     * remove tab
     *
     * @param string $text
     * @return string
     */
    public function removeTab(string $text): string
    {
        return $this->remover()->removeTab($text);
    }

    /**
     * remove return
     *
     * @param string $text
     * @return string
     */
    public function removeReturn(string $text): string
    {
        return $this->remover()->removeReturn($text);
    }

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
        return $this->remover()->removeLength($text, $start, $length);
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
        return $this->remover()->removeFromStart($text, $length);
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
        return $this->remover()->removeFromEnd($text, $length);
    }

    /*----------------------------------------*
     * Html
     *----------------------------------------*/

    /**
     * make Html instance
     *
     * @return \YukataRm\Interface\Text\HtmlInterface
     */
    public function html(): HtmlInterface
    {
        return new Html();
    }

    /**
     * new line to br tag
     *
     * @param string $text
     * @return string
     */
    public function nl2Br(string $text): string
    {
        return $this->html()->nl2Br($text);
    }

    /**
     * br tag to new line
     *
     * @param string $text
     * @return string
     */
    public function br2Nl(string $text): string
    {
        return $this->html()->br2Nl($text);
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
        return $this->html()->escape($text, $charset, $doubleEncode);
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
        return $this->html()->enl2br($text, $charset, $doubleEncode);
    }
}
