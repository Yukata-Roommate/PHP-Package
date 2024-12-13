<?php

namespace YukataRm\Interface\Sms\Twilio;

use YukataRm\Interface\Sms\Twilio\ResponseInterface;

/**
 * SMS Twilio Client Interface
 *
 * @package YukataRm\Interface\Sms\Twilio
 */
interface ClientInterface
{
    /*----------------------------------------*
     * Sending
     *----------------------------------------*/

    /**
     * send SMS
     *
     * @return \YukataRm\Interface\Sms\Twilio\ResponseInterface
     */
    public function send(): ResponseInterface;

    /*----------------------------------------*
     * Address
     *----------------------------------------*/

    /**
     * get recipient
     *
     * @return string|null
     */
    public function recipient(): string|null;

    /**
     * set recipient
     *
     * @param string $recipient
     * @return static
     */
    public function setRecipient(string $recipient): static;

    /**
     * get sender
     *
     * @return string|null
     */
    public function sender(): string|null;

    /**
     * set sender
     *
     * @param string $sender
     * @return static
     */
    public function setSender(string $sender): static;

    /*----------------------------------------*
     * Body
     *----------------------------------------*/

    /**
     * get body
     *
     * @return string
     */
    public function body(): string;

    /**
     * set body array
     *
     * @param array<string> $body
     * @return static
     */
    public function setBodyArray(array $body): static;

    /**
     * set body
     *
     * @param string $body
     * @return static
     */
    public function setBody(string $body): static;

    /**
     * add body
     *
     * @param string $body
     * @return static
     */
    public function addBody(string $body): static;

    /**
     * clear body
     *
     * @return static
     */
    public function clearBody(): static;

    /*----------------------------------------*
     * Auth
     *----------------------------------------*/

    /**
     * set account sid
     *
     * @return string|null
     */
    public function accountSid(): string|null;

    /**
     * set account sid
     *
     * @param string $accountSid
     * @return static
     */
    public function setAccountSid(string $accountSid): static;

    /**
     * get auth token
     *
     * @return string|null
     */
    public function authToken(): string|null;

    /**
     * set auth token
     *
     * @param string $authToken
     * @return static
     */
    public function setAuthToken(string $authToken): static;

    /*----------------------------------------*
     * Status Callback
     *----------------------------------------*/

    /**
     * get callback url
     *
     * @return string|null
     */
    public function statusCallback(): string|null;

    /**
     * set callback url
     *
     * @param string $statusCallback
     * @return static
     */
    public function setStatusCallback(string $statusCallback): static;
}
