<?php

namespace YukataRm\Enum\Crypt;

use YukataRm\Trait\Enum\Extension;

/**
 * Hash Algorithm Enum
 *
 * @package YukataRm\Enum\Crypt
 */
enum HashAlgorithmEnum: string
{
    use Extension;

    case MD5      = "md5";
    case SHA2_256 = "sha256";
    case SHA2_512 = "sha512";
    case SHA3_256 = "sha3-256";
    case SHA3_512 = "sha3-512";
}
