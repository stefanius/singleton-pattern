<?php

namespace Tests\SingletonPattern;

use Stefanius\SingletonPattern\Singleton;

/**
 * Class TestClass
 *
 * This class is used in the unittest and provides a small example of the Singleton pattern.
 *
 * @package Tests\SingletonPattern
 */
class TestClass extends Singleton
{
    protected $counter;

    /**
     * Initiate this testclass
     */
    protected function init()
    {
        $this->counter = 0;
    }

    /**
     * Increase the counter
     */
    public function increase()
    {
        $this->counter++;
    }

    /**
     * Decrease the counter
     */
    public function decrease()
    {
        $this->counter--;

        if ($this->counter < 0) {
            $this->counter = 0;
        }
    }

    /**
     * @return mixed
     */
    public function currentValue()
    {
        return $this->counter;
    }
}
