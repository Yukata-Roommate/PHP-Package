<?php

namespace YukataRm\Proxy\Manager\Sms;

use YukataRm\Interface\Sms\Twilio\ClientInterface;
use YukataRm\Sms\Twilio\Client;

/**
 * SMS Twilio Proxy Manager
 *
 * @package YukataRm\Proxy\Manager\Sms
 */
class TwilioManager
{
    /**
     * make Twilio Client instance
     *
     * @return \YukataRm\Interface\Sms\Twilio\ClientInterface
     */
    public function make(): ClientInterface
    {
        return new Client();
    }
}
