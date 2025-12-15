
@extends('layouts.app')

@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
    <h2 style="margin:0;">Products</h2>
    <a class="btn" href="{{ route('products.create') }}">+ Create</a>
</div>

<table>
    <thead>
        <tr>
            <th style="width:60px;">ID</th>
            <th style="width:140px;">Product ID</th>
            <th>Name</th>
            <th style="width:110px;">Price</th>
            <th style="width:100px;">Stock</th>
            <th style="width:120px;">Image</th>
            <th style="width:200px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td><strong>{{ $p->product_id }}</strong></td>
                <td>{{ $p->name }}</td>
                <td>{{ number_format($p->price, 2) }}</td>
                <td>{{ $p->stock ?? '-' }}</td>
                <td>
                    <img src="{{ $p->image }}" alt="image">
                </td>
                <td>
                    <a class="btn" href="{{ route('products.show', $p->id) }}">View</a>
                    <a class="btn" href="{{ route('products.edit', $p->id) }}">Edit</a>

                    <form action="{{ route('products.destroy', $p->id) }}"
                          method="POST"
                          style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"
                                onclick="return confirm('Delete this product?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align:center;padding:20px;">
                    No products found
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $products->links() }}
@endsection
