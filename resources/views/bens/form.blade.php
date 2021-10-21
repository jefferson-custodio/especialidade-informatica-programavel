@extends('layouts.app', ['nav'=>true])
<!--  -->
<!--  -->
@section('content')
<div class="form-page">
  <div class="container">
    @if (isset($bem))
    <!--  -->
    @section('title', 'Editar bem')

    <h2>Editar bem #{{$bem->id}}</h2>
    @else
    <!--  -->
    @section('title', 'Cadastro de bem')
    <h2>Cadastro de bem</h2>
    @endif
    <form action="{{isset($bem) ? '/bens/'.$bem->id : '/bens' }}" method="POST" enctype="multipart/form-data">
      @csrf
      <!--  -->
      @if (isset($bem)) {{ method_field('PUT') }} @endif

      <div class="form-group">
        <label for="exampleInputEmail1">Descrição</label>
        <input type="text" class="form-control" placeholder="Descrição" name="descricao" value="{{isset($bem) ? $bem->descricao : ''}}" />
        @if ($errors->has('descricao'))
        <div class="text-danger">{{ $errors->first('descricao') }}</div>
        @endif
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Foto</label>
        <input type="file" class="form-control" name="foto" />
        @if (isset($bem)) <img width="50" height="50" src="{{$bem->foto}}" /> @endif
        <!--  -->
        @if ($errors->has('foto'))
        <div class="text-danger">{{ $errors->first('foto') }}</div>
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
