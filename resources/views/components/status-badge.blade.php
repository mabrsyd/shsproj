<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusBadge extends Component
{
    public $status;
    public $type;

    public function __construct($status, $type = 'stock')
    {
        $this->status = $status;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.status-badge');
    }

    public function classes()
    {
        return match($this->status) {
            'Out of Stock' => 'bg-red-100 text-red-800',
            'Low Stock' => 'bg-yellow-100 text-yellow-800',
            'In Stock' => 'bg-green-100 text-green-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
}