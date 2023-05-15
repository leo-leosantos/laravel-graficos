@extends('adminlte::page')
@section('title', 'Listagem de Produtos')

@section('content_header')
    <h1>Produtos</h1>

    <a href="{{ route('products.create') }}" class="btn btn-success">Adicionar</a>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}" class="active">Produtos</a></li>
    </ol>

@stop

@section('content')
    <div class="content-row">
        <div class="box box-success">
            <div class="box-body">
                    <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
                        @csrf
                        <select name="category" class="form-control">
                            <option value="">Categorias</option>
                            @foreach ($categories as $id => $category )
                            <option value="{{ $id }}" @if (isset($filters['category']) && $filters['category'] == $id)) selected

                            @endif>
                            {{ $category }}</option>

                            @endforeach
                        </select>
                        <label for="filtro">Pesquisar</label>
                        <input type="text" name="name" placeholder="Pesquisar pelo Nome" class="form-control" value="{{ $filters['name'] ?? '' }}">
                        <input type="text" name="price" placeholder="Pesquisar pelo preço" class="form-control" value="{{ $filters['price'] ?? '' }}">

                        <button type="submit" class="btn btn-success btn-flat">Buscar</button>
                    </form>

            </div>
        </div>
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts.alerts')
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">url</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Ações</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->url }}</td>
                                <td>R$  {{ $product->price }}</td>
                                <td>{{ $product->category->title }}</td>

                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="badge bg-yellow">Editar</a>
                                    <a href="{{ route('products.show', $product->id) }}"
                                        class="badge bg-blue">Visualizar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    @if (isset($filters))
                        {!! $products->appends($filters)->links() !!}
                    @else
                        {!! $products->links() !!}
                    @endif
            </div>
        </div>
    </div>
@stop
