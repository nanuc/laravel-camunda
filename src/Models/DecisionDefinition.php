<?php

namespace Wertmenschen\CamundaApi\Models;


class DecisionDefinition extends CamundaModel
{
    public function evaluate($variables)
    {
        return $this->post('evaluate', ['json' => compact('variables')], true);
    }

    public function getDefinition()
    {
        return $this->get('');
    }
}
