<?php

namespace OkDesk\Issues;

class Comment extends AbstractResource
{
    protected $attributes = [
        'id' => null,
        'name' => null,
        'content' => null,
        'public' => null,
        'author' => null,
    ];
}