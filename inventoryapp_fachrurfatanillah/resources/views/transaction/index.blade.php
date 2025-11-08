@extends('layouts.master')
@section('title', "Transaksi")
@section('content')

<?php 
    // dd($transactionData);
?>

<div class="card shadow-sm border-0 rounded-4 overflow-hidden mx-auto">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4">
        <h4 class="mb-0 fw-bold text-light">Daftar Transaksi</h4>
        <a href="/transaction/create" class="btn btn-light btn-sm fw-semibold rounded-pill px-3">
            + Tambah Transaksi
        </a>
    </div>

    <div class="card-body bg-light p-4">
        @if (session('success'))
            <div class="alert alert-success rounded-3">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr class="text-center">
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Produk</th>
                    <th>Type</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactionData as $trx)
                    <tr>
                        <td class="text-center">TR{{ $loop->iteration }}</td>
                        <td>{{ $trx->user->username }}</td>
                        <td>{{ $trx->product->name }}</td>
                        <td class="text-center">
                            @if ($trx->type === 'in')
                                <span class="badge bg-success px-4 py-1 text-center d-inline-block">In</span>
                            @else
                                <span class="badge bg-danger px-3 py-1 text-center d-inline-block">Out</span>
                            @endif
                        </td>
                        <td class="text-end fw-semibold">{{ number_format($trx->amount, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada transaksi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-3">
            <a href="/transaction/create" class="btn btn-primary rounded-pill px-4">
                + Tambah Transaksi
            </a>
        </div>
    </div>
</div>

@endsection
