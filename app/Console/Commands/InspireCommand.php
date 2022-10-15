<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class InspireCommand extends Command
{
    protected $description;

    public function __construct()
    {
        parent::__construct();

        $this->description = $this->handle();
    }

    protected $signature = 'inspire:quote';

    public function handle()
    {
        echo Inspiring::quote();
        return null;
    }
}
