@extends('includes.layout')

@section('pageTitle')
    EditarEstoque
@endsection

@section('content')
    <h1 class="text-center mt-4">Atualizar Estoque</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>
    <a href="{{ route('stock.index') }}" class="btn btn-info mb-4">Voltar</a>

    <form action="{{ route('products.ajusta_estoque', ['id' => $product->id]) }}" method="POST">
        @csrf
        @method('PATCH')

            <h4>Operação:</h4>
            <select name="operacao" id="operacao" class="form-control">
                <option value="adicionar">Adicionar</option>
                <option value="remover">Remover</option>
                <option value="balancear">Balancear</option>
            </select>
            <br>
            <h4>Quantidade:</h4>
            <input type="number" name="stock" id="stock" class="form-control">
            <br>
            <button type="submit" class="btn btn-success mb-4">Atualizar Estoque</button>
    </form>
@endsection
