<?php
return [
    'adminEmail' => 'admin@example.com',
    'cronJobs' =>[
        'test/example1' => [
        'cron'      => '* * * * *',
        ],
        'test/example2' => [
            'cron'      => '10 * * * *',
        ],
    
    ],
];
