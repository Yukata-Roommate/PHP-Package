<?php

namespace YukataRm\Cli;

use YukataRm\Interface\Cli\CommandInterface;

use YukataRm\Cli\Trait\Sapi;

use YukataRm\Interface\Cli\ApplicationInterface;
use YukataRm\Interface\Cli\ArgvInputInterface;
use YukataRm\Enum\Cli\OutputColorEnum;

/**
 * Base Command
 *
 * @package YukataRm\Cli
 */
abstract class BaseCommand implements CommandInterface
{
    use Sapi;

    /*----------------------------------------*
     * Config
     *----------------------------------------*/

    /**
     * command name
     *
     * @var string
     */
    protected string $commandName;

    /**
     * command description
     *
     * @var string
     */
    protected string $description;

    /**
     * get command name
     *
     * @return string
     */
    public function commandName(): string
    {
        return $this->commandName;
    }

    /**
     * get command description
     *
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }

    /*----------------------------------------*
     * Run
     *----------------------------------------*/

    /**
     * run command
     *
     * @param \YukataRm\Interface\Cli\ApplicationInterface $application
     * @param \YukataRm\Interface\Cli\ArgvInputInterface $input
     * @return void
     */
    public function run(ApplicationInterface $application, ArgvInputInterface $input): void
    {
        $this->setApplication($application);

        $this->setInput($input);

        if (!$this->validate()) return $this->failedValidation();

        $this->execute();
    }

    /**
     * execute command process
     *
     * @return void
     */
    abstract protected function execute(): void;

    /*----------------------------------------*
     * Application
     *----------------------------------------*/

    /**
     * Application
     *
     * @var \YukataRm\Interface\Cli\ApplicationInterface
     */
    protected ApplicationInterface $application;

    /**
     * set Application
     *
     * @param \YukataRm\Interface\Cli\ApplicationInterface $application
     * @return void
     */
    protected function setApplication(ApplicationInterface $application): void
    {
        $this->application = $application;
    }

    /**
     * get Application
     *
     * @return \YukataRm\Interface\Cli\ApplicationInterface
     */
    protected function application(): ApplicationInterface
    {
        return $this->application;
    }

    /*----------------------------------------*
     * Input
     *----------------------------------------*/

    /**
     * ArgvInput
     *
     * @var \YukataRm\Interface\Cli\ArgvInputInterface
     */
    protected ArgvInputInterface $input;

    /**
     * set ArgvInput
     *
     * @param \YukataRm\Interface\Cli\ArgvInputInterface $input
     * @return void
     */
    protected function setInput(ArgvInputInterface $input): void
    {
        $this->input = $input;
    }

    /**
     * validate ArgvInput
     *
     * @return bool
     */
    protected function validate(): bool
    {
        return true;
    }

    /**
     * failed validation for ArgvInput
     *
     * @return void
     */
    protected function failedValidation(): void
    {
        $this->output("Argument validation failed.");
    }

    /**
     * get ArgvInput
     *
     * @return \YukataRm\Interface\Cli\ArgvInputInterface
     */
    protected function input(): ArgvInputInterface
    {
        return $this->input;
    }

    /*----------------------------------------*
     * Output
     *----------------------------------------*/

    /**
     * flush output buffer
     *
     * @return void
     */
    protected function flush(): void
    {
        flush();
    }

    /**
     * output message without new line
     *
     * @param string $message
     * @return void
     */
    protected function outputWithoutNewLine(string $message): void
    {
        echo $message;
        $this->flush();
    }

    /**
     * output message with new line
     *
     * @param string $message
     * @return void
     */
    protected function output(string $message): void
    {
        $this->outputWithoutNewLine($message . $this->newLineString());
    }

    /**
     * output new line
     *
     * @param int $count
     * @return void
     */
    protected function newLine(int $count = 1): void
    {
        $this->outputWithoutNewLine(str_repeat($this->newLineString(), $count));
    }

    /**
     * output carriage return
     *
     * @return void
     */
    protected function carriageReturn(): void
    {
        $this->outputWithoutNewLine("\r");
    }

    /**
     * output message
     * if withNewLine is true, output message with new line
     * else output message without new line
     *
     * @param bool $withNewLine
     * @param string $message
     * @return void
     */
    protected function switchOutput(bool $withNewLine, string $message): void
    {
        $withNewLine ? $this->output($message) : $this->outputWithoutNewLine($message);
    }

    /**
     * get colored output message
     *
     * @param bool $isBackgroundColored
     * @param string $message
     * @param \YukataRm\Enum\Cli\OutputColorEnum $color
     * @return string
     */
    protected function coloredMessage(bool $isBackgroundColored, string $message, OutputColorEnum $color): string
    {
        return $isBackgroundColored ? $color->coloredBackgroundMessage($message) : $color->coloredMessage($message);
    }

    /**
     * output default color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputDefault(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::DEFAULT));
    }

    /**
     * output black color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputBlack(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::BLACK));
    }

    /**
     * output red color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputRed(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::RED));
    }

    /**
     *
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputGreen(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::GREEN));
    }

    /**
     * output yellow color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputYellow(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::YELLOW));
    }

    /**
     * output blue color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputBlue(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::BLUE));
    }

    /**
     * output magenta color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputMagenta(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::MAGENTA));
    }

    /**
     * output cyan color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputCyan(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::CYAN));
    }

    /**
     * output white color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputWhite(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::WHITE));
    }

    /**
     * output light gray color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputLightGray(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::LIGHT_GRAY));
    }

    /**
     * output dark gray color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputDarkGray(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::DARK_GRAY));
    }

    /**
     * output light red color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputLightRed(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::LIGHT_RED));
    }

    /**
     * output light green color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputLightGreen(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::LIGHT_GREEN));
    }

    /**
     * output light yellow color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputLightYellow(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::LIGHT_YELLOW));
    }

    /**
     * output light blue color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputLightBlue(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::LIGHT_BLUE));
    }

    /**
     * output light magenta color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputLightMagenta(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::LIGHT_MAGENTA));
    }

    /**
     * output light cyan color message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputLightCyan(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::LIGHT_CYAN));
    }

    /**
     * output success message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputSuccess(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->outputLightGreen($message, $isBackgroundColored, $withNewLine);
    }

    /**
     * output info message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputInfo(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->outputLightCyan($message, $isBackgroundColored, $withNewLine);
    }

    /**
     * output warning message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputWarning(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->outputLightYellow($message, $isBackgroundColored, $withNewLine);
    }

    /**
     * output error message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputError(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->outputLightRed($message, $isBackgroundColored, $withNewLine);
    }

    /**
     * output primary message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputPrimary(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->outputLightBlue($message, $isBackgroundColored, $withNewLine);
    }

    /**
     * output secondary message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputSecondary(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->outputLightGray($message, $isBackgroundColored, $withNewLine);
    }

    /**
     * output notice message
     *
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputNotice(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->outputLightMagenta($message, $isBackgroundColored, $withNewLine);
    }

    /*----------------------------------------*
     * Progress Bar
     *----------------------------------------*/

    /**
     * is executing progress bar
     *
     * @var bool
     */
    protected bool $isProgress = false;

    /**
     * index of progress bar symbol
     *
     * @var int
     */
    protected int $symbolIndex = 0;

    /**
     * progress symbol in progress bar
     *
     * @var string
     */
    protected string $progressSymbol = "#";

    /**
     * progress bar symbols
     *
     * @var array<string>
     */
    protected array $symbols = ["|", "/", "-", "\\"];

    /**
     * output progress bar
     *
     * @param int $percent
     * @return void
     */
    protected function progress(int $percent): void
    {
        if ($percent < 0 || $percent > 100) throw new \InvalidArgumentException("argument {$percent} is out of range.");

        $currentSymbol = $this->symbols[$this->symbolIndex];

        $this->carriageReturn();

        $this->outputWithoutNewLine(
            sprintf(
                "%s [%-100s]\t%3d%%",
                $currentSymbol,
                str_repeat($this->progressSymbol, $percent),
                $percent
            )
        );

        $this->symbolIndex = ($this->symbolIndex + 1) % count($this->symbols);
    }

    /**
     * start output progress bar
     *
     * @return void
     */
    protected function startProgress(): void
    {
        if (!$this->isCli()) return;

        $this->isProgress = true;
        $this->progress(0);
    }

    /**
     * update progress bar
     *
     * @param int $percent
     * @return void
     */
    protected function updateProgress(int $percent): void
    {
        $percent >= 100 && $this->isProgress ? $this->completeProgress() : $this->progress($percent);
    }

    /**
     * stop output progress bar
     *
     * @return void
     */
    protected function completeProgress(): void
    {
        if (!$this->isProgress) return;

        $this->isProgress = false;

        $this->progress(100);
        $this->newLine();
    }
}
