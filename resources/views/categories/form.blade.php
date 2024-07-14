@extends('includes.layout')
@section('pageTitle')
    Registrar Categorias
@endsection
@section('content')
    @if ($category->id)
        <h1 class="text-center mt-4">Editar Categoria</h1>
    @else
        <h1 class="text-center mt-4">Criar Categoria</h1>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <a href="{{ route('categories.index') }}" class="btn btn-info mb-4">Voltar</a>
    @if ($category->id)
        <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST">
            @method('PUT')
        @else
            <form action="{{ route('categories.store') }}" method="POST">
    @endif
    @csrf
    <label for="name" class="form-label">Nome:</label>
    <br>
    <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control">
    <br>
    <label for="description" class="form-label">Descrição:</label>
    <br>
    <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
    <br>
    <button type="submit" class="btn btn-success mb-4">Salvar</button>
    </form>
@endsection
