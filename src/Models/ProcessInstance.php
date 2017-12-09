<?php

namespace Wertmenschen\CamundaApi\Models;


class ProcessInstance extends CamundaModel
{

    public function currentTask()
    {
        $tasks = $this->get('task/?processInstanceId=' . $this->id);
        return count($tasks) > 0 ? new Task($tasks[0]->id, $tasks[0]) : null;
    }

    public function setVariable($key, $value, $type = 'String')
    {
        $this->put('variables/' . $key, [
            'type' => $type,
            'value' => $value
        ]);
    }
    
    public function getVariable($key)
    {
        return $this->get('variables/' . $key);
    }

    public function getVariables()
    {
        return get_object_vars($this->get('variables'));
    }

    public function ended()
    {
        return $this->get('history/process-instance/?processInstanceId=' . $this->id)[0]->state == 'COMPLETED';
    }
}
