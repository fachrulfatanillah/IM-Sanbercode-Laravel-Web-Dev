@extends('layouts.master')
@section('title', "Edit Category")
@section('content')

<div class="card shadow-sm border-0 rounded-4 overflow-hidden mx-auto">
    <div class="card-header bg-primary text-white text-center py-3">
        <h4 class="mb-0 fw-bold text-light">Edit Category</h4>
    </div>

    <div class="card-body bg-light px-4 py-4">
        <form action="/category/{{ $editCategory->id }}" method="POST">
            @csrf
            @method("PUT")

            {{-- Tampilkan error jika ada --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Category Name --}}
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Category Name</label>
                <input type="text" name="name" id="name" class="form-control rounded-3" 
                       value="{{ old('name', $editCategory->name) }}" placeholder="Masukkan nama category" required>
            </div>

            {{-- Category Description --}}
            <div class="mb-3">
                <label for="description" class="form-label fw-semibold">Category Description</label>
                <textarea name="description" id="description" class="form-control rounded-3" 
                          cols="30" rows="5" placeholder="Masukkan deskripsi category">{{ old('description', $editCategory->description) }}</textarea>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="/category" class="btn btn-outline-primary rounded-pill px-4">Batal</a>
                <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

@endsection
