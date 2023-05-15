@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h1 class="text-bold text-center">
                            {{ $categories }}
                        </h1>
                        <p class="text-bold text-center ">
                            Categoria(s) Cadastrada(s)
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <a href="{{ route('categories.index') }}" class="small-box-footer">
                        Mais Informações <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>


            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h1 class="text-bold text-center">
                            {{ $products }}
                        </h3>
                        <p class="text-bold text-center ">
                            Produto(s) Cadastrado(s)
                        </p>
                    </div>
                    <div class="icon">
                        {{--  <i class="ion ion-person-add"></i>  --}}
                        <i class="fas fa-tasks"></i>

                    </div>
                    <a href="{{ route('products.index') }}" class="small-box-footer">
                        Mais Informações <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h1 class="text-bold text-center">
                            {{ $users }}
                        </h3>
                        <p class="text-bold text-center ">
                            Usuário(s) Cadastrado(s)
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>

                    </div>
                    <a href="{{ route('products.index') }}" class="small-box-footer">
                        Mais Informações <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
        </div>

    </div>
@stop
