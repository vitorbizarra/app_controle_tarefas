<?php

use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
    return view('bem-vindo');
});

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
// ->name('home')->middleware('verified');

// Atribuindo o middleware Auth diretamente pelas rotas
// Route::resource('tarefa', App\Http\Controllers\TarefaController::class)->middleware('auth');

Route::get('tarefa/exportacao/{ext}', [App\Http\Controllers\TarefaController::class, 'exportacao'])->name('tarefa.exportacao');

Route::get('tarefa/exportar', [App\Http\Controllers\TarefaController::class, 'exportar'])->name('tarefa.exportar');

Route::resource('tarefa', App\Http\Controllers\TarefaController::class)->middleware('verified');

Route::get('/mensagem-teste', function () {
    return new MensagemTesteMail();
    // Mail::to('vitor@makeweb.com.br')->send(new MensagemTesteMail());
    // return 'Email enviado com sucesso';
})->middleware('verified');
