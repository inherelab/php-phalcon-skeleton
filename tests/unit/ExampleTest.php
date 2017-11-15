<?php

/**
 * Class ExampleTest
 *
 * @method count()
 * @method run(PHPUnit_Framework_TestResult $result = null)
 */
class ExampleTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $this->assertEquals(1, 1);
    }

}