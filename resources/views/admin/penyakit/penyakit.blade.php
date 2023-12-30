@extends('admin.admin_main')
@section('title', 'Gejala')

{{-- isi --}}
@section('admin_content')
    <!-- Page content-->
    <div class="container text-center mt-lg-5 p-lg-5">
        <div class="row">
          <div class="col-lg-8 justify-content-center mx-auto">
            @if (session()->has('pesan'))
                {!!  session('pesan') !!}
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
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#penyakitModal">
                    <i class="bi bi-plus-circle-fill"> Tambah Penyakit</i>
                </button>
            </div>
            <table id="tabel-gejala" class="table table-bordered table-hover my-2">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Penyakit</th>
                    <th scope="col">Penyakit</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($penyakit as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{$item->kode_penyakit}}</td>
                            <td>{{$item->penyakit}}</td>
                            <td>
                                <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="updateInput('{{ $item->id }}',
                                '{{$item->kode_penyakit}}', '{{$item->penyakit}}'), actionUbahpenyakit('{{ route('penyakit.update', $item->id) }}')">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <form action="{{ route('penyakit.destroy', $item) }}" class="d-inline" method="POST">
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

              @include('components.admin_modal_penyakit_edit')
          </div>
        </div>
    </div>

@endsection
