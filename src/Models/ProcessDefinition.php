<?php

namespace Wertmenschen\CamundaApi\Models;


class ProcessDefinition extends CamundaModel
{
    protected $key;

    public function startInstance()
    {
        $processDefinition = $this->post('process-definition/key/' . $this->key . '/start');
        return new ProcessInstance($processDefinition->id);
    }

    public static function byKey($key)
    {
        $processDefinition = new self;
        $processDefinition->key = $key;
        return $processDefinition;
    }
}