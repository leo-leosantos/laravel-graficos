@extends('adminlte::page')
@section('title', 'Editar Categorias')

@section('content_header')
    <h1>Detalhes da Categoria {{ $category->title }}</h1>

    {{--  <a href="{{ route('categories.index') }}" class="btn btn-info btn-flat "> Voltar</a>  --}}


    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('categories.index') }}" class="active">Categorias</a></li>
        <li><a href="{{ route('categories.show', $category->id) }}" class="active">Detalhes</a></li>
    </ol>
@stop

@section('content')
    <div class="content-row">
        <div class="box box-success">
            <div class="box-body">

                <p><Strong>ID</Strong>{{ $category->id  }}</p>
                <p><Strong>Titulo</Strong>{{ $category->title }}</p>
                <p><Strong>URL: </Strong>{{ $category->url  }}</p>
                <p><Strong>Data de Criação: </Strong>{{ $category->created_at  }}</p>
                <p><Strong>Descrição</Strong>{{ $category->description  }}</p>
                    <hr>

                    <form action="{{  route('categories.destroy', $category->id) }}" class="form" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block btn-flat">Excluir</button>

                    </form>
            </div>
        </div>
    </div>
@stop
