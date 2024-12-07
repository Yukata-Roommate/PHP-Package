<?php

namespace YukataRm\Interface\Text;

/**
 * Text Converter Interface
 *
 * @package YukataRm\Interface\Text
 */
interface ConverterInterface
{
    /**
     * convert to pascal case
     *
     * @param string $text
     * @return string
     */
    public function toPascal(string $text): string;

    /**
     * convert to camel case
     *
     * @param string $text
     * @return string
     */
    public function toCamel(string $text): string;

    /**
     * convert to snake case
     *
     * @param string $text
     * @return string
     */
    public function toSnake(string $text): string;

    /**
     * convert to kebab case
     *
     * @param string $text
     * @return string
     */
    public function toKebab(string $text): string;

    /**
     * convert to upper case
     *
     * @param string $text
     * @return string
     */
    public function toUpper(string $text): string;

    /**
     * convert to lower case
     *
     * @param string $text
     * @return string
     */
    public function toLower(string $text): string;

    /**
     * convert to upper snake case
     *
     * @param string $text
     * @return string
     */
    public function toUpperSnake(string $text): string;
}
