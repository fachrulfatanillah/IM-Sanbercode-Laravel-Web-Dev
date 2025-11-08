@extends('layouts.master')
@section('title', "List Category")
@section('content')

<div class="card shadow-sm border-0 rounded-4 overflow-hidden mx-auto">
    <div class="card-header bg-primary text-white text-center py-3">
        <h4 class="mb-0 fw-bold text-light">List Category</h4>
    </div>

    <div class="card-body bg-light px-4 py-4">

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="/category/create" class="btn btn-primary btn-sm rounded-pill px-4">
                Tambah Category
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $item)
                        <tr>
                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td class="text-center">
                                <form action="/category/{{ $item->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                <a href="/category/{{ $item->id }}" class="btn btn-warning btn-sm">Detail</a>
                                <a href="/category/{{ $item->id }}/edit" class="btn btn-info btn-sm">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">Tidak ada Category</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
