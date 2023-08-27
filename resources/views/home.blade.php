@extends('layouts.app')

@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if(session('sucesso'))
    <div class="alert alert-success">
        {{ session('sucesso') }}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Olá, {{Auth::user()->name}}!</div>
                <div class="card-body">
                    {{ __('Qual veículo você está buscando?') }}
                    <form class="d-flex" role="search" method="POST" action="{{ route('encontrar_carros') }}">
                        @csrf
                        <input class="form-control me-2" type="search" name="marca" value="" placeholder="Digite aqui..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
