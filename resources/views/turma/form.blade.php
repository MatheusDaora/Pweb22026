@extends('main')
@section('titulo', 'Formulário de Cursos')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('curso.update', $data->id);
            } else {
                $action = route('curso.store');
            }
        @endphp

        <h4>Formulário Curso</h4>
        <form action="{{ $action }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">
            <input type="hidden" name="curso_id" value="{{ old('curso_id',isset($data) ? $data->curso_id : $curso_id ) }}">
            <div class="col-6">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $data->nome ?? '') }}">
            </div>
            <div class="col-6">
                <label for="codigo">Código</label>
                <input type="text" name="codigo" class="form-control" value="{{ old('codigo', $data->codigo ?? '') }}">
            </div>
            <div class="col-6">
                <label for="data_inicio">Data de Início</label>
                <input type="date" name="data_inicio" class="form-control"
                    value="{{ old('data_inicio', $data->data_inicio ?? '') }}">
            </div>
            <div class="col-6">
                <label for="data_fim">Data de Fim</label>
                <input type="date" name="data_fim" class="form-control"
                    value="{{ old('data_fim', $data->data_fim ?? '') }}">
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('curso.turmas', isset($data) ? $data->curso_id : $curso_id ) }}" class="btn btn-primary"> Voltar</a>
            </div>
        </form>
    </div>
@stop
