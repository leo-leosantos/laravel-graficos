
@extends('adminlte::page')
@section('title', 'Editar Usuário')

@section('content_header')
    <h1>Detalhes do Usuário {{ $user->name }}</h1>

    {{--  <a href="{{ route('products.index') }}" class="btn btn-info btn-flat "> Voltar</a>  --}}


    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('users.index') }}" class="active">Usuarios</a></li>
        <li><a href="{{ route('users.show', $user->id) }}" class="active">Detalhes</a></li>
    </ol>
@stop

@section('content')
    <div class="content-row">
        <div class="box box-success">
            <div class="box-body">

                <p><Strong>ID: </Strong>{{ $user->id  }}</p>
                <p><Strong>Nome: </Strong>{{ $user->name }}</p>
                <p><Strong>Email: </Strong>{{ $user->email  }}</p>
                <p><Strong>Data de Criação: </Strong>{{ $user->created_at  }}</p>

                    <hr>

                    <form action="{{route('users.destroy', $user->id)}}" class="form" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block btn-flat">Excluir o Usuário: <strong>{{ $user->name }} </strong> </button>
                    </form>
            </div>
        </div>
    </div>
@stop
