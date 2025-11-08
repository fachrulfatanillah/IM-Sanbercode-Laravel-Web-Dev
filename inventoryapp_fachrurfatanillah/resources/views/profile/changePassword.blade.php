@extends('layouts.master')
@section('title', "Ganti Password")
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow-sm border-0 rounded-4 overflow-hidden mx-auto">
    <div class="card-header text-white text-center py-3" style="background-color: rgb(0, 106, 255)">
        <h4 class="mb-0 fw-bold text-light">Ganti Password</h4>
    </div>

    <div class="card-body bg-light px-4 py-4">
        <form action="/profile/change-password" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="current_password" class="form-label fw-semibold">Password Lama</label>
                <input 
                    type="password" 
                    class="form-control rounded-3" 
                    id="current_password" 
                    name="current_password" 
                    placeholder="Masukkan password lama" 
                    required>
            </div>

            <div class="mb-3">
                <label for="new_password" class="form-label fw-semibold">Password Baru</label>
                <input 
                    type="password" 
                    class="form-control rounded-3" 
                    id="new_password" 
                    name="new_password" 
                    placeholder="Masukkan password baru" 
                    required>
            </div>

            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label fw-semibold">Konfirmasi Password Baru</label>
                <input 
                    type="password" 
                    class="form-control rounded-3" 
                    id="new_password_confirmation" 
                    name="new_password_confirmation" 
                    placeholder="Ulangi password baru" 
                    required>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="/profile" class="btn btn-outline-primary rounded-pill px-4">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary rounded-pill px-4">
                    Simpan Password
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
