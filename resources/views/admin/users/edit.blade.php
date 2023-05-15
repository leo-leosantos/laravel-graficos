@extends('adminlte::page')
@section('title', 'Editar Usuário')

@section('content_header')
    <h1>Editar Produto {{ $user->name }}</h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('users.index') }}" class="active">Users</a></li>
        <li><a href="{{ route('users.edit', $user->id) }}" class="active">Editar</a></li>
    </ol>

@stop

@section('content')
    <div class="content-row">
        <div class="box box-success">
            <div class="box-body">
                @include('admin.includes.alerts.alerts')

                {{ Form::model($user,['route'=> ['users.update', $user->id], 'class'=>'form']) }}
                @method('PUT')
                @include('admin.users._partials.form')

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
