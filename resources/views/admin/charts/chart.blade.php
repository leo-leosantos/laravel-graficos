@extends('adminlte::page')
@section('title', 'Relatorio Mensal de Vendas')

@section('content_header')
    <h1>Relatorio Mensal de vendas</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="#" class="active">Graficos</a></li>

    </ol>

@stop

@section('content')
    <div class="content-row">

        <div class="box box-primary">
            <div class="box-body">
                {!! $chart->container() !!}
            </div>
        </div>
    </div>
@stop


@push('js')

{!! $chart->script() !!}

@endpush
