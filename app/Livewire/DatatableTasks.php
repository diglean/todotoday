<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DatatableTasks extends Component
{
    use WithPagination;

    public $user_id;
    public $title;
    public $data = [];

    public function mount($user_id, $title)
    {
        if ($user_id) {
          $this->user_id = $user_id;
        }

        if ($title) {
            $this->title = $title;
        }
    }

    protected function getTasks($user_id)
    {
      return Task::whereAssignedTo($user_id)->select([
        'id',
        'name',
        'category',
        'description',
        'created_at',
        'overdue_date',
        'status'
      ])->paginate(5);
    }

    public function render()
    {
        return view('livewire.datatable-tasks', [
          'table_data' => $this->getTasks($this->user_id)
        ])->layout('livewire.layouts.app', ['user_id' => $this->user_id]);
    }
}
