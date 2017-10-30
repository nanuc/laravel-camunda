<?php

namespace Wertmenschen\CamundaApi\Models;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;


abstract class CamundaModel
{
    protected $client;
    public $id;

    public function __construct($id = null, $attributes = [])
    {
        $this->client = new Client([
            'base_uri' => config('camunda.api.url')
        ]);

        $this->id = $id;

        foreach($attributes as $key => $value) {
            $this->{$key} = $value;
        }
    }



    protected function post($url, $data = [], $noJson = false)
    {
        $data = $noJson ? $data : array_merge(['json' => ['a' => 'v']], $data);  // somehow that is needed for now to mark it as application/json
        return $this->request($url, 'post', $data);
    }

    protected function put($url, $json = [], $noJson = false)
    {
        return $this->request($url, 'put', compact('json'));
    }

    protected function get($url)
    {
        return $this->request($url, 'get');
    }


    private function request($url, $method, $data = [])
    {
        try {
            $response = $this->client->{$method}($this->buildUrl($url), $data);
        }
        catch (ServerException $e) {
            dd(json_decode($e->getResponse()->getBody()->getContents()));
        }
        return json_decode($response->getBody());
    }

    private function buildUrl($url)
    {
        $modelUri = empty($this->id) || str_contains($url, '?') ? '' : $this->modelUri() . '/';
        return 'engine-rest/' . $modelUri . $url;
    }

    private function modelUri()
    {
        return kebab_case(class_basename($this)) . '/' . $this->id;
    }
}