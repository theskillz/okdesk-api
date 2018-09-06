<?php

namespace OkDesk\API;

use OkDesk\Issues\Issue;

class Issues
{
    protected $api;
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * @param integer|string $issueId
     * @return array
     * @see https://okdesk.ru/apidoc#!informacziya-o-zayavke-informacziya-o-zayavke
     */
    public function get($issueId)
    {
        $response = $this->api->requestGet('issues/' . $issueId);
        $issue = new Issue($this->api);
        $attributes = json_decode($response->getBody()->getContents(), true);
        return $issue->setAttributes($attributes);
    }

    /**
     * @param array $params
     *  Available
     *      assignee_ids            array of integer
     *      company_ids             array of integer
     *      contact_ids             array of integer
     *      author_ids              array of integer
     *      maintenance_entity_ids  array of integer
     *      status                  array of string
     *      status_not              array of string
     *      priority                array of string
     *      type                    array of string
     *      created_since           string
     *      created_until           string
     *      overdue                 integer
     *      completed_since         string
     *      completed_until         string
     *      custom_parameters       hash
     * @return array
     * @see https://okdesk.ru/apidoc#!poluchenie-spiska-po-parametram-poluchenie-spiska-po-parametram
     */
    public function search($params = [])
    {
        $response = $this->api->requestGet('issues/count', $params);
        return json_decode($response->getBody()->getContents());
    }

}