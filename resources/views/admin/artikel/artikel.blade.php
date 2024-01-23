<!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

@extends('admin.admin_main')
@section('title', 'Artikel')

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
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#storeModal">
                        <i class="bi bi-plus-circle-fill"> Tambah Artikel</i>
                    </button>
                </div>
                <table id="tabel-identifikasi" class="table table-bordered table-hover my-2">
                    <thead>
                        <tr>
                            <th scope="col"> <center>#</center></th>
                            <th scope="col"><center>Kode Pasal</center></th>
                            <th scope="col"><center>Judul</center></th>
                            <th scope="col"><center>Isi</center></th>
                            <th scope="col"><center>Referensi</center></th>
                            <th scope="col"><center>Kategori Pelanggaran</center></th>
                            <th scope="col"><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artikel as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration + $artikel->firstItem() - 1 }}</th>
                                <td>{{ $item->kode_pasal }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->isi }}</td>
                                <td>{{ $item->referensi }}</td>
                                <td>{{ $item->kategori_pelanggaran }}</td>
                                <td>
                                    <button class="btn btn-outline-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        onclick="updateInput('{{ $item->id }}', '{{ $item->kode_pasal }}', '{{ $item->judul }}', '{{ $item->isi }}', '{{ $item->referensi }}', '{{ $item->kategori_pelanggaran }}'), actionUbahIdentifikasi('/artikel/{{ $item->id }}')">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form action="/artikel/{{ $item->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $artikel->links('pagination.custom') }}
                </div>
                @include('components.admin_modal_artikel_edit')
            </div>
        </div>
    </div>
@endsection