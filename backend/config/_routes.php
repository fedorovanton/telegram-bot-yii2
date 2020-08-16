<?php

return [
    [
        'pattern' => '<controller>/<action>/<id:\d+>',
        'route'   => '<controller>/<action>',
    ],
    [
        'pattern' => '<controller>/<action>',
        'route'   => '<controller>/<action>',
    ],
    [
        'pattern' => '<module>/<controller>/<action>/<id:\d+>',
        'route'   => '<module>/<controller>/<action>',
    ],
    [
        'pattern' => '<module>/<controller>/<action>',
        'route'   => '<module>/<controller>/<action>',
    ],

    '' => 'site/index',
];
