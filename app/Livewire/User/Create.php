<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;

    protected $user_id;

    public function createUser()
    {
        $validated_data = $this->validate(
          rules: [
            'name' => ['required', 'string', 'max:45'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'confirm_password' => ['required', 'same:password'],
          ],
          messages: [
            'name.required' => 'Nome é obrigatório!',
            'name.max' => 'Nome inválido! (Máx 45 carac.)',
            'email.required' => 'Email é obrigatório!',
            'email.email' => 'Email inválido!',
            'email.unique' => 'Email já em uso!',
            'password.required' => 'Senha é obrigatório!',
            'password.min' => 'Senha inválida! (Min 6 carac.)',
            'confirm_password.required' => 'Confirme a senha!',
            'confirm_password.same' => 'Senhas não condizem!',
          ],
        );

        User::create([
            'name' => $validated_data['name'],
            'email' => $validated_data['email'],
            'password' => Hash::make($validated_data['password']),
            'profile_picture_url' => 'https://avatars.githubusercontent.com/u/72869261?v=4',
        ]);

        return redirect()->to('/user/login');
    }

    public function render()
    {
        return view('livewire.user.create')->layout('livewire.layouts.app', ['user_id' => $this->user_id]);
    }
}
