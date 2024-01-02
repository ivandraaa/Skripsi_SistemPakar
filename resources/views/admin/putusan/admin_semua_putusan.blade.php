@extends('admin.admin_main')
@section('title', 'Dashboard')

{{-- isi --}}
@section('admin_content')
    <!-- Page content-->
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-hover mt-2 p-2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Putusan ID</th>
                                <th scope="col">Pasal</th>
                                <!-- <th scope="col">Persentase</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($putusan as $item)
                                <?php $int = 0; ?>
                                <?php $data_putusan = json_decode($item->data_putusan, true); ?>
                                <?php foreach ($data_putusan as $val) {
                                    if (floatval($val['value']) > $int) {
                                        $putusan_dipilih['value'] = floatval($val['value']);
                                        $putusan_dipilih['kode_pasal'] = App\Models\TingkatPasal::where('kode_pasal', $val['kode_pasal'])->first();
                                        $int = floatval($val['value']);
                                    }
                                } ?>
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->putusan_id }}</td>
                                    <td> {{ $putusan_dipilih['kode_pasal']->kode_pasal }} |
                                        {{ $putusan_dipilih['kode_pasal']->pasal }}</td>
                                    <!-- <td>{{ $putusan_dipilih['value'] * 100 }} %</td> -->
                                    <td><a class="p-2"
                                            href="{{ route('spk.result', ['putusan_id' => $item->putusan_id]) }}">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
