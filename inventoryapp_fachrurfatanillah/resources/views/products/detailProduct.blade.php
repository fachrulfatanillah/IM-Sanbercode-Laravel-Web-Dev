@extends('layouts.master')
@section('title', "Detail Produk")
@section('content')

<div class="container mt-4">
    <div class="row">
        {{-- Gambar Produk --}}
        <div class="col-md-5">
            <div class="card border-0 shadow-sm">
                <img src="{{ asset('storage/' . $dataProduct->image) }}" class="card-img-top rounded" alt="Gambar Produk">
            </div>
        </div>

        {{-- Informasi Produk --}}
        <div class="col-md-7">
            <h2 class="fw-bold mb-3">{{ $dataProduct->name }}</h2>
            <p class="text-muted mb-4" style="text-align: justify;">{{ $dataProduct->description }}</p>

            {{-- Harga dan Stok --}}
            <div class="mb-3">
                <h4 class="fw-bold" style="color: #4e4e4e;">Rp {{ number_format($dataProduct->price, 0, ',', '.') }}</h4>
                <p class="mb-0" style="color: #4e4e4e;">Stok tersedia: <strong>{{ number_format($dataProduct->stock, 0, ',', '.') }}</strong></p>
            </div>

            {{-- Kategori --}}
            <div class="mb-3">
                <p class="mb-0"><strong>Kategori:</strong> {{ $dataProduct->category->name }}</p>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-end gap-2 mt-4">
                @if (Auth::user()->status == 'admin')
                    <a href="/products/edit/{{ $dataProduct->uuid }}" class="btn btn-warning px-4 rounded-pill">Edit Produk</a>
                    {{-- <a href="#" class="btn btn-danger px-4 rounded-pill">Hapus Produk</a> --}}
                    <button type="button" class="btn btn-danger px-4 rounded-pill" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $dataProduct->uuid }}">
                        Hapus
                    </button>
                @endif
                <a href="/products" class="btn btn-secondary px-4 rounded-pill">Kembali</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Hapus -->
<div class="modal fade" id="deleteModal{{ $dataProduct->uuid }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $dataProduct->uuid }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $dataProduct->uuid }}">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus produk <strong>{{ $dataProduct->name }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="/products/delete/{{ $dataProduct->uuid }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
