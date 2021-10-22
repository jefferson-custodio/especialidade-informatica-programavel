@extends('layouts.app', ['nav'=>true])
<!--  -->
<!--  -->
@section('content')
<div class="form-page">
  <div class="container">
    @if (isset($ata))
    <!--  -->
    @section('title', 'Editar ata')

    <h2>Editar ata #{{$ata->id}}</h2>
    @else
    <!--  -->
    @section('title', 'Cadastro de ata')
    <h2>Cadastro de ata</h2>
    @endif
    <form action="{{isset($ata) ? '/atas/'.$ata->id : '/atas' }}" method="POST" enctype="multipart/form-data">
      @csrf
      <!--  -->
      @if (isset($ata)) {{ method_field('PUT') }} @endif

      <div class="form-group">
        <label for="exampleInputEmail1">titulo</label>
        <input type="text" class="form-control" placeholder="Título" name="titulo" value="{{isset($ata) ? $ata->titulo : ''}}" />
        @if ($errors->has('titulo'))
        <div class="text-danger">{{ $errors->first('titulo') }}</div>
        @endif
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">descrição</label>
        <textarea class="form-control" name="descricao"
          >{{isset($ata) ? $ata->descricao : ''}}
        </textarea>
        @if ($errors->has('descricao'))
        <div class="text-danger">{{ $errors->first('descricao') }}</div>
        @endif
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Arquivo</label>
        <input type="file" class="form-control" name="arquivo" />
        @if (isset($ata)) <a href="{{$ata->arquivo}}" download="">download arquivo</a> @endif
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
