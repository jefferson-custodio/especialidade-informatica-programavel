@extends('layouts.app', ['nav'=>true])
<!--  -->
<!--  -->
@section('content')
<div class="form-page">
  <div class="container">
    @if (isset($custo))
    <!--  -->
    @section('title', 'Editar custo')

    <h2>Editar custo #{{$custo->id}}</h2>
    @else
    <!--  -->
    @section('title', 'Cadastro de custo')
    <h2>Cadastro de custo</h2>
    @endif
    <form action="{{isset($custo) ? '/custos/'.$custo->id : '/custos' }}" method="POST">
      @csrf
      <!--  -->
      @if (isset($custo)) {{ method_field('PUT') }} @endif

      <div class="form-group">
        <label for="exampleInputEmail1">Valor</label>
        <input type="text" class="form-control" id="money" placeholder="Valor" name="valor" value="{{isset($custo) ? $custo->valor : ''}}" />
        @if ($errors->has('valor'))
        <div class="text-danger">{{ $errors->first('valor') }}</div>
        @endif
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Descrição</label>
        <input type="text" class="form-control" placeholder="Descrição" name="descricao" value="{{isset($custo) ? $custo->descricao : ''}}" />
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
