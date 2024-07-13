@extends('includes.layout')
@section('pageTitle')
    Registrar Marcas
@endsection
@section('content')
    @if ($brand->id)
    <h1 class="text-center mt-4">Editar Marca</h1>
    @else
    <h1 class="text-center mt-4">Criar Marca</h1>
    @endif
    <a href="{{route("brands.index")}}" class="btn btn-info mb-4">Voltar</a>
    @if ($brand->id)
    <form action="{{route("brands.update", ['id' => $brand->id])}}" method="POST">
        @method('PUT')
    @else
    <form action="{{route("brands.store")}}" method="POST">
    @endif
        @csrf
        <label for="name" class="form-label">Nome:</label>
        <br>
        <input type="text" name="name" id="name" value="{{$brand->name}}" class="form-control">
        <br>
        <button type="submit" class="btn btn-success mb-4">Salvar</button>
    </form>
@endsection