<?php

function runBackgroundJob($jobClassName, $jobMethod, $params = [])
{
    $command = 'php ' . base_path() . '/artisan async:run ' . $jobClassName . ' ' . $jobMethod . ' ' . json_encode($params);
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        pclose(popen("start /B " . $command, "r"));
    } else {
        exec($command . " > /dev/null &");
    }
}
