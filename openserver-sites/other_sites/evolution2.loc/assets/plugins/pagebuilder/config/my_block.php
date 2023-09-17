<?php

return [
    'title' => 'All fields',

    'fields' => [
        'text' => [
            'caption' => 'Text',
            'type'    => 'text',
        ],

        'dropdown' => [
            'caption'  => 'Dropdown',
            'type'     => 'dropdown',
            'elements' => '@SELECT pagetitle, id FROM [+PREFIX+]site_content WHERE parent = 0 ORDER BY pagetitle LIMIT 10',
            'default'  => '@SELECT id FROM [+PREFIX+]site_content WHERE parent = 0 ORDER BY pagetitle LIMIT 1',
        ],

        'textarea' => [
            'caption' => 'Textarea',
            'type'    => 'textarea',
            'default' => 'Default content for textarea',
            'height'  => '80px',
        ],

        'richtext' => [
            'caption' => 'Richtext',
            'type'    => 'richtext',
            'default' => 'Default content for richtext',
            'theme'   => 'mini',
            'options' => [
                'height' => '80px',
            ],
        ],

        'image' => [
            'caption' => 'Image',
            'type'    => 'image',
        ],

        'file' => [
            'caption' => 'File',
            'type'    => 'file',
        ],

        'date' => [
            'caption' => 'Date',
            'type'    => 'date',
        ],

        'checkbox' => [
            'caption'  => 'Checkbox',
            'type'     => 'checkbox',
            'layout'   => 'horizontal',
            'elements' => [
                0 => 'No',
                1 => 'First',
                2 => 'Second',
            ],
            'default' => [ 1, 2 ],
        ],

        'radio' => [
            'caption'  => 'Radio',
            'type'     => 'radio',
            'layout'   => 'horizontal',
            'elements' => 'No==0||First==1||Second==2',
            'default'  => 1,
        ],
    ],
];


