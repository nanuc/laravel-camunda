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
}
