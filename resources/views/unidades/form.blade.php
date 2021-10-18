@extends('layouts.app', ['nav'=>true])
<!--  -->
<!--  -->
@section('content')
<div class="form-page">
    <div class="container">
        @if (isset($unidade))
        <!--  -->
        @section('title', 'Editar unidade')

        <h2>Editar unidade #{{$unidade->id}}</h2>
        @else
        <!--  -->
        @section('title', 'Cadastro de unidades')
        <h2>Cadastro de unidades</h2>
        @endif
        <form
            action="{{isset($unidade) ? '/unidades/'.$unidade->id : '/unidades' }}"
            method="POST"
        >
            @csrf
            <!--  -->
            @if (isset($unidade)) {{ method_field("PUT") }} @endif
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="nome"
                    name="nome"
                    value="{{isset($unidade) ? $unidade->nome : ''}}"
                />
                @if ($errors->has('nome'))
                <div class="text-danger">{{ $errors->first('nome') }}</div>
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
