@extends('layouts.app', ['nav'=>true])
<!--  -->
@section('title', 'Caixa')
<!--  -->
@section('content')
<div class="adm-page">
  <div class="container">
    <h2>Caixa</h2>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="btn btn-outline-success my-2 my-sm-0 ml-auto" href="/caixa/novo"> Novo </a>
    </nav>
    <table class="table table-striped mt-3">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Valor</th>
          <th scope="col">Data</th>
          <th scope="col">Descricao</th>
        </tr>
      </thead>
      <tbody>
        @foreach($paginator->items() as $item)
        <tr>
          <th scope="row">{{ $item->id }}</th>
          <td>{{ $item->valor }}</td>
          <td>{{ $item->data }}</td>
          <td>{{ $item->descricao }}</td>
          <td>
            <a href="/caixa/{{$item->id}}/editar" class="edit" title="editar">
              <i class="fas fa-pen"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @if ($paginator->lastPage() > 1)
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="{{ ($paginator->currentPage() == 1) ? 'page-item disabled' : 'page-item' }}">
          <a href="{{ $paginator->url(1) }}">Anterior</a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? 'page-item active' : 'page-item' }}">
          <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'page-item disabled' : 'page-item' }}">
          <a href="{{ $paginator->url($paginator->currentPage()+1) }}">Próximo</a>
        </li>
      </ul>
    </nav>
    @endif
  </div>
</div>
@endsection
<!--  -->
@push('styles')
<style></style>
@endpush
