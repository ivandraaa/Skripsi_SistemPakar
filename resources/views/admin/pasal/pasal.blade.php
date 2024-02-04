<!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

@extends('admin.admin_main')
@section('title', 'Pasal')

{{-- isi --}}
@section('admin_content')
    <!-- Page content-->
    <div class="container text-center mt-lg-5 p-lg-5">
        <div class="row">
            <div class="col-lg-8 justify-content-center mx-auto">
                @if (session()->has('pesan'))
                    {!! session('pesan') !!}
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger mt-3 p-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mt-2 pt-3 d-flex ms-auto">
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#pasalModal">
                        <i class="bi bi-plus-circle-fill"> Tambah Pasal</i>
                    </button>
                </div>
                <table id="tabel-identifikasi" class="table table-bordered table-hover my-2">
                    <thead>
                        <tr>
                            <th scope="col">
                                <center>#</center>
                            </th>
                            <th scope="col">
                                <center>Kode Pasal</center>
                            </th>
                            <th scope="col">
                                <center>Pasal</center>
                            </th>
                            <th scope="col">
                                <center>Aksi</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasal as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->kode_pasal }}</td>
                                <td>{{ $item->pasal }}</td>
                                <td>
                                    <button class="btn btn-outline-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        onclick="updateInput('{{ $item->id }}',
                                '{{ $item->kode_pasal }}', '{{ $item->pasal }}'), actionUbahpasal('{{ route('pasal.update', $item->id) }}')">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form action="{{ route('pasal.destroy', $item) }}" class="d-inline" method="POST">
                                        @method('DELETE')
                                        @csrf()
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @include('components.admin_modal_pasal_edit')
            </div>
        </div>
    </div>

@endsection
