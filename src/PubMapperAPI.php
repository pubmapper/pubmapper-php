<?php

namespace PubMapper\PubMapperAPI;

require dirname(__FILE__).'/../vendor/autoload.php';

use GuzzleHttp\Client;

class PubMapperAPI {

    private $client;
    public $response;

    public function __construct() {

        $this->client = new Client([
            'base_uri' => 'http://api.pubmapper.co'
        ]);

    }

    public function get($methodName, $params = array()) {

        $this->response = $this->client->request('GET', $methodName, $params);

        $data = $this->response->getBody();

        if (!$data) {
            return FALSE;
        }

        $data = json_decode($data);

        return $data;
    }

}
