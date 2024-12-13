<?php

namespace YukataRm\Enum\Crypt;

use YukataRm\Trait\Enum\Extension;

/**
 * Encrypt Algorithm Enum
 *
 * @package YukataRm\Enum\Crypt
 */
enum EncryptAlgorithmEnum: string
{
    use Extension;

    case AES_256_CBC  = "aes-256-cbc";
    case AES_256_CCM  = "aes-256-ccm";
    case AES_256_CFB  = "aes-256-cfb";
    case AES_256_CFB1 = "aes-256-cfb1";
    case AES_256_CFB8 = "aes-256-cfb8";
    case AES_256_CTR  = "aes-256-ctr";
    case AES_256_GCM  = "aes-256-gcm";
    case AES_256_OCB  = "aes-256-ocb";
    case AES_256_OFB  = "aes-256-ofb";
    case AES_256_XTS  = "aes-256-xts";
}
