<?php

namespace OkDesk\Resources;

use OkDesk\Resources\Traits\AllTrait;

class Contact extends AbstractResource
{
    use AllTrait;
    /**
     * The resource endpoint
     *
     * @var string
     */
    protected $endpoint = 'contacts';

}