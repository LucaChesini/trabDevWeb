@extends('includes.layout')

@section('pageTitle')
    Editar Produto
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Editar Produto</h1>

    <a href="{{ route('products.index') }}" class="btn btn-info mb-4">Voltar para Lista de Produtos</a>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição:</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Preço:</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Estoque:</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}">
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Foto:</label>
            <input type="file" class="form-control" id="photo" name="photo">
            @if ($product->photo)
                <p>Imagem atual:</p>
                <img src="{{ asset('storage/' . $product->photo) }}" alt="Foto do Produto" style="max-width: 200px; max-height: 200px;">
            @endif
        </div>

        <div class="mb-3">
            <label for="photo_mini" class="form-label">Miniatura do Produto:</label>
            <input type="file" class="form-control" id="photo_mini" name="photo_mini">
            @if ($product->photo_mini)
                <p>Miniatura atual:</p>
                <img src="{{ asset('storage/' . $product->photo_mini) }}" alt="Miniatura do Produto" style="max-width: 200px; max-height: 200px;">
            @endif
        </div>

        <div class="mb-3">
            <label for="brand_id" class="form-label">Marca:</label>
            <select class="form-select" id="brand_id" name="brand_id">
                <option value="">Selecione a Marca</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria:</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Selecione a Categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
    </form>
@endsection
