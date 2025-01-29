<?php

namespace YukataRm\File\Csv;

use YukataRm\Interface\File\Csv\ReaderInterface;
use YukataRm\File\Base\Reader as BaseReader;

use YukataRm\Trait\File\Csv\Format;

/**
 * CSV File Reader
 *
 * @package YukataRm\File\Csv
 */
class Reader extends BaseReader implements ReaderInterface
{
    use Format;

    /*----------------------------------------*
     * Read Line
     *----------------------------------------*/

    /**
     * get file data
     *
     * @param \SplFileObject $file
     * @return array<string>|false
     */
    protected function getFileData(\SplFileObject $file): array|false
    {
        return $file->fgetcsv(
            $this->separator(),
            $this->enclosure(),
            $this->escape()
        );
    }
}
