@extends('layouts.app')
<!--  -->
@section('title', 'Login')
<!--  -->
@section('content')
<div class="text-center">
    @if ($errors->has('email'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $errors->first('email') }}
        <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
        >
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <form class="form-signin" action="/authenticate" method="post">
        @csrf
        <!-- {{ csrf_field() }} -->
        <img
            class="mb-4"
            src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg"
            alt=""
            width="72"
            height="72"
        />
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input
            type="email"
            id="inputEmail"
            name="email"
            class="form-control"
            placeholder="Email address"
            required
            autofocus
        />
        <label for="inputPassword" class="sr-only">Password</label>
        <input
            type="password"
            id="inputPassword"
            name="password"
            class="form-control"
            placeholder="Password"
            required
        />
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            Sign in
        </button>
        <p class="mt-5 mb-3 text-muted">&copy; Clube Sentinelas, Mauá, SP</p>
    </form>
</div>
@endsection @push('styles')
<style>
    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .checkbox {
        font-weight: 400;
    }
    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
@endpush
