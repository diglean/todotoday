<?php

namespace App\Livewire\About;

use App\Models\User;
use Livewire\Component;

class About extends Component
{
    public ?int $user_id = null;

    public function mount(?string $user_id = null)
    {
        if ( ! is_null($user_id)) {
			$user = User::find($user_id);

			if ( ! is_null($user)) {
				$this->user_id = $user->id;
			}
		}
    }

    public function render()
    {
        return view('livewire.about.about')->layout('livewire.layouts.app', ['user_id' => $this->user_id]);
    }
}
