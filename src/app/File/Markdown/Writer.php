<?php

namespace YukataRm\File\Markdown;

use YukataRm\Interface\File\Markdown\WriterInterface;
use YukataRm\File\Base\Writer as BaseWriter;

/**
 * Markdown File Writer
 *
 * @package YukataRm\File\Markdown
 */
class Writer extends BaseWriter implements WriterInterface
{
    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * content to write
     *
     * @var string
     */
    protected string $content = "";

    /**
     * get content to write
     *
     * @return string
     */
    public function content(): string
    {
        return $this->content;
    }

    /**
     * set content to write
     *
     * @param mixed $content
     * @return static
     */
    public function setContent(string $content, bool $addNewLine = true): static
    {
        $this->content = $content;

        return $addNewLine ? $this->addNewLine() : $this;
    }

    /**
     * add content to write
     *
     * @param string $content
     * @param bool $addNewLine
     * @return static
     */
    public function addContent(string $content, bool $addNewLine = true): static
    {
        if (empty($this->content)) return $this->setContent($content, $addNewLine);

        $this->content .= $content;

        return $addNewLine ? $this->addNewLine() : $this;
    }

    /**
     * add new line
     *
     * @return static
     */
    public function addNewLine(): static
    {
        return $this->addContent(PHP_EOL, false);
    }

    /**
     * add indent
     *
     * @param bool $useTab
     * @param int $count
     * @return static
     */
    public function addIndent(bool $useTab = true, int $count = 1): static
    {
        if ($count < 1) return $this;

        $indent = $useTab ? "\t" : " ";
        $indent = str_repeat($indent, $count);

        return $this->addContent($indent, false);
    }

    /*----------------------------------------*
     * Heading
     *----------------------------------------*/

    /**
     * add heading
     *
     * @param string $text
     * @param int $level
     * @return static
     */
    protected function heading(string $text, int $level = 1): static
    {
        return $this->addContent(str_repeat("#", $level) . " {$text}");
    }

    /**
     * add heading 1
     *
     * @param string $text
     * @return static
     */
    public function h1(string $text): static
    {
        return $this->heading($text, 1);
    }

    /**
     * add heading 2
     *
     * @param string $text
     * @return static
     */
    public function h2(string $text): static
    {
        return $this->heading($text, 2);
    }

    /**
     * add heading 3
     *
     * @param string $text
     * @return static
     */
    public function h3(string $text): static
    {
        return $this->heading($text, 3);
    }

    /**
     * add heading 4
     *
     * @param string $text
     * @return static
     */
    public function h4(string $text): static
    {
        return $this->heading($text, 4);
    }

    /**
     * add heading 5
     *
     * @param string $text
     * @return static
     */
    public function h5(string $text): static
    {
        return $this->heading($text, 5);
    }

    /**
     * add heading 6
     *
     * @param string $text
     * @return static
     */
    public function h6(string $text): static
    {
        return $this->heading($text, 6);
    }

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
    public function text(string $text, bool $addNewLine = true): static
    {
        return $this->addContent($text, $addNewLine);
    }

    /**
     * add italic text
     *
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function italic(string $text, bool $addNewLine = true): static
    {
        return $this->text("_{$text}_", $addNewLine);
    }

    /**
     * add bold text
     *
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function bold(string $text, bool $addNewLine = true): static
    {
        return $this->text("**{$text}**", $addNewLine);
    }

    /**
     * add italic bold text
     *
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function italicBold(string $text, bool $addNewLine = true): static
    {
        return $this->text("***{$text}***", $addNewLine);
    }

    /**
     * add strike text
     *
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function strike(string $text, bool $addNewLine = true): static
    {
        return $this->text("~~{$text}~~", $addNewLine);
    }

    /**
     * add subscript text
     *
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function sub(string $text, bool $addNewLine = true): static
    {
        return $this->text("<sub>{$text}</sub>", $addNewLine);
    }

    /**
     * add superscript text
     *
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function sup(string $text, bool $addNewLine = true): static
    {
        return $this->text("<sup>{$text}</sup>", $addNewLine);
    }

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
    public function link(string $url, string $text, bool $addNewLine = true): static
    {
        return $this->addContent("[{$text}]({$url})", $addNewLine);
    }

    /**
     * add image
     *
     * @param string $url
     * @param string $text
     * @param bool $addNewLine
     * @return static
     */
    public function image(string $url, string $text = "", bool $addNewLine = true): static
    {
        return $this->addContent("![{$text}]({$url})", $addNewLine);
    }

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
    public function listItem(string $text, int $indent = 0): static
    {
        return $this->addIndent($indent)->addContent("- {$text}");
    }

    /**
     * add numbered list item
     *
     * @param string $text
     * @param int $number
     * @param int $indent
     * @return static
     */
    public function numberedListItem(string $text, int $number = 1, int $indent = 0): static
    {
        return $this->addIndent($indent)->addContent("{$number}. {$text}");
    }

    /**
     * add checklist item
     *
     * @param string $text
     * @param bool $isChecked
     * @param int $indent
     * @return static
     */
    public function checklistItem(string $text, bool $isChecked = false, int $indent = 0): static
    {
        $checkBoxInner = $isChecked ? "x" : " ";

        return $this->addIndent($indent)->addContent("[{$checkBoxInner}] {$text}");
    }

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
    public function quote(string $quote, int $level = 1): static
    {
        return $this->addContent(str_repeat("> ", $level) . $quote);
    }

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
    public function code(string $code, bool $addNewLine = true): static
    {
        return $this->addContent("`{$code}`", $addNewLine);
    }

    /**
     * add code block
     *
     * @param \Closure $closure
     * @param string $language
     * @return static
     */
    public function codeBlock(\Closure $closure, string $language = ""): static
    {
        $this->addContent("```{$language}");

        $closure($this);

        return $this->addContent("```");
    }

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
    public function footnote(int $number, string $text): static
    {
        return $this->addContent("[^{$number}]: {$text}");
    }

    /**
     * add footnote link
     *
     * @param int $number
     * @param bool $addNewLine
     * @return static
     */
    public function footnoteLink(int $number, bool $addNewLine = true): static
    {
        return $this->addContent("[^{$number}]", $addNewLine);
    }

    /*----------------------------------------*
     * Alert
     *----------------------------------------*/

    /**
     * add alert
     *
     * @param string $type
     * @param string $text
     * @return static
     */
    protected function alert(string $type, string $text): static
    {
        $this->quote("[!{$type}]");

        return $this->quote($text);
    }

    /**
     * add note alert
     *
     * @param string $text
     * @return static
     */
    public function alertNote(string $text): static
    {
        return $this->alert("NOTE", $text);
    }

    /**
     * add tip alert
     *
     * @param string $text
     * @return static
     */
    public function alertTip(string $text): static
    {
        return $this->alert("TIP", $text);
    }

    /**
     * add important alert
     *
     * @param string $text
     * @return static
     */
    public function alertImportant(string $text): static
    {
        return $this->alert("IMPORTANT", $text);
    }

    /**
     * add warning alert
     *
     * @param string $text
     * @return static
     */
    public function alertWarning(string $text): static
    {
        return $this->alert("WARNING", $text);
    }

    /**
     * add caution alert
     *
     * @param string $text
     * @return static
     */
    public function alertCaution(string $text): static
    {
        return $this->alert("CAUTION", $text);
    }
}
