<?php

namespace Nanuc\Camunda\Models;

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
        // At least one value must be set...
        if(count($data) == 0) {
            $data['a'] = 'b';
        }

        $processDefinition = $this->post('start', $data, true);
        return new ProcessInstance($processDefinition->id);
    }
    
    public function xml()
    {
        return $this->get('xml')->bpmn20Xml;
    }
}
