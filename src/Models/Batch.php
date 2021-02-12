<?php

namespace Nanuc\Camunda\Models;

class Batch extends CamundaModel
{
    public function getInfo()
    {
        return $this->get('');
    }

    public function getList()
    {
        return $this->get('batch');
    }

    public function batchCount()
    {
        return $this->get('batch/count');
    }

    public function statistics()
    {
        return $this->get('batch/statistics');
    }

    public function deleteBatch($cascade = true)
    {
        return $this->delete('batch/' . $this->id . '?cascade=' . $cascade);
    }
}
