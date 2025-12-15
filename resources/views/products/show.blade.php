@extends('layouts.app')
@section('content')
    <h2>Product Details</h2>

    <p><b>ID:</b> {{ $product->id }}</p>
    <p><b>Product ID:</b> {{ $product->product_id }}</p>
    <p><b>Name:</b> {{ $product->name }}</p>
    <p><b>Description:</b> {{ $product->description }}</p>
    <p><b>Price:</b> {{ $product->price }}</p>
    <p><b>Stock:</b> {{ $product->stock }}</p>
    <p><b>Image:</b><br><img src="{{ $product->image }}" alt=""></p>

    <a class="btn" href="{{ route('products.edit', $product->id) }}">Edit</a>
    <a class="btn" href="{{ route('products.index') }}">Back</a>
@endsection
