<?php

namespace Wertmenschen\CamundaApi;

use org\camunda\php\sdk\Api;
use org\camunda\php\sdk\entity\request\ProcessDefinitionRequest;

class CamundaApi
{
    protected $client;

    public function __construct(Api $client)
    {
        $this->client = $client;
    }

    public function processDefinitions()
    {
        $processDefinitionRequest = new ProcessDefinitionRequest();
        return $this->client->processDefinition->getDefinitions($processDefinitionRequest);
    }
}