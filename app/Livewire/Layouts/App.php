<?php

namespace App\Livewire\Layouts;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class App extends Component
{
	public User $user;

    public function mount(?string $user_id = null)
    {
        if ( ! is_null($user_id)) {
            $user = User::find($this->user_id);
      
            if ( ! $user) {
                // Retornar que o usuário não foi encontrado em base.
            }

			$this->user = $user;
      
            session()->flash('user_data', $this->user);
        }
    }

    public function render()
    {
        return view('livewire.layouts.app');
    }
}
