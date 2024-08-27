<?php

namespace Routes\Task;

use App\Livewire\User\Create;
use App\Livewire\User\Login;
use Illuminate\Support\Facades\Route;

Route::get('user/create', Create::class);
Route::get('user/login', Login::class);