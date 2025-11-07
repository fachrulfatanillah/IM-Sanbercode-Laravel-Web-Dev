@extends('layouts.master')
@section('title', "Daftar Produk")
@section('content')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/products/create" class="btn btn-primary btn-sm my-3 mx-3 mb-4 px-4 py-2 rounded-pill shadow-sm d-inline-flex align-items-center gap-2">
    Tambah Produk
</a>

<div class="container-fluid">
    <div class="row">
        @foreach ($products as $item)
            {{-- Card --}}
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="Produk 1">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title mb-2">{{ $item->name }}</h5>
                        <p class="card-text text-muted mb-3" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">{{ $item->description }}</p>

                        {{-- Kategori Produk --}}
                        <p class="mb-2"><span class="badge text-dark rounded-4" style="background-color: #dddddd;">{{ $item->category->name }}</span></p>

                        {{-- Harga dan Stok --}}
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <small style="color: #4e4e4e;">Stok: {{ number_format($item->stock, 0, ',', '.') }}</small>
                            <p class="mb-0 fw-bold" style="color: #4e4e4e;">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="mt-auto">
                            <a href="/products/{{ $item->category->name }}/{{ $item->uuid }}/detail/{{ $item->name }}" class="btn btn-primary w-100 mb-2">Lihat Detail</a>
                            <div class="d-flex justify-content-between">
                                <a href="/products/edit" class="btn btn-warning btn-sm w-50 me-2 rounded-4">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm w-50 rounded-4">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>


@endsection