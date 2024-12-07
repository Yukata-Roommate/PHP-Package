<?php

namespace YukataRm\File;

use YukataRm\Interface\File\ReaderInterface;
use YukataRm\File\Base\Reader as BaseReader;

/**
 * File Reader
 *
 * @package YukataRm\File
 */
class Reader extends BaseReader implements ReaderInterface
{
    /*----------------------------------------*
     * Read Line
     *----------------------------------------*/

    /**
     * get file data
     *
     * @param \SplFileObject $file
     * @return string
     */
    protected function getFileData(\SplFileObject $file): string
    {
        return $file->fgets();
    }
}
