@extends('includes.layout')
@section('pageTitle')
    Marcas
@endsection
@section('content')
    <h1>Marcas</h1>
    <div>
        <a href="{{route('brands.create')}}">Adicionar Marcas</a>
    </div>
    <table class="table table-striped table-hover">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        @foreach ($brands as $brand)
            <tr>
                <td>{{$brand->name}}</td>
                <td>{{$brand->description}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('brands.edit', ['id' => $brand->id])}}" class="btn btn-primary mx-1">Editar</a>
                        <form action="{{route('brands.destroy', ['id' => $brand->id])}}" method="POST">
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