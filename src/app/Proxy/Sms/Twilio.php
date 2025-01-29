<?php

namespace YukataRm\Proxy\Sms;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\Sms\TwilioManager;

/**
 * SMS Twilio Proxy
 *
 * @package YukataRm\Proxy\Sms
 *
 * @method static \YukataRm\Interface\Sms\Twilio\ClientInterface make()
 *
 * @see \YukataRm\Proxy\Manager\Sms\TwilioManager
 */
class Twilio extends MethodProxy
{
    /**
     * called class name
     *
     * @var string
     */
    protected string $className = TwilioManager::class;
}
