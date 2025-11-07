@extends('layouts.master')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary">
            <h5 class="mb-0 text-white">Edit Produk</h5>
        </div>
        <div class="card-body">
            <form action="/products/edit/{{ $dataProduct->uuid }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

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
                    <label for="category_id" class="form-label">Kategori</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $dataProduct->categories_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Input Gambar --}}
                <div class="mb-3">
                    {{-- Tampilkan gambar lama jika ada --}}
                    @if (!empty($dataProduct->image))
                        <div class="mt-2">
                            <p class="text-muted mb-1">Gambar saat ini:</p>
                            <img id="previewImage"
                                src="{{ asset('storage/' . $dataProduct->image) }}" 
                                alt="Gambar Produk" 
                                class="img-thumbnail" 
                                style="max-width: 200px;">
                        </div>
                    @else
                        <img id="previewImage" 
                            src="#" 
                            alt="Preview Gambar" 
                            class="img-thumbnail d-none" 
                            style="max-width: 200px;">
                    @endif

                    <label for="image" class="form-label mt-2">Ganti Gambar Produk</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>

                {{-- Input Judul --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Produk</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $dataProduct->name }}">
                </div>

                {{-- Input Harga --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Harga (Rp)</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $dataProduct->price }}">
                </div>

                {{-- Input Jumlah Stok --}}
                <div class="mb-3">
                    <label for="stock" class="form-label">Jumlah Stok</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $dataProduct->stock }}">
                </div>

                {{-- Input Deskripsi --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Produk</label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ $dataProduct->description }}</textarea>
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

<script>
document.getElementById('image').addEventListener('change', function (event) {
    const preview = document.getElementById('previewImage');
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        };

        reader.readAsDataURL(file);
    }
});
</script>


@endsection