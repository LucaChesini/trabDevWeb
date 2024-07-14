@extends('includes.layout')

@section('pageTitle', 'Produtos')

@section('content')
    <h1>Lista de Produtos</h1>
    <a href="{{ route('products.create') }}" >Adicionar Produto</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->brand ? $product->brand->name : 'N/A' }}</td>
        <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
        <td>
            <a href="{{ route('products.update', $product->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </td>
    </tr>
@endforeach

        </tbody>
    </table>
@endsection
