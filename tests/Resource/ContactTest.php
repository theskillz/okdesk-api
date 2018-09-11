<?php

namespace OkDesk\tests\Resource;

use OkDesk\Resources\Company;
use OkDesk\Resources\Contact;
use OkDesk\tests\TestCase;

class ContactTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->class = Contact::class;
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