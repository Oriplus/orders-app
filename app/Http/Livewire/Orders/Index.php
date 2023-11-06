<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;

    public function render()
    {
        $orders = Order::with(['orderLines'])->paginate($this->perPage);

        return view('livewire.orders.index', [
            'orders' => $orders
        ]);
    }
}
