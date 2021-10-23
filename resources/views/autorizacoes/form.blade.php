@extends('layouts.app', ['nav'=>true])
<!--  -->
<!--  -->
@section('content')
<div class="form-page">
  <div class="container">
    @if (isset($autorizacao))
    <!--  -->
    @section('title', 'Editar autorizacao')

    <h2>Editar autorizacao #{{$autorizacao->id}}</h2>
    @else
    <!--  -->
    @section('title', 'Cadastro de autorizacao')
    <h2>Cadastro de autorizacao</h2>
    @endif
    <form action="{{isset($autorizacao) ? '/autorizacoes/'.$autorizacao->id : '/autorizacoes' }}" method="POST" enctype="multipart/form-data">
      @csrf
      <!--  -->
      @if (isset($autorizacao)) {{ method_field('PUT') }} @endif
      <div class="form-group">
        <label for="exampleInputEmail1">Desbravador</label>
        <select class="form-control" placeholder="Documento" name="desbravador_id">
          @foreach($desbravadores as $desbravador)
          <!--  -->
          @if (isset($autorizacao) && ($autorizacao->desbravador_id == $desbravador->id))
          <option value="{{$desbravador->id}}" selected>
            {{$desbravador->nome}}
          </option>
          @else
          <option value="{{$desbravador->id}}">
            {{$desbravador->nome}}
          </option>
          @endif @endforeach
        </select>
        @if ($errors->has('desbravador_id'))
        <div class="text-danger">
          {{ $errors->first('desbravador_id') }}
        </div>
        @endif
      </div>
      <!--  -->

      <div class="form-group">
        <label for="exampleInputEmail1">Arquivo</label>
        <input type="file" class="form-control" name="arquivo" />
        @if (isset($autorizacao)) <a href="{{$autorizacao->arquivo}}" download="">download arquivo</a> @endif
        <!--  -->
        @if ($errors->has('arquivo'))
        <div class="text-danger">{{ $errors->first('arquivo') }}</div>
        @endif
      </div>

      <button type="submit" class="btn btn-primary ml-auto d-block">Enviar</button>
    </form>
  </div>
</div>
@endsection
<!--  -->
@push('styles')
<style></style>
@endpush
<!--  -->
@push('scripts')
<script></script>
@endpush
