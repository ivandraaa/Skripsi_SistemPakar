@extends('admin.admin_main')
@section('title', 'Dashboard')

{{-- isi --}}
@section('admin_content')
    <!-- Page content-->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Admin</a></li>
                    <li class="breadcrumb-item active">Daftar Admin</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- Display success alert if available -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <section class="section dashboard">
            <div class="row">
                <style>
                    .card-text {
                        font-size: 14px;
                        color: #666;
                    }

                    .card-title {
                        font-size: 18px;
                        font-weight: bold;
                    }

                    .card-actions {
                        display: flex;
                        justify-content: space-between;
                        margin-top: 10px;
                    }
                </style>
                <div class="card-deck">
                    @foreach ($user as $u)
                        <div class="card">
                            <i class="bi bi-person-fill"></i>
                            <div class="card-body">
                                <h5 class="card-title">Nama: {{ $u->name }}</h5>
                                <p class="card-text">Email: {{ $u->email }}</p>
                                <p class="card-text">Role: {{ $u->role }}</p>
                                <div class="card-actions">
                                    <a href="{{ route('admin.delete', ['id' => $u->id]) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
