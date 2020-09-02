<?php

namespace Wertmenschen\CamundaApi\Models;

class Job extends CamundaModel
{
    public function getInfo()
    {
        return $this->get('');
    }

    public function getList()
    {
        return $this->get('job');
    }
}
