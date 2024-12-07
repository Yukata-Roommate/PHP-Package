<?php

namespace YukataRm\Sms\Twilio;

use YukataRm\Interface\Sms\Twilio\ClientInterface;

use YukataRm\Interface\Sms\Twilio\ResponseInterface;
use YukataRm\Sms\Twilio\Response;

use Twilio\Rest\Client as TwilioClient;
use Twilio\Rest\Api\V2010\Account\MessageInstance;

/**
 * SMS Twilio Client
 *
 * @package YukataRm\Sms\Twilio
 */
class Client implements ClientInterface
{
    /*----------------------------------------*
     * Sending
     *----------------------------------------*/

    /**
     * send SMS
     *
     * @return \YukataRm\Interface\Sms\Twilio\ResponseInterface
     */
    public function send(): ResponseInterface
    {
        $response = $this->getResponse();

        return new Response($response);
    }

    /**
     * get Twilio response
     *
     * @return \Twilio\Rest\Api\V2010\Account\MessageInstance
     */
    protected function getResponse(): MessageInstance
    {
        $recipient = $this->recipient();

        if (is_null($recipient)) throw new \RuntimeException("recipient is not set.");

        $client  = $this->getClient();
        $options = $this->getOptions();

        $response = $client->messages->create($recipient, $options);

        return $response;
    }

    /**
     * get Twilio client
     *
     * @return \Twilio\Rest\Client
     */
    protected function getClient(): TwilioClient
    {
        $accountSid = $this->accountSid();
        $authToken  = $this->authToken();

        if (is_null($accountSid)) throw new \RuntimeException("account SID is not set.");

        if (is_null($authToken)) throw new \RuntimeException("auth token is not set.");

        return new TwilioClient($accountSid, $authToken);
    }

    /**
     * get Twilio options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $options = [];

        $sender         = $this->sender();
        $body           = $this->body();
        $statusCallback = $this->statusCallback();

        if (is_null($sender)) throw new \RuntimeException("sender is not set.");

        if (is_null($body)) throw new \RuntimeException("body is not set.");

        $options["from"] = $sender;
        $options["body"] = $body;

        if (!is_null($statusCallback)) $options["statusCallback"] = $statusCallback;

        return $options;
    }

    /*----------------------------------------*
     * Address
     *----------------------------------------*/

    /**
     * recipient
     *
     * @var string|null
     */
    protected string|null $recipient = null;

    /**
     * sender
     *
     * @var string|null
     */
    protected string|null $sender = null;

    /**
     * get recipient
     *
     * @return string|null
     */
    public function recipient(): string|null
    {
        return $this->recipient;
    }

    /**
     * set recipient
     *
     * @param string $recipient
     * @return static
     */
    public function setRecipient(string $recipient): static
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * get sender
     *
     * @return string|null
     */
    public function sender(): string|null
    {
        return $this->sender;
    }

    /**
     * set sender
     *
     * @param string $sender
     * @return static
     */
    public function setSender(string $sender): static
    {
        $this->sender = $sender;

        return $this;
    }

    /*----------------------------------------*
     * Body
     *----------------------------------------*/

    /**
     * body
     *
     * @var array<string>
     */
    protected array $body = [];

    /**
     * get body
     *
     * @return string
     */
    public function body(): string
    {
        return implode(PHP_EOL, $this->body);
    }

    /**
     * set body array
     *
     * @param array<string> $body
     * @return static
     */
    public function setBodyArray(array $body): static
    {
        $this->body = $body;

        return $this;
    }

    /**
     * set body string
     *
     * @param string $body
     * @return static
     */
    public function setBody(string $body): static
    {
        return $this->setBodyArray([$body]);
    }

    /**
     * add body
     *
     * @param string $body
     * @return static
     */
    public function addBody(string $body): static
    {
        if (empty($this->body)) return $this->setBody($body);

        $this->body[] = $body;

        return $this;
    }

    /**
     * clear body
     *
     * @return static
     */
    public function clearBody(): static
    {
        $this->body = [];

        return $this;
    }

    /*----------------------------------------*
     * Auth
     *----------------------------------------*/

    /**
     * account sid
     *
     * @var string|null
     */
    protected string|null $accountSid = null;

    /**
     * auth token
     *
     * @var string|null
     */
    protected string|null $authToken = null;

    /**
     * get account sid
     *
     * @return string|null
     */
    public function accountSid(): string|null
    {
        return $this->accountSid;
    }

    /**
     * set account sid
     *
     * @param string $accountSid
     * @return static
     */
    public function setAccountSid(string $accountSid): static
    {
        $this->accountSid = $accountSid;

        return $this;
    }

    /**
     * get auth token
     *
     * @return string|null
     */
    public function authToken(): string|null
    {
        return $this->authToken;
    }

    /**
     * set auth token
     *
     * @param string $authToken
     * @return static
     */
    public function setAuthToken(string $authToken): static
    {
        $this->authToken = $authToken;

        return $this;
    }

    /*----------------------------------------*
     * Status Callback
     *----------------------------------------*/

    /**
     * callback url
     *
     * @var string|null
     */
    protected string|null $statusCallback = null;

    /**
     * get callback url
     *
     * @return string|null
     */
    public function statusCallback(): string|null
    {
        return $this->statusCallback;
    }

    /**
     * set callback url
     *
     * @param string $statusCallback
     * @return static
     */
    public function setStatusCallback(string $statusCallback): static
    {
        $this->statusCallback = $statusCallback;

        return $this;
    }
}
