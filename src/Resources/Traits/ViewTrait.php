<?php

namespace OkDesk\Resources\Traits;

trait ViewTrait
{
    /**
     * @param integer $end string
     * @return string
     */
    abstract protected function endpoint($end = null);

    /**
     * @return \OkDesk\Api
     */
    abstract protected function api();

    public function view($id, array $query = null)
    {
        return $this->api()->request('GET', $this->endpoint($id), null, $query);
    }
}