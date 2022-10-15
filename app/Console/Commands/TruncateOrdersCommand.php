<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class TruncateOrdersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncates/Clears Orders Table Of Entries';


    public function handle(): void
    {
        Order::truncate();
        echo 'Orders Table Truncated!';
    }
}
