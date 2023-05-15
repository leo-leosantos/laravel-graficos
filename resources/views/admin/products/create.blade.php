@extends('adminlte::page')
@section('title', 'Cadastrar novo Produto')

@section('content_header')
    <h1>Novo Produto</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}" class="active">Produtos</a></li>
        <li><a href="{{ route('products.create') }}" class="active">Cadastrar</a></li>

    </ol>

@stop

@section('content')
    <div class="content-row">

        <div class="box box-primary">
            <div class="box-body">
                @include('admin.includes.alerts.alerts')
                {{-- <form action="{{ route('products.store') }}" class="form" method="POST">
                    @include('admin.products._partials.form')
                </form> --}}

                {{-- Utilizando o laravelcollective/html": "^5.4.0 --}}
                {{ Form::open(['route' => 'products.store', 'class' => 'form']) }}
                    @include('admin.products._partials.form')
                {{ Form::close() }}


            </div>
        </div>

    </div>


@stop
