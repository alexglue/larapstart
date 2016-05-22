<?php

return [
    'search' => [
        'smart'            => true,
        'case_insensitive' => true,
        'use_wildcards'    => false,
    ],

    'fractal' => [
        'serializer' => League\Fractal\Serializer\DataArraySerializer::class,
    ],

    'script_template' => 'admin.common.datatables.script',
];
