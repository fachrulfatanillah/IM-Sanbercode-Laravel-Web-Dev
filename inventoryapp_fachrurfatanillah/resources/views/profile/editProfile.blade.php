@extends('layouts.master')
@section('title', "Edit Profile")
@section('content')

<div class="card shadow-sm border-0 rounded-4 overflow-hidden mx-auto" >
    <div class="card-header text-white text-center py-3" style="background-color: rgb(0, 106, 255)">
        <h4 class="mb-0 fw-bold text-light">Edit Profile</h4>
    </div>

    <div class="card-body bg-light px-4 py-4">
        <form action="" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="umur" class="form-label fw-semibold">Umur</label>
                <input type="number" class="form-control rounded-3" id="umur" name="umur" placeholder="Masukkan umur" value="{{ old('umur', 23) }}" required>
            </div>

            <div class="mb-3">
                <label for="bio" class="form-label fw-semibold">Bio</label>
                <textarea class="form-control rounded-3" id="bio" name="bio" rows="5" placeholder="Tulis sesuatu tentang dirimu..." required>{{ old('bio', 'Saya seorang Software Developer yang fokus pada pengembangan backend dan sistem berbasis web.') }}</textarea>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="/profile" class="btn btn-outline-primary rounded-pill px-4">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary rounded-pill px-4">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
