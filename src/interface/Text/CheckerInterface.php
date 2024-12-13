<?php

namespace YukataRm\Interface\Text;

/**
 * Text Checker Interface
 *
 * @package YukataRm\Interface\Text
 */
interface CheckerInterface
{
    /**
     * whether string configured only
     *
     * @param string $pattern
     * @param string $text
     * @return bool
     */
    public function is(string $pattern, string $text): bool;

    /**
     * whether string contains
     *
     * @param string $pattern
     * @param string $text
     * @return bool
     */
    public function has(string $pattern, string $text): bool;

    /**
     * whether string configured only hiragana
     *
     * @param string $text
     * @return bool
     */
    public function isHiragana(string $text): bool;

    /**
     * whether string contains hiragana
     *
     * @param string $text
     * @return bool
     */
    public function hasHiragana(string $text): bool;

    /**
     * whether string configured only katakana
     *
     * @param string $text
     * @return bool
     */
    public function isKatakana(string $text): bool;

    /**
     * whether string contains katakana
     *
     * @param string $text
     * @return bool
     */
    public function hasKatakana(string $text): bool;

    /**
     * whether string configured only kanji
     *
     * @param string $text
     * @return bool
     */
    public function isKanji(string $text): bool;

    /**
     * whether string contains kanji
     *
     * @param string $text
     * @return bool
     */
    public function hasKanji(string $text): bool;

    /**
     * whether string configured only alphabet
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabet(string $text): bool;

    /**
     * whether string contains alphabet
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabet(string $text): bool;

    /**
     * whether string configured only alphabet lower case
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetLower(string $text): bool;

    /**
     * whether string contains alphabet lower case
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetLower(string $text): bool;

    /**
     * whether string configured only alphabet upper case
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetUpper(string $text): bool;

    /**
     * whether string contains alphabet upper case
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetUpper(string $text): bool;

    /**
     * whether string configured only alphabet full width
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetFullWidth(string $text): bool;

    /**
     * whether string contains alphabet full width
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetFullWidth(string $text): bool;

    /**
     * whether string configured only alphabet full width lower case
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetFullWidthLower(string $text): bool;

    /**
     * whether string contains alphabet full width lower case
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetFullWidthLower(string $text): bool;

    /**
     * whether string configured only alphabet full width upper case
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetFullWidthUpper(string $text): bool;

    /**
     * whether string contains alphabet full width upper case
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetFullWidthUpper(string $text): bool;

    /**
     * whether string configured only number
     *
     * @param string $text
     * @return bool
     */
    public function isNumber(string $text): bool;

    /**
     * whether string contains number
     *
     * @param string $text
     * @return bool
     */
    public function hasNumber(string $text): bool;

    /**
     * whether string configured only number full width
     *
     * @param string $text
     * @return bool
     */
    public function isNumberFullWidth(string $text): bool;

    /**
     * whether string contains number full width
     *
     * @param string $text
     * @return bool
     */
    public function hasNumberFullWidth(string $text): bool;
}
