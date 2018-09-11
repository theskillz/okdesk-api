<?php

namespace OkDesk\tests\Resource;

use OkDesk\Resources\Company;
use OkDesk\tests\TestCase;

class CompanyTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->class = Company::class;
    }

    public function methodsThatShouldExist()
    {
        return [
            ['all'],
            ['create'],
            ['update'],
            ['view'],
        ];
    }
}