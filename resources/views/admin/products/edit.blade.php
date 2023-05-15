@extends('adminlte::page')
@section('title', 'Editar Produtos')

@section('content_header')
    <h1>Editar Produto {{ $product->title }}</h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}" class="active">Produtos</a></li>
        <li><a href="{{ route('products.edit', $product->id) }}" class="active">Editar</a></li>
    </ol>

@stop

@section('content')
    <div class="content-row">
        <div class="box box-success">
            <div class="box-body">
                @include('admin.includes.alerts.alerts')

                {{ Form::model($product,['route'=> ['products.update', $product->id], 'class'=>'form']) }}
                @method('PUT')
                @include('admin.products._partials.form')

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
