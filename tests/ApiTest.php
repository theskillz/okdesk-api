<?php

namespace OkDesk\tests;

use OkDesk\Api;

class ApiTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->class = Api::class;
    }

    public function methodsThatShouldExist()
    {
        return [
            ['request'],
        ];
    }

    /**
     * @dataProvider publicPropertiesThatShouldExist
     */
    public function testPublicPropertiesAreAccessible($property)
    {
        $this->assertTrue(property_exists($this->class, $property));
    }
    public function publicPropertiesThatShouldExist()
    {
        return [
            ['agreements'],
            ['companies'],
            ['contacts'],
            ['equipments'],
            ['issues'],
            ['maintenanceEntities'],
        ];
    }
}
