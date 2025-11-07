@extends('layouts.master')
@section('title', "Profile")
@section('content')

<div class="card shadow-sm border-0 rounded-4 overflow-hidden">
    <div class="card-header text-white text-center py-4" style="background-color: rgb(0, 106, 255)">
        <div class="position-relative d-inline-block">
            <img src="https://ui-avatars.com/api/?name=FachrurFatanillah&background=ffffff&color=0D6EFD&bold=true"
                alt="Profile Picture"
                class="rounded-circle border border-3 border-light shadow-sm"
                style="width: 120px; height: 120px; object-fit: cover;">
        </div>
        <h4 class="mt-3 mb-0 fw-bold text-light">Fachrur Fatanillah</h4>
    </div>

    <div class="card-body bg-light px-4">
        <div class="row mb-4">
            <div class="col-md-6 mb-4">
                <h6 class="text-muted mb-1">Email</h6>
                <p class="fw-semibold mb-0">fachrul.fatanillah@gmail.com</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="text-muted mb-1">Joined</h6>
                <p class="fw-semibold mb-0">March 2023</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="text-muted mb-1">Umur</h6>
                <p class="fw-semibold mb-0">23</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="text-muted mb-1">Role</h6>
                <p class="fw-semibold mb-0">Staf</p>
            </div>
        </div>

        <hr>

        <h6 class="fw-bold mb-3 text-primary">Tentang Saya</h6>
        <p class="text-muted mb-4" style="text-align: justify;">
        Saya seorang Software Developer yang fokus pada pengembangan backend dan sistem berbasis web. 
        Saya memiliki minat besar pada arsitektur aplikasi, keamanan data, serta integrasi API.
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
