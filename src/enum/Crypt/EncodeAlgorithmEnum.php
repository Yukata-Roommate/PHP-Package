<?php

namespace YukataRm\Enum\Crypt;

use YukataRm\Trait\Enum\Extension;

/**
 * Encode Algorithm Enum
 *
 * @package YukataRm\Enum\Crypt
 */
enum EncodeAlgorithmEnum: string
{
    use Extension;

    case BASE64 = "base64";
    case HEX    = "hex";
}
