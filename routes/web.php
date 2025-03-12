<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');

    ######################################User Routes############################################
    Route::resource('users', UserController::class);
    Route::get('update/password/{id}', [UserController::class,'updatepassword'])->name('users.update.password');
    Route::put('update_password', [UserController::class,'update_password'])->name('update_password');


    ######################################Task Routes############################################

    Route::resource('tasks', TaskController::class);
    Route::post('update_status', [TaskController::class,'update_status'])->name('update_status');
    Route::get('tasks/user/{userId}', [TaskController::class, 'showTasksByUser'])->name('tasks.showByUser');
    Route::get('/completed_tasks', [DashboardController::class, 'showTasksCompleted'])->name('tasks.completed');
    Route::get('/inProgress_tasks', [DashboardController::class, 'showTasksInProgress'])->name('tasks.inprogress');
    Route::get('/users_inprogress', [DashboardController::class, 'showUsersInProgressTasks'])->name('users.tasks.inprogress');
});



// Route::get('/dashboard', function () {
//     return view('dashboard.tasks.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
