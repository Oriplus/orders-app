<?php

namespace App\Jobs;

use App\Models\OrderLine;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateTotalCost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $totalCost = OrderLine::with('product')
            ->get()
            ->sum(function ($orderLine) { 
                return $orderLine->qty * $orderLine->product->cost; 
            });

        info("Orders Cost Total: {$totalCost}");
    }
}