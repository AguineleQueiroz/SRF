<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\FichaAtendimentoController;
use App\Http\Controllers\HistoricoEncaminhamentoController;
use App\Http\Controllers\pacientesController;
use App\Http\Controllers\PatientSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar as rotas web para a sua aplicação.
| Essas rotas são carregadas pelo RouteServiceProvider e todas elas
| serão atribuídas ao grupo de middleware "web". Vamos lá!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Rota para a dashboard
Route::get('/dashboard', [AtendimentoController::class, 'listarAtendimentos'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/privacy-policy', function () {
    // Lógica para exibir a página de Política de Privacidade
    return view('privacidade');
})->name('privacy.policy');

Route::get('/psi', function () {
    // Lógica para exibir a página de PSI
    return view('psi');
})->name('psi.policy');

// Termos de uso
Route::get('/terms', [App\Http\Controllers\TermsController::class, 'show'])->name('terms.show');
Route::post('/terms', [App\Http\Controllers\TermsController::class, 'accept'])->name('terms.accept');
Route::post('/terms-decline', [App\Http\Controllers\TermsController::class, 'declineTerms'])->name('terms.declineTerms');


Route::middleware('auth', 'terms.accepted')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [AtendimentoController::class, 'listarAtendimentos'])->name('dashboard');
    Route::get('/listar_fichas_paciente/{id}', [AtendimentoController::class, 'listar_fichas_paciente'])->name('listar_fichas_paciente');


    // Rotas para exibir e salvar dados do formulário
    Route::post('/salvar-dados', [AtendimentoController::class, 'salvarDados'])->name('SalvarDados');
    Route::get('/formprimario', [AtendimentoController::class, 'renderizarView'])->name('formprimario');
    Route::post('/encaminhar', [AtendimentoController::class, 'encaminhar'])->name('encaminhar');
    Route::post('/atendimentos/{id}/edit', [AtendimentoController::class, 'edit'])->name('edit');



Route::get('/historico-encaminhamentos', [HistoricoEncaminhamentoController::class, 'index'])
    ->name('historico-encaminhamentos.index');


    // ============= Pacientes
    Route::get('/editar_paciente/{id}', [pacientesController::class, 'edit'])->name('editar_paciente');
    Route::post('/atualizar_paciente/{id}', [pacientesController::class, 'update'])->name('atualizar_paciente');


    Route::post('/patient_sessions', [PatientSessionController::class, 'store']);

    Route::resource('ficha_atendimento', FichaAtendimentoController::class);

});

require __DIR__.'/auth.php';
