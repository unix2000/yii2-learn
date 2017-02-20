<?php
return [
    '/' => 'site/index',
    'about' => 'site/about',
    'news/index' => 'news/index',
    'news/<slug:(\w|-)+>' => 'news/view',
    [
        'pattern' => 'route/<types:.*>',
        'route' => 'route/types',
        'encodeParams' => true,
    ],
    '<alias:abc>' => 'tests/test',
    'page/<alias>' => 'tests/test',
];