<?php

namespace App\Http\Controllers;

use App\Requisicao;
use Illuminate\Support\Facades\Auth;

class RequisicaoController extends Controller
{
    public function devolver($r)
    {
        $requisicao = Requisicao::find($r);
        $requisicao->estado = 2;

        $requisicao->save();

        return redirect('/home/requisicao/visualizar')->with('Parabéns', 'Dispositivo devolvido.');
    }

    public function requisitar($d,$a)
    {
        $requisicao = new Requisicao;
        $requisicao->aluno_id = $a;
        $requisicao->dispositivo_id = $d;

        $requisicao->save();

        return 200;
    }

    public function funcionario()
    {
        $requisicoes = Requisicao::all();

        return view('funcionario.verRequisicao')->with('requisicoes', $requisicoes);
    }

    public function aluno()
    {
        $id = Auth::user()->id;
        $requisicoes = Requisicao::where('aluno_id', $id)->get();

        return view('aluno.verRequisicao')->with('requisicoes', $requisicoes);
    }

    public function verificar()
    {
        $id = Auth::user()->id;
        $r = Requisicao::where('aluno_id', $id)
            ->Where('estado', 1)->get();
        $dispositivo = new DispositivoController();
        session(['r' => $r]);

        return $dispositivo->aluno();
    }
}
