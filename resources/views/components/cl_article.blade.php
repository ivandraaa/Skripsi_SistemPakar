<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="my-4 card border border-primary shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-decoration-underline text-center" style="text-transform: uppercase;">
                    {{ $artikel->judul }}</h2>
                <p class="card-text" style="text-align: justify;">{{ $artikel->isi }}</p>
                <p class="card-text" style="text-align: justify;">{{ $artikel->referensi }}</p>
                <p class="card-text text-decoration-underline fst-italic" style="text-align: justify;">
                    {{ $artikel->kategori_pelanggaran }}</p>

            </div>
        </div>
    </div>
</div>
