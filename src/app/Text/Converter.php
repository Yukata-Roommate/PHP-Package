<?php

namespace YukataRm\Text;

use YukataRm\Interface\Text\ConverterInterface;

/**
 * Text Converter
 *
 * @package YukataRm\Text
 */
class Converter implements ConverterInterface
{
    /**
     * convert to pascal case
     *
     * @param string $text
     * @return string
     */
    public function toPascal(string $text): string
    {
        return str_replace(" ", "", ucwords(str_replace(["-", "_"], " ", $text)));
    }

    /**
     * convert to camel case
     *
     * @param string $text
     * @return string
     */
    public function toCamel(string $text): string
    {
        return lcfirst($this->toPascal($text));
    }

    /**
     * convert to snake case
     *
     * @param string $text
     * @return string
     */
    public function toSnake(string $text): string
    {
        return strtolower(preg_replace("/(?<!^)[A-Z]/", "_$0", $text));
    }

    /**
     * convert to kebab case
     *
     * @param string $text
     * @return string
     */
    public function toKebab(string $text): string
    {
        return str_replace("_", "-", $this->toSnake($text));
    }

    /**
     * convert to upper case
     *
     * @param string $text
     * @return string
     */
    public function toUpper(string $text): string
    {
        return strtoupper($text);
    }

    /**
     * convert to lower case
     *
     * @param string $text
     * @return string
     */
    public function toLower(string $text): string
    {
        return strtolower($text);
    }

    /**
     * convert to upper snake case
     *
     * @param string $text
     * @return string
     */
    public function toUpperSnake(string $text): string
    {
        return $this->toSnake($this->toUpper($text));
    }
}
