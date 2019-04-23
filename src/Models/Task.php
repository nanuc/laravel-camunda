<?php

namespace Wertmenschen\CamundaApi\Models;

class Task extends CamundaModel
{
    public function complete()
    {
        $this->post('complete');
    }
}