<?php

namespace PubMapper\PubMapperAPI;

use GuzzleHttp\Client;

class PubMapperAPI {

    private $client;
    public $response;

    public function __construct() {

        $this->client = new Client([
            'base_uri' => 'https://api.pubmapper.app'
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
