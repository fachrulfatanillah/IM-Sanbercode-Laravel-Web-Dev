@extends('layouts.master')
@section('title', "Detail Kategori")
@section('content')

<div class="card shadow-sm border-0 rounded-4 overflow-hidden mx-auto mb-4">
    <div class="card-header bg-primary text-white py-3">
        <h4 class="mb-0 fw-bold text-light">{{ $detailCategory->name }}</h4>
    </div>
    <div class="card-body bg-light px-4 py-4">
        <p class="mb-0">{{ $detailCategory->description }}</p>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold">Daftar Produk</h5>
    <a href="/category" class="btn btn-outline-primary rounded-pill px-4">Kembali</a>
</div>

<table class="table table-hover">
    <thead class="table-light">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Stock</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($detailCategory->products as $product)
        <?php 
        ?>
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="/products/{{ $product->category->name }}/{{ $product->uuid }}/detail/{{ $product->name }}" class="btn btn-primary btn-sm">Detail</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Belum ada produk pada category ini</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
