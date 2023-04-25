<?php

namespace OkDesk;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use OkDesk\Resources\Agreement;
use OkDesk\Resources\Company;
use OkDesk\Resources\Contact;
use OkDesk\Resources\Equipment;
use OkDesk\Resources\Issue;
use OkDesk\Resources\MaintenanceEntity;

class Api
{
    /*
     * Agreements resources
     * @var Agreement
     */
    public $agreements;

    /*
     * Companies resources
     * @var Company
     */
    public $companies;

    /*
     * Contacts resources
     * @var Contact
     */
    public $contacts;

    /*
     * Equipments resources
     * @var Equipment
     */
    public $equipments;

    /*
     * Issues resources
     * @var Issue
     */
    public $issues;

    /*
     * Maintenance entities resources
     * @var MaintenanceEntities
     */
    public $maintenanceEntities;

    protected $token;
    protected $baseUrl;
    protected $client;

    public function __construct($domain, $token)
    {
        $this->token = $token;
        $this->baseUrl = sprintf('https://%s.okdesk.ru/api/v1/', $domain);
        $this->client = new Client();
        $this->client = new Client([
            'base_uri' => $this->baseUrl
        ]);

        $this->init();
    }

    public function request($method, $endpoint, array $data = null, array $query = null)
    {
        $options = ['json' => $data];
        if (isset($query)) {
            $options['query'] = $query;
        }
        $options['query']['api_token'] = $this->token;
        $url = $this->baseUrl . $endpoint;
        return $this->performRequest($method, $url, $options);
    }

    protected function performRequest($method, $url, $options)
    {
        try {
            switch ($method) {
                case 'GET':
                    return json_decode($this->client->get($url, $options)->getBody(), true);
                case 'POST':
                    return json_decode($this->client->post($url, $options)->getBody(), true);
                case 'PUT':
                    return json_decode($this->client->put($url, $options)->getBody(), true);
                case 'PATCH':
                    return json_decode($this->client->patch($url, $options)->getBody(), true);
                case 'DELETE':
                    return json_decode($this->client->delete($url, $options)->getBody(), true);
                default:
                    return null;
            }
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = json_decode($e->getResponse()->getBody(), true);
                // message is in $response->getReasonPhrase()
            } else {
                $response = $e->getHandlerContext();
                if (isset($response['error'])) {
                    // message is in $response['error']
                } else {
                    // Unknown error occured!
                }
            }
            return $response;
        } catch (\Exception $e) {
//            throw ApiException::create($e);
            print_r($e->getMessage());
        }
//        $params['api_token'] = $this->token;
//        return $this->client->get($resource, ['query' => $params]);
    }

    public function requestPost($resource, $params = [])
    {
        return $this->client->post($resource, [
            'query' => ['api_token' => $this->token],
            'json' => $params,
        ]);
    }

    protected function init()
    {
        $this->agreements = new Agreement($this);
        $this->companies = new Company($this);
        $this->contacts = new Contact($this);
        $this->equipments = new Equipment($this);
        $this->issues = new Issue($this);
        $this->maintenanceEntities = new MaintenanceEntity($this);
    }

    public function createLoginLink($data = null)
    {
        return $this->request('POST', 'login_link', $data);
    }
}
