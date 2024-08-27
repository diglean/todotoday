<?php

namespace App\Livewire\Contact;

use App\Models\User;
use Livewire\Component;

class Contact extends Component
{
    public ?int $user_id = null;

    public function mount(?string $user_id = null)
    {
        if ( ! is_null($user_id)) {
			$user = User::find($user_id);

			if (is_null($user)) {
				if ( ! is_null($this->user_id)) {
					return $this->redirect("/{$this->user_id}");
				}
		
				return $this->redirect("/");
			}
		}
    }

    public function render()
    {
        return view('livewire.contact.contact')->layout('livewire.layouts.app', ['user_id' => $this->user_id]);;
    }
}
