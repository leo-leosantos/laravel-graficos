
@extends('adminlte::page')
@section('title', 'Editar Produto')

@section('content_header')
    <h1>Detalhes do Produto {{ $product->name }}</h1>

    {{--  <a href="{{ route('products.index') }}" class="btn btn-info btn-flat "> Voltar</a>  --}}


    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}" class="active">Produtos</a></li>
        <li><a href="{{ route('products.show', $product->id) }}" class="active">Detalhes</a></li>
    </ol>
@stop

@section('content')
    <div class="content-row">
        <div class="box box-success">
            <div class="box-body">

                <p><Strong>ID</Strong>{{ $product->id  }}</p>
                <p><Strong>Nome</Strong>{{ $product->name }}</p>
                <p><Strong>URL: </Strong>{{ $product->url  }}</p>
                <p><Strong>Preço: </Strong>{{ $product->price  }}</p>
                <p><Strong>Categoria: </Strong>{{ $product->category->title  }}</p>
                <p><Strong>Descrição: </Strong>{{ $product->description  }}</p>
                <p><Strong>Data de Criação: </Strong>{{ $product->created_at  }}</p>

                    <hr>

                    <form action="{{route('products.destroy', $product->id)}}" class="form" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block btn-flat">Excluir o Produto: <strong>{{ $product->name }} </strong> </button>
                    </form>
            </div>
        </div>
    </div>
@stop
