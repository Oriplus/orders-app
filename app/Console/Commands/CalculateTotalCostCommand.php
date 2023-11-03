<?php

namespace App\Console\Commands;

use App\Jobs\CalculateTotalCost;
use Illuminate\Console\Command;

class CalculateTotalCostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:totalCost';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate the total of all orders.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Init job to calculate total cost of all orders.');
        CalculateTotalCost::dispatch();
    }
}
