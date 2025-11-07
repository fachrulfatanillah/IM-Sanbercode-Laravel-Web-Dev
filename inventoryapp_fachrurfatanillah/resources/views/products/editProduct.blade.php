@extends('layouts.master')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary">
            <h5 class="mb-0 text-white">Edit Produk</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Select Kategori --}}
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="">Category 1</option>
                        <option value="">Category 2</option>
                    </select>
                </div>

                {{-- Input Gambar --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Produk</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>

                {{-- Input Judul --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Produk</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul produk">
                </div>

                {{-- Input Harga --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Harga (Rp)</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan harga produk">
                </div>

                {{-- Input Jumlah Stok --}}
                <div class="mb-3">
                    <label for="stock" class="form-label">Jumlah Stok</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan jumlah stok">
                </div>

                {{-- Input Deskripsi --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Produk</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Tuliskan deskripsi produk"></textarea>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="/products" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection