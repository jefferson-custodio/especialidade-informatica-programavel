@extends('layouts.app', ['nav'=>true])
<!--  -->
<!--  -->
@section('content')
<div class="form-page">
  <div class="container">
    @if (isset($mensalidade))
    <!--  -->
    @section('title', 'Editar mensalidade')

    <h2>Editar mensalidade #{{$mensalidade->id}}</h2>
    @else
    <!--  -->
    @section('title', 'Cadastro de mensalidades')
    <h2>Cadastro de mensalidades</h2>
    @endif
    <form action="{{isset($mensalidade) ? '/mensalidades/'.$mensalidade->id : '/mensalidades' }}" method="POST">
      @csrf
      <!--  -->
      @if (isset($mensalidade)) {{ method_field('PUT') }} @endif
      <div class="form-group">
        <label for="exampleInputEmail1">Desbravador</label>
        <select class="form-control" placeholder="Documento" name="desbravador_id">
          @foreach($desbravadores as $desbravador)
          <!--  -->
          @if (isset($mensalidade) && ($mensalidade->desbravador_id == $desbravador->id))
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

      <div class="form-group">
        <label for="exampleInputEmail1">Valor</label>
        <input
          type="text"
          class="form-control"
          id="money"
          placeholder="Valor"
          name="valor"
          value="{{isset($mensalidade) ? $mensalidade->valor : ''}}"
        />
        @if ($errors->has('valor'))
        <div class="text-danger">{{ $errors->first('valor') }}</div>
        @endif
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Data</label>
        <input type="date" class="form-control" placeholder="Data" name="data" value="{{isset($mensalidade) ? $mensalidade->data : ''}}" />
        @if ($errors->has('data'))
        <div class="text-danger">{{ $errors->first('data') }}</div>
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
<script>
  $(function () {
    $('#money').maskMoney({
      prefix: 'R$ ',
      decimal: ',',
      thousands: '.',
    })

    $('form').submit(function () {
      $('#money').val($('#money').maskMoney('unmasked')[0])
    })
  })
</script>
@endpush
