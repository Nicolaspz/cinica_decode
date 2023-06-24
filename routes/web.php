<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect("/login");
});

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/especialidades', [App\Http\Controllers\admin\EspecialidadeController::class, 'index']);
    Route::get('/especialidades/create', [App\Http\Controllers\admin\EspecialidadeController::class, 'create']);
    Route::get('/especialidades/{especialidade}/edit', [App\Http\Controllers\admin\EspecialidadeController::class, 'edit']);
    Route::post('/especialidades', [App\Http\Controllers\admin\EspecialidadeController::class, 'sendData']);
    Route::put('/especialidades/{especiali}/edit/update', [App\Http\Controllers\admin\EspecialidadeController::class, 'Update']);
    Route::delete('/especialidades/{especiali}', [App\Http\Controllers\admin\EspecialidadeController::class, 'delete'])->name('delete');

    // Docotors ----
    Route::get('/doctors', [App\Http\Controllers\admin\DoctorController::class, 'index']);
    Route::get('/doctors/create', [App\Http\Controllers\admin\DoctorController::class, 'create']);
    Route::get('/doctors/{id}/edit', [App\Http\Controllers\admin\DoctorController::class, 'edit'])->name('edit');
    Route::post('/doctors', [App\Http\Controllers\admin\DoctorController::class, 'sendData']);
    Route::put('/doctors/{id}/edit/update', [App\Http\Controllers\admin\DoctorController::class, 'Update']);
    Route::delete('/doctors/{id}', [App\Http\Controllers\admin\DoctorController::class, 'delete'])->name('doctor.delete');


    // pacient ----
    Route::get('/pacients', [App\Http\Controllers\admin\PacienteController::class, 'index']);
    Route::get('/pacients/create', [App\Http\Controllers\admin\PacienteController::class, 'create']);
    Route::get('/pacients/{id}', [App\Http\Controllers\admin\PacienteController::class, 'edit'])->name('pacient.edit');
    Route::post('/pacients', [App\Http\Controllers\admin\PacienteController::class, 'sendData']);
    Route::put('/pacients/{id}', [App\Http\Controllers\admin\PacienteController::class, 'Update'])->name('pacient.update');
    Route::delete('/pacients/{id}', [App\Http\Controllers\admin\PacienteController::class, 'delete'])->name('pacient.delete');

});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//especialidades
Route::middleware(['auth', 'doctor'])->group(function(){
    Route::get('/horario', [App\Http\Controllers\doctor\HorarioController::class, 'edit']);
    Route::post('/horario/store', [App\Http\Controllers\doctor\HorarioController::class, 'store']);


});
//AppointmentController


Route::middleware('auth')->group(function(){
    Route::get('/reservas_consult/create', [App\Http\Controllers\AppointmentController::class, 'create']);
    Route::post('/reservas', [App\Http\Controllers\doctor\HorarioController::class, 'store']);
    Route::post('/reservar', [App\Http\Controllers\AppointmentController::class, 'store'])->name('reservar.cita');
    Route::get('/reservar', [App\Http\Controllers\AppointmentController::class, 'index']);


    Route::post('/especialidades/{id}', [App\Http\Controllers\doctor\HorarioController::class, 'doctors'])->name('doctors');

    Route::get('/especilidd_doctors/{id}', [App\Http\Controllers\Api\EspecialidadeController::class, 'doctors']);

});
Route::get('/horario/horas', [App\Http\Controllers\Api\HorasController::class, 'hora'])->name('hora');
