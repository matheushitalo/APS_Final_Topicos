@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Lista de Produtos</h2>
    <a class="btn btn-primary" href="{{ route('products.create') }}">+ Criar Produto</a>
</div>

@if($products->isEmpty())
    <div class="alert alert-info">Nenhum produto cadastrado ainda.</div>
@else
<table class="table table-striped table-bordered align-middle">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Imagem</th>
            <th style="width: 200px">Ações</th>
        </tr>
    </thead>
    <tbody>

        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
            <td>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->imagem) }}" width="80" class="rounded shadow">
                @else
                    <span class="text-muted">(sem imagem)</span>
                @endif
            </td>

            <td>
                <a class="btn btn-sm btn-secondary" href="{{ route('products.show', $product->id) }}">Ver</a>
                <a class="btn btn-sm btn-warning" href="{{ route('products.edit', $product->id) }}">Editar</a>

                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">
                        Excluir
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endif

@endsection
