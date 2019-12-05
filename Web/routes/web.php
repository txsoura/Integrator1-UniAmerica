<?php

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
    return view('auth.login');
});

Route::get('/sair', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::get('/home/aluno/cadastrar', function () {
    return view('funcionario.cadastroAluno');
});

Route::get('/home/dispositivo/cadastrar', function () {
    return view('funcionario.cadastroDispositivo');
});

Route::post('/home/dispositivo/criar', 'DispositivoController@cadastrar');
Route::post('/home/aluno/criar', 'AlunoController@cadastrar');

Route::get('/home/aluno/visualizar', 'AlunoController@funcionario');
Route::get('/home/dispositivo/visualizar', 'DispositivoController@funcionario');
Route::get('/home/requisicao/visualizar', 'RequisicaoController@funcionario');

Route::get('/home/dispositivo/apagar', 'DispositivoController@apagar');
Route::post('/home/dispositivo/atualizar', 'DispositivoController@atualizar');
Route::get('/home/dispositivo/editar', 'DispositivoController@editar');

Route::get('/home/aluno/editar', 'AlunoController@editar');
Route::post('/home/aluno/atualizar', 'AlunoController@atualizar');
Route::get('/home/aluno/apagar', 'AlunoController@apagar');

Route::get('/home/requisicao', 'RequisicaoController@aluno');
Route::get('/home/dispositivo', 'RequisicaoController@verificar');

Route::get('/home/dispositivo/devolver', 'DispositivoController@devolver');
