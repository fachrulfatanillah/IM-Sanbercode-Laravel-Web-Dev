@extends('layouts.master')
@section('title', "Tambah Product")
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary">
            <h5 class="mb-0 text-white">Tambah Produk</h5>
        </div>
        <div class="card-body">
            <form action="/products/create" method="POST" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill"></i> Terjadi Kesalahan!</h5>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori Produk</label>
                    <select name="category" class="form-select" id="category_id" name="category_id">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Produk</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul produk">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga Produk (Rp)</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan harga produk">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Jumlah Stok</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan jumlah stok">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Produk</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Tuliskan deskripsi produk"></textarea>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="/products" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection