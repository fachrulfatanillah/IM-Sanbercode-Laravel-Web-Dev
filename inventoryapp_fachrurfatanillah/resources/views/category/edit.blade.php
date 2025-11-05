@extends('layouts.master')
@section('title', "Update Category")
@section('content')

<form action="/category/{{ $editCategory->id }}" method="POST">
    @csrf
    @method("PUT")

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

  <div class="mb-3">
    <label class="form-label">Category Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $editCategory->name) }}">
  </div>
  <div class="mb-3">
    <label class="form-label" class="form-label">Category Description</label>
    <textarea name="description" class="formo-control" id="" cols="30" rows="10" >{{old('description', $editCategory->description)}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
@endsection