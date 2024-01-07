<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
    </style>
</head>

<body>
    <!-- Modal Edit Identifikasi -->
    <div class="modal fade modal-fullscreen-md-down" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Identifikasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- form --}}
                    <form id="edit-identifikasi" action="" method="post">
                        @method('put')
                        @csrf
                        <div class="input-form d-flex">
                            <input type="hidden" name="id" id="id_identifikasi">
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="kode-identifikasi"
                                    placeholder="kode identifikasi" name="kode_identifikasi" readonly>
                                <label for="kode-identifikasi">Kode Identifikasi</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="identifikasi" placeholder="identifikasi"
                                    name="identifikasi">
                                <label for="identifikasi">Identifikasi</label>
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
    {{-- end modal edit identifikasi --}}

    {{-- modal tambah identifikasi --}}
    <div class="modal fade modal-fullscreen-md-down" id="storeModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Identifikasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- form edit --}}
                    <form id="tambah-identifikasi" action="{{ route('identifikasi.store') }}" method="post">
                        @csrf
                        <div class="input-form d-flex">
                            <input type="hidden" name="id" id="id_identifikasi">
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="kode-identifikasi" name="kode_identifikasi"
                                    required>
                                <label id='kode_app' for="kode-identifikasi">Kode Identifikasi</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="identifikasi" name="identifikasi"
                                    required>
                                <label id='main_app' for="identifikasi">Identifikasi</label>
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
    {{-- end modal tambah identifikasi --}}

    <script>
        function updateInput(idIdentifikasi, kode, identifikasi) {
            document.getElementById("kode-identifikasi").value = kode;
            document.getElementById("identifikasi").value = identifikasi;
            document.getElementById("id_identifikasi").value = idIdentifikasi;
        }

        function actionUbahIdentifikasi(params) {
            const formIdentifikasi = document.getElementById('edit-identifikasi');
            formIdentifikasi.setAttribute('action', params);
            formIdentifikasi.setAttribute('method', 'POST');
            console.log(formIdentifikasi);
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>