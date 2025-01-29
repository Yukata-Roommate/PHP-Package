<?php

namespace YukataRm\Enum\Crypt;

use YukataRm\Trait\Enum\Extension;

/**
 * Password Algorithm Enum
 *
 * @package YukataRm\Enum\Crypt
 */
enum PasswordAlgorithmEnum: string
{
    use Extension;

    case DEFAULT  = "default";
    case BCRYPT   = "bcrypt";
    case ARGON2I  = "argon2i";
    case ARGON2ID = "argon2id";

    /**
     * get algorithm constant
     *
     * @return string
     */
    public function constant(): string
    {
        return match ($this) {
            self::DEFAULT  => PASSWORD_DEFAULT,
            self::BCRYPT   => PASSWORD_BCRYPT,
            self::ARGON2I  => PASSWORD_ARGON2I,
            self::ARGON2ID => PASSWORD_ARGON2ID,
        };
    }
}
