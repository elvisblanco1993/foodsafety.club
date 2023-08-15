<?php

namespace App\Http\Livewire\Recall;

use App\Models\Recall;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $modal;

    public function render()
    {
        return view('livewire.recall.index', [
            'recalls' => Recall::orderBy('report_date', 'DESC')->paginate(15),
        ]);
    }
}
