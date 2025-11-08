@extends('layouts.master')
@section('title', "Tambah Transaksi")
@section('content')

<div class="card shadow-sm border-0 rounded-4 overflow-hidden mx-auto">
    <div class="card-header bg-primary text-white text-center py-3">
        <h4 class="mb-0 fw-bold text-light">Tambah Transaksi</h4>
    </div>

    <div class="card-body bg-light px-4 py-4">
        <form action="/transaction/create" method="POST">
            @csrf

            {{-- Pilih Produk --}}
            <div class="mb-3">
                <label for="produk" class="form-label fw-semibold">Pilih Produk</label>
                <select class="form-select rounded-3" id="produk" name="products_id" required>
                    <option value="" disabled selected>-- Pilih Produk --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Type Transaksi --}}
            <div class="mb-3">
                <label for="type" class="form-label fw-semibold">Tipe Transaksi</label>
                <select class="form-select rounded-3" id="type" name="type" required>
                    <option value="" disabled selected>-- Pilih Tipe --</option>
                    <option value="in">Masuk (In)</option>
                    <option value="out">Keluar (Out)</option>
                </select>
            </div>

            {{-- Jumlah --}}
            <div class="mb-3">
                <label for="amount" class="form-label fw-semibold">Jumlah</label>
                <input 
                    type="number" 
                    class="form-control rounded-3" 
                    id="amount" 
                    name="amount" 
                    placeholder="Masukkan jumlah transaksi" 
                    required>
            </div>

            {{-- Catatan --}}
            <div class="mb-3">
                <label for="notes" class="form-label fw-semibold">Catatan</label>
                <textarea 
                    class="form-control rounded-3" 
                    id="notes" 
                    name="notes" 
                    rows="4" 
                    placeholder="Tuliskan keterangan tambahan (opsional)..."></textarea>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="/transaction" class="btn btn-outline-primary rounded-pill px-4">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary rounded-pill px-4">
                    Simpan Transaksi
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
