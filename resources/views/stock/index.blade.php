@extends('includes.layout')
@section('pageTitle')
    Estoque
@endsection
@section('content')
    <h1>Estoques de Produtos</h1>
    <div>
        <div class="container">
           
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <a href="{{ route('stock.edit', $product->id) }}" class="btn btn-primary">Alterar Estoque</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
