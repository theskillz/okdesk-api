<?php
namespace OkDesk\Issues;

use OkDesk\API\Api;
use OkDesk\Resource;

class Issue extends Resource
{
    protected $attributes = [
        'id' => null,
        'title' => null,
        'created_at' => null,
        'completed_at' => null,
        'deadline_at' => null,
        'delayed_to' => null,
        'source' => null,
        'spent_time_total' => null,
        'company_id' => null,
        'service_object_id' => null,
        'equipment_ids' => null,
        'attachments' => null,
        'parameters' => null,
        'status_times' => null,
        'status' => null,
        'old_status' => null,
        'assignee' => null,
        'author' => null,
        'agreement' => null,
        'contact' => null,
        'priority' => null,
        'type' => null,
        'comments' => null,
    ];

}