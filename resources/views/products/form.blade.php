@extends('includes.layout')

@section('pageTitle')
    Adicionar Produto
@endsection

@section('content')
    <h1>Adicionar Produto</h1>

    <a href="{{ route('products.index') }}" class="btn btn-info mb-4">Voltar para Lista de Produtos</a>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição:</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Preço:</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Foto:</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>

        <div class="mb-3">
            <label for="photo_mini">Miniatura do Produto</label>
            <input type="file" class="form-control" id="photo_mini" name="photo_mini">
        </div>

        <div class="mb-3">
            <label for="brand_id" class="form-label">Marca:</label>
            <select class="form-select" id="brand_id" name="brand_id">
                <option value="">Selecione a Marca</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
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
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection
