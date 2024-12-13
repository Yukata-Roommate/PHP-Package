<?php

namespace YukataRm\Trait\File\Csv;

/**
 * CSV File Format trait
 *
 * @package YukataRm\Trait\File\Csv
 */
trait Format
{
    /**
     * separator
     *
     * @var string
     */
    protected string $separator = ",";

    /**
     * enclosure
     *
     * @var string
     */
    protected string $enclosure = "\"";

    /**
     * escape
     *
     * @var string
     */
    protected string $escape = "\\";

    /**
     * get separator
     *
     * @return string
     */
    public function separator(): string
    {
        return $this->separator;
    }

    /**
     * set separator
     *
     * @param string $separator
     * @return static
     */
    public function setSeparator(string $separator): static
    {
        $this->separator = $separator;

        return $this;
    }

    /**
     * get enclosure
     *
     * @return string
     */
    public function enclosure(): string
    {
        return $this->enclosure;
    }

    /**
     * set enclosure
     *
     * @param string $enclosure
     * @return static
     */
    public function setEnclosure(string $enclosure): static
    {
        $this->enclosure = $enclosure;

        return $this;
    }

    /**
     * get escape
     *
     * @return string
     */
    public function escape(): string
    {
        return $this->escape;
    }

    /**
     * set escape
     *
     * @param string $escape
     * @return static
     */
    public function setEscape(string $escape): static
    {
        $this->escape = $escape;

        return $this;
    }
}
