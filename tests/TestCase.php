<?php

namespace OkDesk\tests;

use OkDesk\Api;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Api
     */
    protected $api;

    /**
     * The specific class being tested
     * @var
     */
    protected $class;

    public function setUp()
    {
        $this->api = new Api("foo", "bar");
    }

    /**
     * @dataProvider methodsThatShouldExist
     */
    public function testMethodsExist($method)
    {
        $this->assertMethodExists($method);
    }

    protected function assertMethodExists($method)
    {
        $this->assertTrue(
            method_exists($this->class, $method)
        );
    }
}