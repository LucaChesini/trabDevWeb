@extends('includes.layout')
@section('pageTitle')
    Categories
@endsection
@section('content')
    <h1>Categorias</h1>
    <div>
        <a href="#">Adicionar Categorias</a>
    </div>
    <table class="table table-striped table-hover">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
            </tr>
        @endforeach
    </table>
@endsection