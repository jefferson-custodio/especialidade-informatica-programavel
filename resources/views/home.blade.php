@extends('layouts.app')

@section('content')
<div class="py-5 admin-cards-wrapper">
    <div class="container">
      <div class="row hidden-md-up">
        <div class="col-md-4">
          <a class="card" href="/unidades">
            <div class="card-block" >
              <i class="fas fa-layer-group"></i>
              <h4 class="card-title">Unidades</h4>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a class="card" href="/desbravadores">
            <div class="card-block" >
              <i class="fas fa-users"></i>
              <h4 class="card-title">Desbravadores</h4>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a class="card" href="/especialidades">
            <div class="card-block" >
              <i class="fab fa-gg-circle"></i>
              <h4 class="card-title">Especialidades</h4>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a class="card" href="/classes">
            <div class="card-block" >
              <i class="fas fa-stop-circle"></i>
              <h4 class="card-title">Classes</h4>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a class="card" href="/mensalidades">
            <div class="card-block" >
              <i class="fas fa-dollar-sign"></i>      
              <h4 class="card-title">Mensalidades</h4>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a class="card" href="/caixa">
            <div class="card-block" >
              <i class="fas fa-hand-holding-usd"></i>
              <h4 class="card-title">Caixa</h4>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a class="card" href="/custos">
            <div class="card-block" >
              <i class="fas fa-funnel-dollar"></i>
              <h4 class="card-title">Custos</h4>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a class="card" href="/bens">
            <div class="card-block" >
              <i class="fas fa-trophy"></i>
              <h4 class="card-title">Bens</h4>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@push('styles')
    <style>
        .admin-cards-wrapper .card {
            padding: 20px;
            text-align:center;
            margin: 10px;
        }
        
        .admin-cards-wrapper .card i{
            font-size: 60px;
            margin-bottom: 20px
        }
    </style>
@endpush