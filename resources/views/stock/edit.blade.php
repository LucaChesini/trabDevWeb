@extends('includes.layout')

@section('pageTitle')
    EditarEstoque
@endsection

@section('content')
    <h1 class="text-center mt-4">Editar Marca</h1>
    <br>
    <a href="{{ route('stock.index') }}" class="btn btn-info mb-4">Voltar</a>

    <form action="{{ route('stock.update', $product->id) }}" method="POST">
        @csrf
        @method('PATCH')

            <h4>Operação:</h4>
            <select name="operation" id="operation" class="form-control">
                <option value="add">Adicionar</option>
                <option value="remove">Remover</option>
            </select>
            <br>
            <h4>Quantidade:</h4>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}" required>
            <br>
            <button type="submit" class="btn btn-success mb-4">Atualizar Estoque</button>
    </form>
@endsection
