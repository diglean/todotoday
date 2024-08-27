<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public ?User $user = null;

    public function mount(?string $user_id = null)
	{
		if ( ! is_null($user_id)) {
			$user = User::find($user_id);

			if ( ! $user) {
                return redirect("/");
			}

            $this->user = $user;

			return session()->flash('user_data', $this->user);
		}
	}

    public function render()
    {
        return view('livewire.index')->layout('livewire.layouts.app', ['user_id' => $this->user?->id]);
    }
}
