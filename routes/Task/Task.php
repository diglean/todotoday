<?php

namespace Routes\Task;

use App\Livewire\Task\Create;
use Illuminate\Support\Facades\Route;

Route::get('task/create', Create::class);
Route::get('task/create/{user_id}', Create::class);
Route::get('task/create/{task_id}/{user_id}', Create::class);