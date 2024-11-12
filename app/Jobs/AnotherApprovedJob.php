<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;

class AnotherApprovedJob
{
    public function performTask($param1, $param2)
    {
        Log::info("Performing task in AnotherApprovedJob with parameters: $param1, $param2");

        // Simulate some job processing logic
        return "Result from AnotherApprovedJob with $param1 and $param2";
    }
}
