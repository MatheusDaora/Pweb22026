<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\CategoriaAluno;

class AlunoController extends Controller
{
    public function index()
    {
        $dados = Aluno::All();

        return view('aluno.list')->with(['dados' => $dados]);
    }

    function create()
    {
        $categorias = CategoriaAluno::orderBy('nome')->get();

        return view('aluno.form', compact('categorias'));
    }


    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'categoria_id' => 'required',
        ], [
            'nome.required' => "O :attribute é obrigatorio",
            'cpf.required' => "O :attribute é obrigatorio",
            'categoria_id.required' => "O :attribute é obrigatorio"
        ]);
    }

    function store(Request $request)
    {
        //dd($request->all());
        $this->validateForm($request);

        Aluno::create($request->all());

        return redirect('aluno')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Aluno::find($id);
        $categorias = CategoriaAluno::orderBy('nome')->get();

        // dd($data);
        //return view('aluno.form')->with(['data' => $data]);
        return view('aluno.form', [
            compact('data'),
            compact('categorias'),
        ]);
    }


    function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validateForm($request);

        Aluno::find($id)->update($request->all());

        return redirect('aluno')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        Aluno::destroy($id);

        return redirect('aluno')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Aluno::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Aluno::All();
        }

        return view('aluno.list', compact('dados'));
    }
}
