<?php

namespace Wertmenschen\CamundaApi\Models;

class ProcessDefinition extends CamundaModel
{
    public static function byKey($key)
    {
        $processDefinition = new self;
        $processDefinition->key = $key;
        return $processDefinition;
    }
    
    public function startInstance($data = [])
    {
        $processDefinition = $this->post('start', $data, true);
        return new ProcessInstance($processDefinition->id);
    }
    
    public function xml()
    {
        return $this->get('xml')->bpmn20Xml;
    }
}
