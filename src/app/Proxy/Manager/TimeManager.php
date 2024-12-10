<?php

namespace YukataRm\Proxy\Manager;

use YukataRm\Interface\Time\TimerInterface;
use YukataRm\Time\Timer;

/**
 * Time Proxy Manager
 *
 * @package YukataRm\Proxy\Manager
 */
class TimeManager
{
    /**
     * make Timer instance
     *
     * @return \YukataRm\Interface\Time\TimerInterface
     */
    public function make(): TimerInterface
    {
        return new Timer();
    }

    /**
     * start measuring time with Timer instance
     *
     * @return \YukataRm\Interface\Time\TimerInterface
     */
    public function start(): TimerInterface
    {
        return $this->make()->start();
    }
}
