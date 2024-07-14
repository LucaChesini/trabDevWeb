@extends('includes.layout')
@section('pageTitle')
    Marcas
@endsection
@section('content')
@if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Marcas</h1>
    <div>
        <a href="{{ route('brands.create') }}" class="btn btn-success mb-4">Adicionar Marcas</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Foto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td>
                    @if ($brand->photo)
                        <img src="{{ asset('storage/' . $brand->photo) }}" alt="Foto de {{ $brand->name }}"
                            class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                        Sem foto
                    @endif
                </td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('brands.edit', ['id' => $brand->id]) }}" class="btn btn-primary mx-1">Editar</a>
                        <form action="{{ route('brands.destroy', ['id' => $brand->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger mx-1">Excluir</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
