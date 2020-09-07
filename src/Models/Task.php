<?php

namespace Wertmenschen\CamundaApi\Models;

class Task extends CamundaModel
{
    public function complete()
    {
        $this->post('complete');
    }

    public function getList($filters = [], $maxResults = 100, $firstResult = 0)
    {
        return $this->post("task?firstResult=$firstResult&maxResults=$maxResults", $filters, true);
    }
}