<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HandleAwsEventCommand extends Command
{
    protected $signature = 'vapor:handle {payload}';

    protected $description = 'Handle AWS event';

    public function handle()
    {
        info('vapor:handle executing!');

        $payload = json_decode(
            base64_decode($this->argument('payload'))
        );

        info(print_r($payload, true));
    }
}
