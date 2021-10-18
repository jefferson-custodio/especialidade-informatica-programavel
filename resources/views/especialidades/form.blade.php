@extends('layouts.app', ['nav'=>true])
<!--  -->
<!--  -->
@section('content')
<div class="form-page">
    <div class="container">
        @if (isset($especialidade))
        <!--  -->
        @section('title', 'Editar especialidade')

        <h2>Editar especialidade #{{$especialidade->id}}</h2>
        @else
        <!--  -->
        @section('title', 'Cadastro de especialidades')
        <h2>Cadastro de especialidades</h2>
        @endif
        <form
            action="{{isset($especialidade) ? '/especialidades/'.$especialidade->id : '/especialidades' }}"
            method="POST"
        >
            @csrf
            <!--  -->
            @if (isset($especialidade)) {{ method_field("PUT") }} @endif
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="nome"
                    name="nome"
                    value="{{isset($especialidade) ? $especialidade->nome : ''}}"
                />
                @if ($errors->has('nome'))
                <div class="text-danger">{{ $errors->first('nome') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Categoria</label>
                <select
                    class="form-control"
                    placeholder="Documento"
                    name="especialidade_categoria_id"
                >
                    @foreach($especialidade_categorias as
                    $especialidade_categoria) @if (isset($especialidade) &&
                    $especialidade->especialidade_categoria_id ==
                    $especialidade_categoria->id)
                    <option value="{{$especialidade_categoria->id}}" selected>
                        {{$especialidade_categoria->nome}}
                    </option>
                    @else
                    <option value="{{$especialidade_categoria->id}}">
                        {{$especialidade_categoria->nome}}
                    </option>
                    @endif @endforeach
                </select>
                @if ($errors->has('especialidade_categoria_id'))
                <div class="text-danger">
                    {{ $errors->first('especialidade_categoria_id') }}
                </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary ml-auto d-block">
                Enviar
            </button>
        </form>
    </div>
</div>
@endsection
<!--  -->
@push('styles')
<style></style>
@endpush
