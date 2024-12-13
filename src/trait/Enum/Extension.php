<?php

namespace YukataRm\Trait\Enum;

/**
 * Enum Extension trait
 *
 * @package YukataRm\Trait\Enum
 *
 * @method static array cases()
 */
trait Extension
{
    /*----------------------------------------*
     * Assert Enum
     *----------------------------------------*/

    /**
     * assert class uses Enum
     *
     * @return void
     */
    protected static function assertEnum(): void
    {
        if (!enum_exists(self::class)) throw new \BadMethodCallException("this trait can only be used in Enum");
    }

    /*----------------------------------------*
     * From Name
     *----------------------------------------*/

    /**
     * make enum from name
     *
     * @param int|string $name
     * @return static
     */
    public static function fromName(int|string $name): static
    {
        self::assertEnum();

        foreach (self::cases() as $case) {
            if ($name === $case->name) return $case;
        }

        throw new \ValueError("$name is not a valid backing name for enum " . self::class);
    }

    /**
     * make enum from name
     * if failed, return null
     *
     * @param int|string $name
     * @return static|null
     */
    public static function tryFromName(int|string $name): static|null
    {
        try {
            return self::fromName($name);
        } catch (\ValueError $error) {
            return null;
        }
    }

    /*----------------------------------------*
     * Cases Reverse
     *----------------------------------------*/

    /**
     * get cases in reverse order
     *
     * @return array
     */
    public static function casesReverse(): array
    {
        self::assertEnum();

        return array_reverse(self::cases());
    }

    /*----------------------------------------*
     * Names
     *----------------------------------------*/

    /**
     * get names from cases
     *
     * @return array
     */
    public static function names(): array
    {
        self::assertEnum();

        return array_column(self::cases(), "name");
    }

    /**
     * get names in reverse order
     *
     * @return array
     */
    public static function namesReverse(): array
    {
        return array_reverse(self::names());
    }

    /*----------------------------------------*
     * Values
     *----------------------------------------*/

    /**
     * get values from cases
     *
     * @return array
     */
    public static function values(): array
    {
        self::assertEnum();

        return array_column(self::cases(), "value");
    }

    /**
     * get values in reverse order
     *
     * @return array
     */
    public static function valuesReverse(): array
    {
        return array_reverse(self::values());
    }
}
