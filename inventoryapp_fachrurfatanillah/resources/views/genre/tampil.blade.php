@extends('layouts.master')
@section('title', "Tampil Category")
@section('content')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/genre/create" class="btn btn-primary btn-sm my-2">Tambah</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($categories as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td colspan="2">{{ $item->name }}</td>
            <td>
                <form action="/genre/{{ $item->id }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                    <a href="/genre/{{ $item->id }}" class="btn btn-warning btn-sm">Detail</a>
                    <a href="/genre/{{ $item->id }}/edit" class="btn btn-info btn-sm">Edit</a>

                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td>Tidak ada Genre</td>
        </tr>
    @endforelse
  </tbody>
</table>

@endsection