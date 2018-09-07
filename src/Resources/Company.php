<?php

namespace OkDesk\Resources;

use OkDesk\Resources\Traits\AllTrait;
use OkDesk\Resources\Traits\ViewTrait;

class Company extends AbstractResource
{
    use AllTrait;
    /**
     * The resource endpoint
     *
     * @var string
     */
    protected $endpoint = 'companies';
}