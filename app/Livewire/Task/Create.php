<?php

namespace App\Livewire\Task;

use App\Domain\Task\Enums\TaskCategory;
use App\Domain\Task\Enums\TaskStatus;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class Create extends Component
{
    public $task_id;
    public $name;
    public $category = 'feature';
    public $description;
    public $user_id = null;
    public $status = 'pending';
    public $created_by;
    public $overdue_date;

	public ?User $user = null;

    public function createTask()
    {
        $validated_data = $this->validateData();

        $date = Carbon::createFromFormat('Y-m-d', $validated_data['overdue_date'])->setTime(23, 59, 59);

        if ($date->lt(Carbon::now())) {
            $this->dispatch('toast:error',
              message: 'Data de vencimento não pode ser menor que data atual!'
            );

            return false;
        }

        $task = Task::create([
            'name' => $validated_data['name'],
            'category' => $validated_data['category'],
            'description' => $validated_data['description'],
            'assigned_to' => $validated_data['user_id'] ?? 1,
            'created_by' => $validated_data['user_id'] ?? 1,
            'overdue_date' => $validated_data['overdue_date'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $this->dispatch('toast:success',
          message: 'Tarefa criada com sucesso'
        );

		if ( ! is_null($this->user_id)) {
			return $this->redirect("/task/create/{$task->id}/{$this->user->id}");
		}

		return $this->redirect("/task/create/{$task->id}/1");
    }

	public function updateTask()
	{
		$validated_data = $this->validateData(isUpdate: true);

        $date = Carbon::createFromFormat('Y-m-d', $validated_data['overdue_date'])->setTime(23, 59, 59);

        if ($date->lt(Carbon::now())) {
            $this->dispatch('toast:error',
              message: 'Tarefa criada com sucesso'
            );

            return false;
        }

		Task::find($validated_data['task_id'])->update([
			'name' => $validated_data['name'],
            'category' => $validated_data['category'],
            'description' => $validated_data['description'],
            'status' => $validated_data['status'],
			'overdue_date' => $validated_data['overdue_date'],
			'updated_at' => Carbon::now(),
		]);

        $this->dispatch('toast:success',
          message: 'Tarefa atualizada com sucesso'
        );
	}

    public function deleteTask()
    {
        Task::find($this->task_id)->update([
            'status' => TaskStatus::Canceled,
            'updated_at' => Carbon::now(),
        ]);

		$this->redirect("/{$this->user->id}");

		return $this->dispatch('toast:success',
            message: 'Tarefa excluída com sucesso',
      	);
    }

    public function mount(?string $user_id = null, ?string $task_id = null)
    {
		if ( ! is_null($user_id)) {
            $user = User::find($user_id);

            if ( ! $user) {
                return redirect("/{$user_id}");
            }

            $this->user = $user;

            session()->flash('user_data', $this->user);
        }

		if ( ! is_null($task_id)) {
			$this->$task_id = $task_id;

			$task = Task::find($task_id);

			if ( ! $task) {
				$this->dispatch('toast:error', message: 'Tarefa não encontrada.');

				sleep(2);

				if ( ! is_null($this->user_id)) {
					return $this->redirect("/{$this->user->id}");
				}
		
				return $this->redirect("/");
			}

			$this->name = $task->name;
			$this->category = $task->category;
			$this->description = $task->description;
			$this->user_id = $task->assigned_to;
			$this->created_by = $task->created_by;
			$this->overdue_date = Carbon::parse($task->overdue_date)->format('Y-m-d');
		}
    }

    public function render(?string $user_id = null)
    {
        $user_id = session()->get('user_data.user.id');

        if ($user_id) {
          $this->user_id = $user_id;
        }

        return view('livewire.task.create')->layout('livewire.layouts.app', ['user_id' => $this->user_id]);
    }

	protected function validateData(bool $isUpdate = false)
	{
		$update_rules = [];

		$update_messages = [];

		if ($isUpdate) {
			$update_rules['task_id'] = ['required', 'integer', 'min:1'];
			$update_messages['task_id.required'] = 'Tarefa não encontrada!';
			$update_messages['task_id.*'] = 'Tarefa inválida!';
			
			$update_rules['status'] = ['required', new Enum(TaskStatus::class)];
			$update_rules['status.required'] = 'Status é obrigatório!';
			$update_rules['status.*'] = 'Estado inválido!';
		}

		$validated_data = $this->validate(
			rules: [
              'name' => ['required', 'string', 'max:30'],
              'category' => ['required', new Enum(TaskCategory::class)],
              'description' => ['required', 'string', 'max:100'],
              'user_id' => ['nullable', 'int', 'min:1'],
              'overdue_date' => ['required', 'date_format:Y-m-d'],
			  ...$update_rules
            ],
			messages: [
              'name.required' => 'Nome é obrigatório!',
              'name.max' => 'Nome inválido! (Máx 30 carac.)',
              'category.required' => 'Categoria é obrigatório!',
              'category.in' => 'Categoria inválida!',
              'description.required' => 'Descrição é obrigatório!',
              'description.max' => 'Descrição inválida! (Máx 100 carac.)',
              'user_id.min' => 'Usuário inválido!',
              'overdue_date.required' => 'Data de vencimento é obrigatório!',
              'overdue_date.date_format' => 'Formato de data inválido!',
			  ...$update_messages
            ],
		);

		return $validated_data;
	}
}
