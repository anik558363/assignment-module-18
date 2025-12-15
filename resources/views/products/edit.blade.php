@extends('layouts.app')
@section('content')
    <h2>Edit Product</h2>

    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <label>Product ID *</label>
                <input name="product_id" value="{{ old('product_id', $product->product_id) }}" required>
            </div>
            <div class="col">
                <label>Name *</label>
                <input name="name" value="{{ old('name', $product->name) }}" required>
            </div>
        </div>

        <label>Description</label>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>

        <div class="row">
            <div class="col">
                <label>Price *</label>
                <input name="price" type="number" step="0.01" value="{{ old('price', $product->price) }}" required>
            </div>
            <div class="col">
                <label>Stock</label>
                <input name="stock" type="number" value="{{ old('stock', $product->stock) }}">
            </div>
        </div>

        <label>Image *</label>
        <input type="file" id="imageFile" accept="image/*">
        <input type="hidden" name="image" id="imageData" value="{{ old('image', $product->image) }}" required>

        <div style="margin-top:8px;">
            <img id="preview" src="{{ old('image', $product->image) }}">
        </div>

        <button class="btn" type="submit">Update</button>
        <a class="btn" href="{{ route('products.index') }}">Back</a>
    </form>

    <script>
        const file = document.getElementById('imageFile');
        const imageData = document.getElementById('imageData');
        const preview = document.getElementById('preview');

        file.addEventListener('change', () => {
            const f = file.files[0];
            if (!f) return;

            const reader = new FileReader();
            reader.onload = (e) => {
                const dataUrl = e.target.result;
                localStorage.setItem('product_image_edit_' + {{ $product->id }}, dataUrl);
                imageData.value = dataUrl;
                preview.src = dataUrl;
            };
            reader.readAsDataURL(f);
        });
    </script>
@endsection
