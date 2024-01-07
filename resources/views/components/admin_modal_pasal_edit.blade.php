<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pasal</title>
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
    <!-- Modal Edit pasal -->
    <div class="modal fade modal-fullscreen-md-down" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Pasal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- form --}}
                    <form id="edit-pasal" action="" method="post">
                        @method('put')
                        @csrf
                        <div class="input-form d-flex">
                            <input type="hidden" name="id" id="id_pasal">
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="kode-pasal" name="kode_pasal" readonly>
                                <label for="kode-pasal">Kode Pasal</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="pasal" name="pasal">
                                <label for="pasal">Pasal</label>
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
    {{-- end modal edit pasal --}}

    {{-- modal tambah pasal --}}
    <div class="modal fade modal-fullscreen-md-down" id="pasalModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pasal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- form edit --}}
                    <form id="tambah-pasal" action="{{ route('pasal.store') }}" method="post">
                        @csrf
                        <div class="input-form d-flex">
                            <input type="hidden" name="id" id="id_pasal">
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="kode-pasal" name="kode_pasal"
                                    placeholder="kode pasal" required>
                                <label for="kode-pasal">Kode Pasal</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="pasal" name="pasal" placeholder="pasal"
                                    required>
                                <label for="pasal">Pasal</label>
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
    {{-- end modal tambah pasal --}}

    <script>
        function updateInput(idpasal, kode, pasal) {
            document.getElementById("kode-pasal").value = kode;
            document.getElementById("pasal").value = pasal;
            document.getElementById("id_pasal").value = idpasal;
        }

        function actionUbahpasal(params) {
            const formpasal = document.getElementById('edit-pasal');
            formpasal.setAttribute('action', params);
            formpasal.setAttribute('method', 'POST');
            console.log(formpasal);
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>