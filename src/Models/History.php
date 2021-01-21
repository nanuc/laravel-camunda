<?php

namespace Wertmenschen\CamundaApi\Models;

class History extends CamundaModel
{
    public function findCleanupHistoryJobs()
    {
        return $this->get('history/cleanup/jobs');
    }

    public function getHistoryCleanupConfiguration()
    {
        return $this->get('history/cleanup/configuration');
    }

    public function findCleanupHistoryJob()
    {
        return $this->get('history/cleanup/job');
    }

    public function cleanupHistory()
    {
        return $this->post('history/cleanup');
    }

    public function processInstancesCount()
    {
        return $this->get('history/process-instance/count');
    }

    public function processInstances()
    {
        return $this->get('history/process-instance');
    }

    public function deleteProcessInstance($processInstanceId)
    {
        return $this->delete('history/process-instance/'.$processInstanceId);
    }

    public function deleteProcessInstances($processInstanceIds, $deleteReason = 'none')
    {
        return $this->post('history/process-instance/delete', [
            'historicProcessInstanceIds' => $processInstanceIds,
            'deleteReason' => $deleteReason
        ], true);
    }
}
