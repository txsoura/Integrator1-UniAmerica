<?php

namespace App\Http\Controllers;

use App\Dispositivo;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\RequisicaoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    public function editar(Request $request)
    {
        $d = $request->input('d');
        $dispositivo = Dispositivo::find($d);

        return view('funcionario.editarDispositivo')->with('dispositivo', $dispositivo);
    }

    public function atualizar(Request $request)
    {
        $d = $request->input('d');
        $dispositivo = Dispositivo::find($d);
        $dispositivo->tipo = $request->input('tipo');
        $dispositivo->curso = $request->input('curso');
        $dispositivo->disponivel = $request->input('disponivel');

        $dispositivo->save();

        return redirect('/home/dispositivo/visualizar')->with('Parabéns', 'Dispositivo atualizado.');
    }

    public function apagar(Request $request)
    {
        $d = $request->input('d');
        $dispositivo = Dispositivo::find($d);
        $dispositivo->delete();
        return redirect('/home/dispositivo/visualizar')->with('Obrigado', 'Dispositivo apagado com sucesso.');
    }

    public function requisitar(Request $request)
    {
        $d = $request->input('d');
        $dispositivo = Dispositivo::find($d);
        $dispositivo->disponivel = 2;

        $dispositivo->save();

        $requisicao = new RequisicaoController();
        return $requisicao->requisitar($d);
    }

    public function devolver(Request $request)
    {
        $d = $request->input('d');
        $r = $request->input('r');
        $dispositivo = Dispositivo::find($d);
        $dispositivo->disponivel = 1;

        $dispositivo->save();

        $requisicao = new RequisicaoController();
        return $requisicao->devolver($r);
    }

    public function cadastrar(Request $request)
    {
        $dispositivo = new Dispositivo;
        $dispositivo->tipo = $request->input('tipo');
        $dispositivo->curso = $request->input('curso');
        $dispositivo->disponivel = $request->input('disponivel');

        $dispositivo->save();

        return redirect('/home/dispositivo/visualizar')->with('Parabéns', 'Dispositivo cadastrado.');
    }

    public function funcionario()
    {
        $dispositivos = Dispositivo::all();

        return view('funcionario.verDispositivo')->with('dispositivos', $dispositivos);
    }

    public function aluno()
    {
        $r = Session::get('r');
        $dispositivos = null;
        if (count($r) > 0) {

            return view('aluno.verDispositivo')->with('dispositivos', $dispositivos);
        } else {
            $dispositivos = Dispositivo::where('disponivel', 1)
                ->Where(function ($c) {
                    $c->where('curso', 'Todos')
                        ->orWhere('curso', Auth::user()->curso);
                })->get();

            return view('aluno.verDispositivo')->with('dispositivos', $dispositivos);
        }
    }
}
