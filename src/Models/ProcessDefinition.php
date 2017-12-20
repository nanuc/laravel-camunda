<?php

namespace Wertmenschen\CamundaApi\Models;


class ProcessDefinition extends CamundaModel
{
    protected $key;

    public function startInstance()
    {
        $tenant = strlen(config('camunda.api.tenant-id')) ? '/tenant-id/' . config('camunda.api.tenant-id') : '';
        $processDefinition = $this->post('process-definition/key/' . $this->key . $tenant . '/start');
        return new ProcessInstance($processDefinition->id);
    }

    public static function byKey($key)
    {
        $processDefinition = new self;
        $processDefinition->key = $key;
        return $processDefinition;
    }
}
