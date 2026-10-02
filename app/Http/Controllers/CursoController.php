<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $dados = Curso::All();

        return view('curso.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('curso.form');
    }


    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'requisito' => 'nullable|string',
            'carga_horaria' => 'nullable|numeric',
            'valor' => 'nullable|numeric',
        ], [
            'nome.required' => "O :attribute é obrigatorio",
            'requisito.string' => "O :attribute deve ser caracter",
            'carga_horaria.numeric' => "O :attribute deve ser númerico",
            'valor.numeric' => "O :attribute deve ser númerico",
        ]);
    }

    function store(Request $request)
    {
        //dd($request->all());
        $this->validateForm($request);

        $data = $request->all();

        Curso::create($data);

        return redirect('curso')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Curso::find($id);

        // dd($categorias);
        return view('curso.form')->with(compact('data'));
    }

    function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validateForm($request);

        $data = $request->all();

        Curso::find($id)->update($data);

        return redirect('curso')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        // dd($curso->matriculas->count());

        if ($curso->matriculas->count() > 0) {
            return redirect('curso')->with("error", "Não é possível remover o
                    curso $curso->nome, pois existem dados associados a ele!");
        }
        Curso::destroy($id);

        return redirect('curso')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Curso::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Curso::All();
        }

        return view('curso.list', compact('dados'));
    }
}
