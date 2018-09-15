<?php

namespace OkDesk\Resources;

use OkDesk\Resources\Traits\AllTrait;
use OkDesk\Resources\Traits\CreateTrait;
use OkDesk\Resources\Traits\UpdateTrait;
use OkDesk\Resources\Traits\ViewTrait;

class MaintenanceEntity extends AbstractResource
{
    use AllTrait, CreateTrait, ViewTrait, UpdateTrait;

    /**
     * The resource endpoint
     *
     * @var string
     */
    protected $endpoint = 'maintenance_entities';
}