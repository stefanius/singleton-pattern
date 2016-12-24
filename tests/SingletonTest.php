<?php

namespace Tests\SingletonPattern;

use PHPUnit\Framework\TestCase;

/**
 * Class SingletonTest
 *
 * Test the a Singleton object and prove the behavior is correct implemented in the pattern
 *
 * @package Tests\SingletonPattern
 */
class SingletonTest extends TestCase
{
    /**
     * @expectedException \Error
     */
    public function testConstructionResultsInError()
    {
        $instance = new TestClass(); //Even in a serious PHP IDE this is located a something illegal.
    }

    /**
     * @expectedException \Error
     */
    public function testCloningResultsInError()
    {
        $instance = TestClass::getInstance();

        $clone = clone $instance;
    }

    /**
     * Test error message on cloning a Singleton
     */
    public function testSingletonCannotBeCloned()
    {
        $expectedMessage = "Call to private %s::__clone() from context '%s'";

        try {
            $instance = TestClass::getInstance();

            $clone = clone $instance;
        } catch (\Error $e) {
            $this->assertEquals($e->getMessage(), sprintf($expectedMessage, TestClass::class, self::class));

            return;
        }

        $this->fail("testSingletonCannotBeCloned should raise an error that is catched.");
    }

    /**
     * Test error message on cloning a Singleton
     */
    public function testSingletonCannotBeSerialised()
    {
        $expectedMessage = "Invalid callback %s::__sleep, cannot access private method %s::__sleep()";

        try {
            $instance = TestClass::getInstance();

            $serialised = serialize($instance);
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), sprintf($expectedMessage, TestClass::class, TestClass::class));

            return;
        }

        $this->fail("testSingletonCannotBeCloned should raise an error that is catched.");
    }

    /**
     * Perform some operations and prove the same instance is used every time
     */
    public function testTheSingletonInstance()
    {
        $instance = TestClass::getInstance();

        //See if the initial value is 0
        $this->assertEquals(0, $instance->currentValue());

        //Call the increase value and see if the value is update
        $instance->increase();
        $instance->increase();
        $this->assertEquals(2, $instance->currentValue());

        //What happened when we instantiate a new variable?
        $newVariable = TestClass::getInstance();
        $this->assertEquals(2, $newVariable->currentValue());

        //Are it really both the same objects?
        $this->assertEquals($instance, $newVariable);
        $this->assertEquals($instance->currentValue(), $newVariable->currentValue());
    }
}
