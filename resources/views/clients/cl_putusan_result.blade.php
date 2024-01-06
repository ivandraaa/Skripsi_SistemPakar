<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#welcome-message').click(function() {
                if (confirm('Apakah Anda yakin ingin logout?')) {
                    $(this).fadeOut(300, function() {
                        $('<form>', {
                                'action': "{{ route('logout') }}",
                                'method': 'POST',
                                'style': 'display: none;'
                            }).append(
                                '<input type="hidden" name="_token" value="{{ csrf_token() }}">')
                            .appendTo('body')
                            .submit();
                    });
                }
            });
        });
    </script>
</head>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
            <i>
                @auth
                    <p class="mt-3" id="welcome-message" style="cursor: pointer; color: #009244; font-size: 14px;">Selamat datang,
                        {{ auth()->user()->name }}! (Klik untuk logout)</p>
                @endauth
            </i>
        </div>
    </div>
</div>

@extends('clients.cl_main')
@section('title', 'Form Putusan')

@section('cl_content')

    <div class="container">
        <div class="row mx-auto">
            <div class="col-lg-10 mx-auto">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Putusan ID</th>
                            <th scope="col">Pasal</th>
                            <th scope="col">Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $putusan->putusan_id }}</td>
                            <td> {{ $putusan_dipilih['kode_pasal']->kode_pasal }} |
                                {{ $putusan_dipilih['kode_pasal']->pasal }}</td>
                            <td>{{ round($hasil['value'] * 100, 2) }} %</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- section 2 --}}
            <div class="row">
                <div class="">
                    <div class="d-flex"> 
                        {{-- Pakar --}}
                        <table class="table table-hover mt-lg-5 border border-primary p-3 mx-3">
                            <thead>
                                <tr>
                                    <th scope="col">Pakar</th>
                                </tr>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Identifikasi</th>
                                    <th scope="col">Nilai (MB - MD)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pakar as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $item->kode_identifikasi }} | {{ $item->kode_pasal }}
                                        </td>
                                        <td>{{ $item->mb - $item->md }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- User --}}
                        <table class="table table-hover mt-lg-5 border border-danger p-3 mx-3">
                            <thead>
                                <tr>
                                    <th scope="col">User</th>
                                </tr>
                                <tr>
                                    <th scope="col">Identifikasi</th>
                                    <th scope="col">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($identifikasi_by_user as $key)
                                    <tr>
                                        <td>{{ $key[0] }}</td>
                                        <td>{{ $key[1] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Tabel Cf Gabungan --}}
                        {{-- CF Gabungan --}}
                        <table class="table table-hover mt-lg-5 border border-info p-3 mx-3">
                            <thead>
                                <tr>
                                    <th scope="col">Hasil</th>
                                </tr>
                                <tr>
                                    <th scope="col">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cf_kombinasi['cf'] as $key)
                                    <tr>
                                        <td>{{ $key }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- section 3 --}}
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card my-4">
                        <div class="card-header">
                            Hasil
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $putusan_dipilih['kode_pasal']->kode_pasal }} |
                                {{ $putusan_dipilih['kode_pasal']->pasal }}
                            </h5>
                            <p class="card-text">Jadi dapat disimpulkan bahwa pelaku tindak pidana kecelakan lalu lintas teridentifikasi pasal tersebut dengan tingkat kepastian pakar hakim sebesar <span
                                    class="fw-semibold fs-4">{{ round($hasil['value'] * 100, 2) }}</span> %</p>
                        </div>
                    </div>
                </div>
            </div>
            @include('components.cl_article')
            <div>
                <a style="align-content: flex-end" href="/form" class="btn btn-primary mb-3"> KEMBALI</a>
            </div>
        </div>
    </div>
@endsection
