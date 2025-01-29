<?php

namespace YukataRm\Text;

use YukataRm\Interface\Text\CheckerInterface;

/**
 * Text Checker
 *
 * @package YukataRm\Text
 */
class Checker implements CheckerInterface
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * hiragana pattern
     *
     * @var string
     */
    protected string $hiragana = "ぁ-んー";

    /**
     * katakana pattern
     *
     * @var string
     */
    protected string $katakana = "ァ-ヶー";

    /**
     * kanji pattern
     *
     * @var string
     */
    protected string $kanji = "一-龠";

    /**
     * alphabet pattern
     *
     * @var string
     */
    protected string $alphabet = "a-zA-Z";

    /**
     * alphabet lower case pattern
     *
     * @var string
     */
    protected string $alphabetLower = "a-z";

    /**
     * alphabet upper case pattern
     *
     * @var string
     */
    protected string $alphabetUpper = "A-Z";

    /**
     * alphabet full width pattern
     *
     * @var string
     */
    protected string $alphabetFullWidth = "ａ-ｚＡ-Ｚ";

    /**
     * alphabet full width lower case pattern
     *
     * @var string
     */
    protected string $alphabetFullWidthLower = "ａ-ｚ";

    /**
     * alphabet full width upper case pattern
     *
     * @var string
     */
    protected string $alphabetFullWidthUpper = "Ａ-Ｚ";

    /**
     * number pattern
     *
     * @var string
     */
    protected string $number = "0-9";

    /**
     * number full width pattern
     *
     * @var string
     */
    protected string $numberFullWidth = "０-９";

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * whether string configured only
     *
     * @param string $pattern
     * @param string $text
     * @return bool
     */
    public function is(string $pattern, string $text): bool
    {
        return preg_match("/^[{$pattern}]+$/u", $text);
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
        return preg_match("/[{$pattern}]+/u", $text);
    }

    /**
     * whether string configured only hiragana
     *
     * @param string $text
     * @return bool
     */
    public function isHiragana(string $text): bool
    {
        return $this->is($this->hiragana, $text);
    }

    /**
     * whether string contains hiragana
     *
     * @param string $text
     * @return bool
     */
    public function hasHiragana(string $text): bool
    {
        return $this->has($this->hiragana, $text);
    }

    /**
     * whether string configured only katakana
     *
     * @param string $text
     * @return bool
     */
    public function isKatakana(string $text): bool
    {
        return $this->is($this->katakana, $text);
    }

    /**
     * whether string contains katakana
     *
     * @param string $text
     * @return bool
     */
    public function hasKatakana(string $text): bool
    {
        return $this->has($this->katakana, $text);
    }

    /**
     * whether string configured only kanji
     *
     * @param string $text
     * @return bool
     */
    public function isKanji(string $text): bool
    {
        return $this->is($this->kanji, $text);
    }

    /**
     * whether string contains kanji
     *
     * @param string $text
     * @return bool
     */
    public function hasKanji(string $text): bool
    {
        return $this->has($this->kanji, $text);
    }

    /**
     * whether string configured only alphabet
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabet(string $text): bool
    {
        return $this->is($this->alphabet, $text);
    }

    /**
     * whether string contains alphabet
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabet(string $text): bool
    {
        return $this->has($this->alphabet, $text);
    }

    /**
     * whether string configured only alphabet lower case
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetLower(string $text): bool
    {
        return $this->is($this->alphabetLower, $text);
    }

    /**
     * whether string contains alphabet lower case
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetLower(string $text): bool
    {
        return $this->has($this->alphabetLower, $text);
    }

    /**
     * whether string configured only alphabet upper case
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetUpper(string $text): bool
    {
        return $this->is($this->alphabetUpper, $text);
    }

    /**
     * whether string contains alphabet upper case
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetUpper(string $text): bool
    {
        return $this->has($this->alphabetUpper, $text);
    }

    /**
     * whether string configured only alphabet full width
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetFullWidth(string $text): bool
    {
        return $this->is($this->alphabetFullWidth, $text);
    }

    /**
     * whether string contains alphabet full width
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetFullWidth(string $text): bool
    {
        return $this->has($this->alphabetFullWidth, $text);
    }

    /**
     * whether string configured only alphabet full width lower case
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetFullWidthLower(string $text): bool
    {
        return $this->is($this->alphabetFullWidthLower, $text);
    }

    /**
     * whether string contains alphabet full width lower case
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetFullWidthLower(string $text): bool
    {
        return $this->has($this->alphabetFullWidthLower, $text);
    }

    /**
     * whether string configured only alphabet full width upper case
     *
     * @param string $text
     * @return bool
     */
    public function isAlphabetFullWidthUpper(string $text): bool
    {
        return $this->is($this->alphabetFullWidthUpper, $text);
    }

    /**
     * whether string contains alphabet full width upper case
     *
     * @param string $text
     * @return bool
     */
    public function hasAlphabetFullWidthUpper(string $text): bool
    {
        return $this->has($this->alphabetFullWidthUpper, $text);
    }

    /**
     * whether string configured only number
     *
     * @param string $text
     * @return bool
     */
    public function isNumber(string $text): bool
    {
        return $this->is($this->number, $text);
    }

    /**
     * whether string contains number
     *
     * @param string $text
     * @return bool
     */
    public function hasNumber(string $text): bool
    {
        return $this->has($this->number, $text);
    }

    /**
     * whether string configured only number full width
     *
     * @param string $text
     * @return bool
     */
    public function isNumberFullWidth(string $text): bool
    {
        return $this->is($this->numberFullWidth, $text);
    }

    /**
     * whether string contains number full width
     *
     * @param string $text
     * @return bool
     */
    public function hasNumberFullWidth(string $text): bool
    {
        return $this->has($this->numberFullWidth, $text);
    }
}
