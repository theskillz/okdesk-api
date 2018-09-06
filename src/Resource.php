<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 06.09.18
 * Time: 21:51
 */

namespace OkDesk;


use OkDesk\API\Api;

abstract class Resource
{
    protected $api;
    protected $attributes = [];

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }
        return null;
    }

    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->attributes)) {
            $this->attributes[$name] = $value;
        }
    }

    public function setAttributes(array $attributes)
    {
        foreach ($attributes as $key => $attribute) {
            $this->__set($key, $attribute);
        }

        return $this;
    }

    public function toArray()
    {
        return $this->attributes;
    }

    public function toJson($pretty = false)
    {
        return json_encode($this->attributes, $pretty ? JSON_PRETTY_PRINT : 0);
    }
}