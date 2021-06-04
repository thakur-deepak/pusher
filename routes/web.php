<?php

use App\Events\Taskcreated;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Route::any(
    '/tasks',
    function () {
        $task = Task::create(['body' => Str::random(15)]);
        event(new Taskcreated($task));
    }
);
