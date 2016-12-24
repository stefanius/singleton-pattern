<?php

namespace Stefanius\SingletonPattern;

/**
 * Class SingletonTrait
 *
 * @package Stefanius\SingletonPattern
 */
trait SingletonTrait
{
    //The class one and only instance
    protected static $instance = null;

    /**
     * Get the only instance
     *
     * @return $this
     */
    public static function getInstance()
    {
        if (!isset(static::$instance) || is_null(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    /**
     * The constructor should not be public and at least protected.
     *
     * SingletonTrait constructor.
     */
    protected function __construct()
    {
        $this->init();
    }

    /**
     * Perform some initiation
     */
    protected function init()
    {
        //Override this if you need to
    }

    /**
     * Prevent cloning at all time!
     */
    private function __clone() {}

    /**
     * Prevent serializing of a Singleton object
     */
    private function __sleep() {}

    /**
     * Prevent de-serializing of a Singleton object
     */
    private function __wakeup() {}
}
