@extends('layout')

@section('content')

<h2>{{ $product->name }}</h2>

@if($product->image)
    <img src="{{ asset('storage/' . $product->imagem) }}" 
         width="200" 
         class="rounded shadow mb-3">
@endif

<p><strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}</p>

@if($product->description)
    <p>{{ $product->description }}</p>
@endif

<a class="btn btn-secondary" href="{{ route('products.index') }}">Voltar</a>

@endsection
