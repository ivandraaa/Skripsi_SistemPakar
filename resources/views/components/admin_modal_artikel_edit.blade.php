<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Add your styles here */
        .input-form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .form-floating {
            width: 100%;
        }

        .btn-primary {
            margin-top: 15px;
        }

        .mb-label {
            position: relative;
        }

        #mbDropdownIcon,
        #mdDropdownIcon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .form-floating .form-control {
            padding-right: 30px;
            /* Tambahkan ruang untuk ikon dropdown */
        }
    </style>
</head>

<body>
    <!-- Modal Edit Identifikasi -->
    <div class="modal fade modal-fullscreen-md-down" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Artikel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- form --}}
                    <form id="edit-artikel" action="" method="post">
                        @method('put')
                        @csrf
                        <div class="input-form d-flex">
                            <input type="hidden" name="id" id="id_artikel">
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="kode-pasal"
                                    placeholder="kode pasal" name="kode_pasal">
                                <label for="kode-pasal">Kode Pasal</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="judul" placeholder="judul"
                                    name="judul">
                                <label for="judul">Judul</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="isi" placeholder="isi"
                                    name="isi">
                                <label for="isi">isi</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="referensi" placeholder="referensi"
                                    name="referensi">
                                <label for="referensi">Referensi</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="kategori_pelanggaran" placeholder="kategori_pelanggaran"
                                    name="kategori_pelanggaran">
                                <label for="kategori_pelanggaran">Kategori Pelanggaran</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal edit artikel --}}

    {{-- modal tambah artikel --}}
    <div class="modal fade modal-fullscreen-md-down" id="storeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Artikel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- form tambah --}}
                    <form id="tambah-artikel" action="{{ route('artikel.store') }}" method="post">
                        @csrf
                        <div class="input-form d-flex">
                            <input type="hidden" name="id" id="id_artikel">
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="kode-pasal"
                                    name="kode_pasal" required>
                                <label id='kode-pasal' for="kode-pasal">Kode Pasal</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="judul" name="judul" required>
                                <label id='judul' for="judul">Judul</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="isi" name="isi" required>
                                <label id='isi' for="isi">Isi</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="referensi" name="referensi" required>
                                <label id='referensi' for="referensi">Referensi</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="kategori_pelanggaran" name="kategori_pelanggaran" required>
                                <label id='kategori_pelanggaran' for="kategori_pelanggaran">Kategori Pelangggaran</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal tambah artikel --}}

    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('show');
        }

        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('.dropdown-content');
            dropdowns.forEach(function(dropdown) {
                if (dropdown.classList.contains('show') && !dropdown.contains(event.target)) {
                    dropdown.classList.remove('show');
                }
            });
        });

        function updateInput(idIdentifikasi, kode, judul, isi, referensi, kategori_pelanggaran) {
            document.getElementById("kode-pasal").value = kode;
            document.getElementById("judul").value = judul;
            document.getElementById("isi").value = isi;
            document.getElementById("referensi").value = referensi;
            document.getElementById("kategori_pelanggaran").value = kategori_pelanggaran;
            document.getElementById("id_artikel").value = idIdentifikasi;
        }

        function actionUbahIdentifikasi(params) {
            const formIdentifikasi = document.getElementById('edit-artikel');
            formIdentifikasi.setAttribute('action', params);
            formIdentifikasi.setAttribute('method', 'POST');
            console.log(formIdentifikasi);
        }
    </script>
</body>

</html>
