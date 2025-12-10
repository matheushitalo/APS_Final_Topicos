<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        if (!session()->has('usuario_id')) {
            redirect('/login')->send();
        }
    }

    public function index()
    {
        $products = Product::where('user_id', session('usuario_id'))->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => session('usuario_id')
        ];

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('produtos', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }

    public function show(Product $product)
    {
        if ($product->user_id != session('usuario_id')) {
            return redirect()->route('products.index');
        }

        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        if ($product->user_id != session('usuario_id')) {
            return redirect()->route('products.index');
        }

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->user_id != session('usuario_id')) {
            return redirect()->route('products.index');
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ];

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('produtos', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Product $product)
    {
        if ($product->user_id != session('usuario_id')) {
            return redirect()->route('products.index');
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produto removido com sucesso!');
    }
}
