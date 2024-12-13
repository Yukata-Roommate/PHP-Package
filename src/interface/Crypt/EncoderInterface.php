<?php

namespace YukataRm\Interface\Crypt;

use YukataRm\Enum\Crypt\EncodeAlgorithmEnum;

/**
 * Crypt Encoder Interface
 *
 * @package YukataRm\Interface\Crypt
 */
interface EncoderInterface
{
    /*----------------------------------------*
     * Algorithm
     *----------------------------------------*/

    /**
     * get algorithm
     *
     * @return \YukataRm\Enum\Crypt\EncodeAlgorithmEnum|null
     */
    public function algorithm(): EncodeAlgorithmEnum|null;

    /**
     * set algorithm
     *
     * @param \YukataRm\Enum\Crypt\EncodeAlgorithmEnum|string $algorithm
     * @return static
     */
    public function setAlgorithm(EncodeAlgorithmEnum|string $algorithm): static;

    /**
     * set algorithm to base64
     *
     * @return static
     */
    public function useBase64(): static;

    /**
     * set algorithm to hex
     *
     * @return static
     */
    public function useHex(): static;

    /*----------------------------------------*
     * Encode
     *----------------------------------------*/

    /**
     * encode string
     *
     * @param string $data
     * @return string
     */
    public function encode(string $data): string;

    /*----------------------------------------*
     * Decode
     *----------------------------------------*/

    /**
     * decode string
     *
     * @param string $data
     * @return string
     */
    public function decode(string $data): string;
}
