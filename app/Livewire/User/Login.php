<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public User $user;
    public $email;
    public $password;

    public function loginUser()
    {
		$validated_data = $this->validate(
			rules: [
				'email' => ['required', 'email'],
				'password' => ['required', 'string', 'min:6'],
			],
			messages: [
				'email.required' => 'Email é obrigatório!',
				'email.email' => 'Email inválido!',
				'password.required' => 'Senha é obrigatório!',
				'password.min' => 'Senha é inválida!'
			],
		);

		$user = User::whereEmail($validated_data['email'])->first();

		if ( ! $user) {
            $this->dispatch('toast:error',
				message: 'Usuário não encontrado!'
			);

        	return false;
		}

		if (! Hash::check($validated_data['password'], $user->password)) {
			$this->dispatch('toast:error',
				message: 'Usuário ou senha inválido!'
			);

        	return false;
		}

        $this->user = $user;

		session()->flash('user_data', $this->user);

		return redirect()->to("/{$user->id}");
    }
    
    public function render()
    {
        return view('livewire.user.login');
    }
}
