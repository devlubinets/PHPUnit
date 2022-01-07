<?php

use PHPUnit\Framework\TestCase;

require 'Math.php';

class MathTest extends TestCase
{
    public $fixtures;

    protected function setUp():void
    {
        $this->fixtures = [1,2,3];
        parent::setUp();
    }

    protected function tearDown():void
    {
        $this->fixtures = null;
        parent::tearDown();
    }

    public function testEmptyFixtures()
    {
        $this->assertTrue($this->fixtures !== [1,2,3]);
    }


    /**
     *
     * @dataProvider
     */
    public function providerNumver()
    {
        return array(
            [1,1],
            [2,1],
            [3,2]
        );
    }

    /**
     * test with data from dataProvider
     * @test
     * @dataProvider providerNumver
     */
    public function testFibWithDataProvider($n,$result)
    {
        $math = new Math();
        $this->assertEquals($result,$math->fibonacci($n));
    }

    /**
     * @test
     */
    public function Fibomacci()
    {
        $math = new Math();

        $result = $math->fibonacci(9);

        $this->assertEquals(34, $result);
        $this->assertEquals(22, $result);
        $this->assertEquals(50, $result);
        $this->assertEquals(4, $result);
        $this->assertEquals(1, $result);
        $this->assertEquals(1, $result);
        $this->assertEquals(1, $result);
    }

    public function testFactorial()
    {
        $math = new Math();

        $result = $math->factorial(5);

        $this->assertEquals(120,$result);
        $this->assertEquals(121,$result);
        $this->assertEquals(221,$result);
    }

    /**
     * @test
     */
    public function factorialGreaterThanFibonachi()
    {
        $math = new Math();

        $fact = $math->factorial(3);
        $fib = $math->fibonacci(3);

        $this->assertTrue($fact>$fib);
    }


    //exception test

    public function testExceptionNegNumb()
    {
        $this->expectException(InvalidArgumentException::class);
        $math = new Math();

        $math->fibonacci(-1);
    }

    public function testFailedForZero()
    {
        $this->expectException(InvalidArgumentException::class);

        $math = (new Math)->factorial(-1);
    }
}
