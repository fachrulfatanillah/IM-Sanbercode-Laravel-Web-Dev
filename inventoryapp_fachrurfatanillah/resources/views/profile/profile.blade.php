@extends('layouts.master')
@section('title', "Profile")
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow-sm border-0 rounded-4 overflow-hidden">
    <div class="card-header text-white text-center py-4" style="background-color: rgb(0, 106, 255)">
        <div class="position-relative d-inline-block">
            <img src="https://ui-avatars.com/api/?name={{ $userData->username }}&background=ffffff&color=0D6EFD&bold=true"
                alt="Profile Picture"
                class="rounded-circle border border-3 border-light shadow-sm"
                style="width: 120px; height: 120px; object-fit: cover;">
        </div>
        <h4 class="mt-3 mb-0 fw-bold text-light">{{ $userData->username }}</h4>
    </div>

    <div class="card-body bg-light px-4">
        <div class="row mb-4">
            <div class="col-md-6 mb-4">
                <h6 class="text-muted mb-1">Email</h6>
                <p class="fw-semibold mb-0">{{ $userData->email }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="text-muted mb-1">Joined</h6>
                <p class="fw-semibold mb-0">{{ $userData->create_At }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="text-muted mb-1">Umur</h6>
                <p class="fw-semibold mb-0">{{ $userData->profile?->age ?? '-' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="text-muted mb-1">Role</h6>
                <p class="fw-semibold mb-0">{{ $userData->status }}</p>
            </div>
        </div>

        <hr>

        <h6 class="fw-bold mb-3 text-primary">Tentang Saya</h6>
        <p class="text-muted mb-4" style="text-align: justify;">
        {{ $userData->profile?->bio ?? '-' }}
        </p>

        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="/profile/change-password" class="btn btn-outline-primary rounded-pill px-4">
                Ganti Password
            </a>
            <a href="/profile/edit" class="btn btn-outline-primary rounded-pill px-4">
                Edit Profile
            </a>
        </div>
    </div>
</div>

@endsection
