@extends('layouts.app', ['nav'=>true])
<!--  -->
<!--  -->
@section('content')
<div class="form-page">
    <div class="container">
        @if (isset($desbravador))
        <!--  -->
        @section('title', 'Editar desbravador')

        <h2>Editar desbravador #{{$desbravador->id}}</h2>
        @else
        <!--  -->
        @section('title', 'Cadastro de desbravadores')
        <h2>Cadastro de desbravadores</h2>
        @endif
        <form
            action="{{isset($desbravador) ? '/desbravadores/'.$desbravador->id : '/desbravadores' }}"
            method="POST"
        >
            @csrf
            <!--  -->
            @if (isset($desbravador)) {{ method_field("PUT") }} @endif
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="nome"
                    name="nome"
                    value="{{isset($desbravador) ? $desbravador->nome : ''}}"
                />

                @if ($errors->has('nome'))
                <div class="text-danger">{{ $errors->first('nome') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input
                    type="email"
                    class="form-control"
                    placeholder="Email"
                    name="email"
                    value="{{isset($desbravador) ? $desbravador->email : ''}}"
                />
                @if ($errors->has('email'))
                <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Documento</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Documento"
                    name="documento"
                    value="{{isset($desbravador) ? $desbravador->documento : ''}}"
                />
                @if ($errors->has('documento'))
                <div class="text-danger">{{ $errors->first('documento') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Unidade</label>
                <select
                    class="form-control"
                    placeholder="Documento"
                    name="unidade_id"
                >
                    @foreach($unidades as $unidade) @if (isset($desbravador) &&
                    $desbravador->unidade_id == $unidade->id)
                    <option value="{{$unidade->id}}" selected>
                        {{$unidade->nome}}
                    </option>
                    @else
                    <option value="{{$unidade->id}}">
                        {{$unidade->nome}}
                    </option>
                    @endif @endforeach
                </select>
                @if ($errors->has('unidade_id'))
                <div class="text-danger">
                    {{ $errors->first('unidade_id') }}
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
