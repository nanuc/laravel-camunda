<?php

namespace Wertmenschen\CamundaApi\Models;


class Deployment extends CamundaModel
{

    public function create($name, $file)
    {
        $filename = pathinfo($file)['basename'];

        $files[] = [
            'name' => $name,
            'contents' => file_get_contents($file),
            'filename' => $filename
        ];

        $multipart = [
            [
                'name' => 'deployment-name',
                'contents' => $name,
            ]
        ];

        $this->post('deployment/create', [
            'multipart' => array_merge($multipart, $files)
        ], true);
    }



}