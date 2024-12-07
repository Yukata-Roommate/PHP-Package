<?php

namespace YukataRm\Interface\File\Markdown;

use YukataRm\Interface\File\Base\WriterInterface as BaseWriterInterface;

/**
 * Markdown File Writer Interface
 *
 * @package YukataRm\Interface\File\Markdown
 */
interface WriterInterface extends BaseWriterInterface
{
    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * get content to write
     *
     * @return string
     */
    public function content(): string;

    /**
     * set content to write
     *
     * @param string $content
     * @param bool $addNewLine
     * @return static
     */
    public function setContent(string $content, bool $addNewLine = true): static;

    /**
     * add content to write
     *
     * @param string $content
     * @param bool $addNewLine
     * @return static
     */
    public function addContent(string $content, bool $addNewLine = true): static;

    /**
     * add new line
     *
     * @return static
     */
    public function addNewLine(): static;

    /**
     * add indent
     *
     * @param bool $useTab
     * @param int $count
     * @return static
     */
    public function addIndent(bool $useTab = true, int $count = 1): static;

    /*----------------------------------------*
     * Heading
     *----------------------------------------*/

    /**
     * add heading 1
     *
     * @param string $text
     * @return static
     */
    public function h1(string $text): static;

    /**
     * add heading 2
     *
     * @param string $text
     * @return static
     */
    public function h2(string $text): static;

    /**
     * add heading 3
     *
     * @param string $text
     * @return static
     */
    public function h3(string $text): static;

    /**
     * add heading 4
     *
     * @param string $text
     * @return static
     */
    public function h4(string $text): static;

    /**
     * add heading 5
     *
     * @param string $text
     * @return static
     */
    public function h5(string $text): static;

    /**
     * add heading 6
     *
     * @param string $text
     * @return static
     */
    public function h6(string $text): static;

    /*----------------------------------------*
     * Text
     *----------------------------------------*/

    /**
     * add text
     *
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function text(string $text, bool $addNewLine = true): static;

    /**
     * add italic text
     *
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function italic(string $text, bool $addNewLine = true): static;

    /**
     * add bold text
     *
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function bold(string $text, bool $addNewLine = true): static;

    /**
     * add italic bold text
     *
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function italicBold(string $text, bool $addNewLine = true): static;

    /**
     * add strike text
     *
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function strike(string $text, bool $addNewLine = true): static;

    /**
     * add subscript text
     *
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function sub(string $text, bool $addNewLine = true): static;

    /**
     * add superscript text
     *
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function sup(string $text, bool $addNewLine = true): static;

    /*----------------------------------------*
     * Link
     *----------------------------------------*/

    /**
     * add link
     *
     * @param string $url
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function link(string $url, string $text, bool $addNewLine = true): static;

    /**
     * add image
     *
     * @param string $url
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function image(string $url, string $text = "", bool $addNewLine = true): static;

    /*----------------------------------------*
     * List
     *----------------------------------------*/

    /**
     * add list item
     *
     * @param string $text
     * @param int $indent
     * @return static
     */
    public function listItem(string $text, int $indent = 0): static;

    /**
     * add numbered list item
     *
     * @param string $text
     * @param int $number
     * @param int $indent
     * @return static
     */
    public function numberedListItem(string $text, int $number = 1, int $indent = 0): static;

    /**
     * add checklist item
     *
     * @param string $text
     * @param bool $isChecked
     * @param int $indent
     * @return static
     */
    public function checklistItem(string $text, bool $isChecked = false, int $indent = 0): static;

    /*----------------------------------------*
     * Quote
     *----------------------------------------*/

    /**
     * add quote
     *
     * @param string $quote
     * @param int $level
     * @return static
     */
    public function quote(string $quote, int $level = 1): static;

    /*----------------------------------------*
     * Code
     *----------------------------------------*/

    /**
     * add code
     *
     * @param string $code
     * @param bool $addNewLine
     * @return static
     */
    public function code(string $code, bool $addNewLine = true): static;

    /**
     * add code block
     *
     * @param \Closure $closure
     * @param string $language
     * @return static
     */
    public function codeBlock(\Closure $closure, string $language = ""): static;

    /*----------------------------------------*
     * Footnote
     *----------------------------------------*/

    /**
     * add footnote
     *
     * @param int $number
     * @param string $text
     * @return static
     */
    public function footnote(int $number, string $text): static;

    /**
     * add footnote link
     *
     * @param int $number
     * @param bool $addNewLine
     * @return static
     */
    public function footnoteLink(int $number, bool $addNewLine = true): static;

    /*----------------------------------------*
     * Alert
     *----------------------------------------*/

    /**
     * add note alert
     *
     * @param string $text
     * @return static
     */
    public function alertNote(string $text): static;

    /**
     * add tip alert
     *
     * @param string $text
     * @return static
     */
    public function alertTip(string $text): static;

    /**
     * add important alert
     *
     * @param string $text
     * @return static
     */
    public function alertImportant(string $text): static;

    /**
     * add warning alert
     *
     * @param string $text
     * @return static
     */
    public function alertWarning(string $text): static;

    /**
     * add caution alert
     *
     * @param string $text
     * @return static
     */
    public function alertCaution(string $text): static;
}
