@extends('layout')

@section('content')
<h2>Novo Produto</h2>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    @csrf

    <label class="form-label">Nome:</label>
    <input type="text" name="name" class="form-control mb-3" required>

    <label class="form-label">Preço:</label>
    <input type="number" step="0.01" name="price" class="form-control mb-3" required>

    <label class="form-label">Imagem:</label>
    <input type="file" name="imagem" class="form-control mb-3" accept="image/png, image/jpeg">

    <button class="btn btn-primary">Salvar</button>
    <a class="btn btn-secondary" href="{{ route('products.index') }}">Voltar</a>
</form>
@endsection
