@extends('layouts.app')
@section('content')
    <h2>Create Product</h2>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="row">
            <div class="col">
                <label>Product ID *</label>
                <input name="product_id" value="{{ old('product_id') }}" required>
            </div>
            <div class="col">
                <label>Name *</label>
                <input name="name" value="{{ old('name') }}" required>
            </div>
        </div>

        <label>Description</label>
        <textarea name="description">{{ old('description') }}</textarea>

        <div class="row">
            <div class="col">
                <label>Price *</label>
                <input name="price" type="number" step="0.01" value="{{ old('price') }}" required>
            </div>
            <div class="col">
                <label>Stock</label>
                <input name="stock" type="number" value="{{ old('stock') }}">
            </div>
        </div>

        <label>Image *</label>
        <input type="file" id="imageFile" accept="image/*" required>
        <input type="hidden" name="image" id="imageData" required>

        <div style="margin-top:8px;">
            <img id="preview" style="display:none;">
        </div>

        <button class="btn" type="submit">Save</button>
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
                localStorage.setItem('product_image_temp', dataUrl);
                imageData.value = dataUrl;

                preview.src = dataUrl;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(f);
        });

        // optional: restore if reload
        const saved = localStorage.getItem('product_image_temp');
        if (saved) {
            imageData.value = saved;
            preview.src = saved;
            preview.style.display = 'block';
        }
    </script>
@endsection
