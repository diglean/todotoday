<?php

namespace Routes\Task;

use App\Livewire\About\About;
use App\Livewire\Contact\Contact;
use App\Livewire\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class);
Route::get('/{user_id}', Index::class);
Route::get('/about', About::class);
Route::get('/about/{user_id}', About::class);
Route::get('/contact', Contact::class);
Route::get('/contact/{user_id}', Contact::class);