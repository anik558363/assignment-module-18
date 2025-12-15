<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|string|unique:products,product_id',
            'name'       => 'required|string',
            'description' => 'nullable|string',
            'price'      => 'required|numeric',
            'stock'      => 'nullable|integer',
            'image'      => 'required|string',
        ]);

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'product_id' => 'required|string|unique:products,product_id,' . $product->id,
            'name'       => 'required|string',
            'description' => 'nullable|string',
            'price'      => 'required|numeric',
            'stock'      => 'nullable|integer',
            'image'      => 'required|string',
        ]);

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated!');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }
}
