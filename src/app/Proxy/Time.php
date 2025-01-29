<?php

namespace YukataRm\Proxy;

use YukataRm\Proxy\MethodProxy;

use YukataRm\Proxy\Manager\TimeManager;

/**
 * Time Proxy
 *
 * @package YukataRm\Proxy
 *
 * @method static \YukataRm\Interface\Time\TimerInterface make()
 * @method static \YukataRm\Interface\Time\TimerInterface start()
 *
 * @see \YukataRm\Proxy\Manager\TimeManager
 */
class Time extends MethodProxy
{
    /**
     * called class name
     *
     * @var string
     */
    protected string $className = TimeManager::class;
}
