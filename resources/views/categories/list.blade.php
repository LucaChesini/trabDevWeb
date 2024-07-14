@extends('includes.layout')
@section('pageTitle')
    Categories
@endsection
@section('content')
    <h1>Categorias</h1>
    <div>
        <a href="{{route('categories.create')}}" >Adicionar Categorias</a>
    </div>
    <table class="table table-striped table-hover">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('categories.edit', ['id' => $category->id])}}" class="btn btn-primary mx-1">Editar</a>
                        <form action="{{route('categories.destroy', ['id' => $category->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger mx-1">Excluir</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection