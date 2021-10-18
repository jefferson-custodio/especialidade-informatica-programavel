@extends('layouts.app', ['nav'=>true])
<!--  -->
<!--  -->
@section('content')
<div class="form-page">
    <div class="container">
        @if (isset($classe))
        <!--  -->
        @section('title', 'Editar classe')

        <h2>Editar classe #{{$classe->id}}</h2>
        @else
        <!--  -->
        @section('title', 'Cadastro de classes')
        <h2>Cadastro de classes</h2>
        @endif
        <form
            action="{{isset($classe) ? '/classes/'.$classe->id : '/classes' }}"
            method="POST"
        >
            @csrf
            <!--  -->
            @if (isset($classe)) {{ method_field("PUT") }} @endif
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="nome"
                    name="nome"
                    value="{{isset($classe) ? $classe->nome : ''}}"
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
