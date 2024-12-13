<?php

namespace YukataRm\File\Csv;

use YukataRm\Interface\File\Csv\WriterInterface;
use YukataRm\File\Base\Writer as BaseWriter;

use YukataRm\Trait\File\Csv\Format;

/**
 * CSV File Writer
 *
 * @package YukataRm\File\Csv
 */
class Writer extends BaseWriter implements WriterInterface
{
    use Format;

    /*----------------------------------------*
     * Override
     *----------------------------------------*/

    /**
     * get data to write
     *
     * @return array<array<string>>
     */
    #[\Override]
    protected function getData(): array
    {
        return array_merge([$this->headers()], $this->content());
    }

    /**
     * execute writing file
     *
     * @param array<array<string>> $data
     * @return bool
     */
    #[\Override]
    protected function writeFile(mixed $data): bool
    {
        if (!is_array($data)) throw new \RuntimeException("data must be an array.");

        $stream = fopen("php://temp", "w");

        if ($stream === false) throw new \RuntimeException("failed to create stream.");

        $separator = $this->separator();
        $enclosure = $this->enclosure();
        $escape    = $this->escape();

        foreach ($data as $line) {
            fputcsv(
                $stream,
                $line,
                $separator,
                $enclosure,
                $escape,
            );
        }

        rewind($stream);

        $contents = stream_get_contents($stream);

        fclose($stream);

        return parent::writeFile($contents);
    }

    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * content to write
     *
     * @var array<array<string>>
     */
    protected array $content = [];

    /**
     * get content to write
     *
     * @return array<array<string>>
     */
    public function content(): array
    {
        return $this->content;
    }

    /**
     * set content to write
     *
     * @param array<array<string>> $content
     * @return static
     */
    public function setContent(array $content): static
    {
        $this->content = $content;

        return $this;
    }

    /**
     * add content to write
     *
     * @param array<string> $content
     * @return static
     */
    public function addContent(array $content): static
    {
        $this->content[] = $content;

        return $this;
    }

    /*----------------------------------------*
     * Header
     *----------------------------------------*/

    /**
     * headers
     *
     * @var array<string>
     */
    protected array $headers = [];

    /**
     * get headers
     *
     * @return array<string>
     */
    public function headers(): array
    {
        return $this->headers;
    }

    /**
     * set headers
     *
     * @param array<string> $headers
     * @return static
     */
    public function setHeaders(array $headers): static
    {
        $this->headers = $headers;

        return $this;
    }
}
