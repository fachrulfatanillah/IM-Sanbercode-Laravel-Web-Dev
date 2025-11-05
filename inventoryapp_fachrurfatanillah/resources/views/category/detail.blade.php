@extends('layouts.master')
@section('title', "Detail Category")
@section('content')

<h1 class="text-primary">{{ $detailCategory->name }}</h1>
<p>{{ $detailCategory->description }}</p>

<a href="/category" class="btn btn-secondary btn-sm">Kembali</a>

@endsection