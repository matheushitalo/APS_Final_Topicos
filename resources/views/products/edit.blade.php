@extends('layout')

@section('content')
<h2>Editar Produto</h2>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <label class="form-label">Nome:</label>
    <input type="text" name="name" value="{{ $product->name }}" class="form-control mb-3">

    <label class="form-label">Preço:</label>
    <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="form-control mb-3">

    <label class="form-label">Imagem:</label>
    <input type="file" name="imagem" class="form-control mb-3">

    @if($product->imagem)
        <p>Imagem atual:</p>
        <img src="{{ asset('storage/' . $product->imagem) }}" width="120" class="rounded shadow mb-3">
    @endif

    <button class="btn btn-warning">Atualizar</button>
    <a class="btn btn-secondary" href="{{ route('products.index') }}">Voltar</a>
</form>
@endsection
