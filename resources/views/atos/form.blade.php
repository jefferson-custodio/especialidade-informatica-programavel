@extends('layouts.app', ['nav'=>true])
<!--  -->
<!--  -->
@section('content')
<div class="form-page">
  <div class="container">
    @if (isset($ato))
    <!--  -->
    @section('title', 'Editar ato')

    <h2>Editar ato #{{$ato->id}}</h2>
    @else
    <!--  -->
    @section('title', 'Cadastro de ato')
    <h2>Cadastro de ato</h2>
    @endif
    <form action="{{isset($ato) ? '/atos/'.$ato->id : '/atos' }}" method="POST" enctype="multipart/form-data">
      @csrf
      <!--  -->
      @if (isset($ato)) {{ method_field('PUT') }} @endif

      <div class="form-group">
        <label for="exampleInputEmail1">titulo</label>
        <input type="text" class="form-control" placeholder="Título" name="titulo" value="{{isset($ato) ? $ato->titulo : ''}}" />
        @if ($errors->has('titulo'))
        <div class="text-danger">{{ $errors->first('titulo') }}</div>
        @endif
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">descrição</label>
        <textarea class="form-control" name="descricao"
          >{{isset($ato) ? $ato->descricao : ''}}
        </textarea>
        @if ($errors->has('descricao'))
        <div class="text-danger">{{ $errors->first('descricao') }}</div>
        @endif
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Arquivo</label>
        <input type="file" class="form-control" name="arquivo" />
        @if (isset($ato)) <a href="{{$ato->arquivo}}" download="">download arquivo</a> @endif
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
