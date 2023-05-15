@extends('adminlte::page')
@section('title', 'Adicionar Categorias')

@section('content_header')
    <h1>Nova Categoria</h1>

@stop

@section('content')
    <div class="content-row">
        <div class="box box-success">
            <div class="box-body">
                @include('admin.includes.alerts.alerts')
              <form action="{{ route('categories.store') }}" class="form" method="POST">
                    @include('admin.categories._partials.form')
              </form>
            </div>
        </div>
    </div>
@stop
