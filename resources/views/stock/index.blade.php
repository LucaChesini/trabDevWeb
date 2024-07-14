@extends('includes.layout')
@section('pageTitle')
    Estoque
@endsection
@section('content')
    <h1>Produtos em Estoque</h1>
    <div>
        <div class="container">
           
            <table class="table">
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
                            <td>{{ $product->stock ? $product->stock->quantity : 0 }}</td>
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
