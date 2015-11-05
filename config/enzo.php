<?php
return [
    'uploads' => [
        'comprovante_aporte' => [
            'disk' => 'local',
            'path' => 'comprovante_aporte/',
            'fullPath' => ''    // apenas a classe Storage reconhece o path incluindo o 'app/'.
        ],                      // Pois está configurado em config/filesystem.php. As demais classe não lê desse arquivo.

    ],
];