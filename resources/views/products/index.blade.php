@extends('includes.layout')

@section('pageTitle', 'Produtos')

@section('content')
    <h1>Lista de Produtos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success mb-4">Adicionar Produto</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Foto</th>
                <th>Foto miniatura</th>
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
                    @if ($product->photo)
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="Foto de {{ $product->name }}" class="img-thumbnail hover-zoom" style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                        Sem foto
                    @endif
                </td>
                <td>
                    @if ($product->photo_mini)
                        <img src="{{ asset('storage/' . $product->photo_mini) }}" alt="Foto de {{ $product->name }}" class="img-thumbnail hover-zoom" style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                        Sem foto
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Editar</a>
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

<style>
.img-thumbnail.hover-zoom {
    transition: transform 0.3s ease-in-out;
}

.img-thumbnail.hover-zoom:hover {
    transform: scale(2);
    z-index: 10;
}
</style>
