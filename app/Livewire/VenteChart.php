<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Component;

class VenteChart extends Component
{
    public $labels = [];
    public $data = [];

    public function mount()
    {
        $stats = Sale::selectRaw('DATE(created_at) as date, SUM(total) as total')
                     ->groupBy('date')
                     ->orderBy('date', 'asc')
                     ->get();

        $this->labels = $stats->pluck('date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d/m'))->toArray();
        $this->data = $stats->pluck('total')->toArray();
    }

    public function render()
    {
        return view('livewire.vente-chart');
    }
}
