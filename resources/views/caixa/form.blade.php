@extends('layouts.app', ['nav'=>true])
<!--  -->
<!--  -->
@section('content')
<div class="form-page">
  <div class="container">
    @if (isset($caixa))
    <!--  -->
    @section('title', 'Editar caixa')

    <h2>Editar caixa #{{$caixa->id}}</h2>
    @else
    <!--  -->
    @section('title', 'Cadastro de caixa')
    <h2>Cadastro de caixa</h2>
    @endif
    <form action="{{isset($caixa) ? '/caixa/'.$caixa->id : '/caixa' }}" method="POST">
      @csrf
      <!--  -->
      @if (isset($caixa)) {{ method_field('PUT') }} @endif

      <div class="form-group">
        <label for="exampleInputEmail1">Valor</label>
        <input type="text" class="form-control" id="money" placeholder="Valor" name="valor" value="{{isset($caixa) ? $caixa->valor : ''}}" />
        @if ($errors->has('valor'))
        <div class="text-danger">{{ $errors->first('valor') }}</div>
        @endif
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Data</label>
        <input type="date" class="form-control" placeholder="Data" name="data" value="{{isset($caixa) ? $caixa->data : ''}}" />
        @if ($errors->has('data'))
        <div class="text-danger">{{ $errors->first('data') }}</div>
        @endif
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Descrição</label>
        <input type="text" class="form-control" placeholder="Descrição" name="descricao" value="{{isset($caixa) ? $caixa->descricao : ''}}" />
        @if ($errors->has('descricao'))
        <div class="text-danger">{{ $errors->first('descricao') }}</div>
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
      allowNegative: true,
    })

    $('form').submit(function () {
      $('#money').val($('#money').maskMoney('unmasked')[0])
    })
  })
</script>
@endpush
