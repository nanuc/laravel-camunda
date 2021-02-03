<?php

namespace Nanuc\Camunda\Models;

use Illuminate\Support\Arr;

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
        ], true);
    }

    public function setVariables($modifications, $deletions = [])
    {
        $modificationsArray = [];

        foreach($modifications as $modification) {
            if(!is_array($modification)) {
                $modification = [
                    'key' => $modification
                ];
            }
            $modificationsArray[$modification['key']] = [
                'value' => Arr::get($modification, 'value', 0),
                'type' => Arr::get($modification, 'type', 'String')
            ];
        }

        $this->post('variables', [
            'modifications' => $modificationsArray,
            'deletions' => $deletions
        ], true);
    }

    public function getInfo()
    {
        return $this->get('');
    }
    
    public function getVariable($key)
    {
        return $this->get('variables/' . $key);
    }

    public function getVariables()
    {
        return get_object_vars($this->get('variables'));
    }
    
    public function deleteProcessInstance()
    {
        return $this->delete('');
    }

    public function deleteProcessInstances($processInstanceIds, $deleteReason = 'none')
    {
        return $this->post('process-instance/delete', [
            'processInstanceIds' => $processInstanceIds,
            'deleteReason' => $deleteReason
        ], true);
    }

    public function ended()
    {
        $processInstance = $this->get('history/process-instance/?processInstanceId=' . $this->id);

        if(count($processInstance) == 0) {
            return true;
        }

        return $this->get('history/process-instance/?processInstanceId=' . $this->id)[0]->state == 'COMPLETED';
    }
    
    public function getEndEventId()
    {
        return optional(Arr::first($this->get('history/activity-instance/?processInstanceId=' . $this->id . '&activityType=noneEndEvent')))->activityId;
    }
    
    public function modify($data)
    {
        return $this->post('modification', $data,true);
    }
}
