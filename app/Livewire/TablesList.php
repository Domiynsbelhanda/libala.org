<?php

namespace App\Livewire;

use Livewire\Component;

class TablesList extends Component
{
    public $eventId;

    public function render()
    {
        $tables = \App\Models\Table::where('event_id', $this->eventId)->get();

        return view('livewire.tables-list', [
            'tables' => $tables,
        ]);
    }
}
