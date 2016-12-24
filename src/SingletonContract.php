<?php

namespace Stefanius\SingletonPattern;

/**
 * Interface SingletonContract
 *
 * @package Stefanius\SingletonPattern
 */
interface SingletonContract
{
    /**
     * Get the only instance
     *
     * @return $this
     */
    public static function getInstance();
}
