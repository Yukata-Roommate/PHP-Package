<?php

namespace YukataRm\Crypt;

use YukataRm\Interface\Crypt\EncoderInterface;

use YukataRm\Enum\Crypt\EncodeAlgorithmEnum;

/**
 * Crypt Encoder
 *
 * @package YukataRm\Crypt
 */
class Encoder implements EncoderInterface
{
    /*----------------------------------------*
     * Algorithm
     *----------------------------------------*/

    /**
     * algorithm
     *
     * @var \YukataRm\Enum\Crypt\EncodeAlgorithmEnum|null
     */
    protected EncodeAlgorithmEnum|null $algorithm = null;

    /**
     * get algorithm
     *
     * @return \YukataRm\Enum\Crypt\EncodeAlgorithmEnum|null
     */
    public function algorithm(): EncodeAlgorithmEnum|null
    {
        return $this->algorithm;
    }

    /**
     * set algorithm
     *
     * @param \YukataRm\Enum\Crypt\EncodeAlgorithmEnum|string $algorithm
     * @return static
     */
    public function setAlgorithm(EncodeAlgorithmEnum|string $algorithm): static
    {
        if (is_string($algorithm)) $algorithm = EncodeAlgorithmEnum::tryFrom($algorithm);

        $this->algorithm = $algorithm;

        return $this;
    }

    /**
     * set algorithm to base64
     *
     * @return static
     */
    public function useBase64(): static
    {
        return $this->setAlgorithm(EncodeAlgorithmEnum::BASE64);
    }

    /**
     * set algorithm to hex
     *
     * @return static
     */
    public function useHex(): static
    {
        return $this->setAlgorithm(EncodeAlgorithmEnum::HEX);
    }

    /*----------------------------------------*
     * Encode
     *----------------------------------------*/

    /**
     * encode string
     *
     * @param string $data
     * @return string
     */
    public function encode(string $data): string
    {
        return match ($this->algorithmForce()) {
            EncodeAlgorithmEnum::BASE64 => base64_encode($data),
            EncodeAlgorithmEnum::HEX    => bin2hex($data),

            default => throw new \Exception("encode algorithm is not valid."),
        };
    }

    /*----------------------------------------*
     * Decode
     *----------------------------------------*/

    /**
     * decode string
     *
     * @param string $data
     * @return string
     */
    public function decode(string $data): string
    {
        return match ($this->algorithmForce()) {
            EncodeAlgorithmEnum::BASE64 => base64_decode($data),
            EncodeAlgorithmEnum::HEX    => hex2bin($data),

            default => throw new \Exception("decode algorithm is not valid."),
        };
    }

    /*----------------------------------------*
     * Not Public
     *----------------------------------------*/

    /**
     * get algorithm force
     *
     * @return \YukataRm\Enum\Crypt\EncodeAlgorithmEnum
     */
    protected function algorithmForce(): EncodeAlgorithmEnum
    {
        $algorithm = $this->algorithm();

        if (is_null($algorithm)) throw new \Exception("algorithm is not set.");

        return $algorithm;
    }
}
