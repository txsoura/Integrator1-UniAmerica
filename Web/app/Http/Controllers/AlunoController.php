<?php

namespace App\Http\Controllers;

use App\Aluno;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AlunoController extends Controller
{

    public function funcionario()
    {
        $alunos=Aluno::where('nivel','!=','0')->get();
        return view('funcionario.verAluno')->with('alunos', $alunos);
    }
    
    public function cadastrar(Request $request)
    {
        $aluno=new Aluno();

        $aluno->name=$request->input('name');
        $aluno->email=$request->input('email');
        $aluno->password= Hash::make($request->input('password'));
        $aluno->contato=$request->input('contato');
        $aluno->foto=$request->input('foto');
        $aluno->digital=$request->input('digital');
        $aluno->endereco=$request->input('endereco');
        $aluno->estado=$request->input('estado');
        $aluno->cidade=$request->input('cidade');
        $aluno->curso=$request->input('curso');
        
        $aluno->save();
            
        return redirect('/home')->with('Parabéns', 'Aluno cadastrado.');
    }
}
