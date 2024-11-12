<?php

use App\Jobs\AnotherApprovedJob;
use App\Jobs\SomeApprovedJob;

return [
    'classes' => [
        SomeApprovedJob::class,
        AnotherApprovedJob::class,
    ]
];
