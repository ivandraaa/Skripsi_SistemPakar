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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Keputusan</h1>
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
                                    placeholder="kode identifikasi" name="kode_identifikasi">
                                <label for="kode-identifikasi">Kode Identifikasi</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="kode-pasal" placeholder="kode pasal"
                                    name="kode_pasal">
                                <label for="kode-pasal">Kode Pasal</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="mb" placeholder="mb"
                                    name="mb">
                                <label for="mb">MB</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="md" placeholder="md"
                                    name="md">
                                <label for="md">MD</label>
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
    <div class="modal fade modal-fullscreen-md-down" id="storeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Keputusan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- form tambah --}}
                    <form id="tambah-identifikasi" action="{{ route('keputusan.store') }}" method="post">
                        @csrf
                        <div class="input-form d-flex">
                            <input type="hidden" name="id" id="id_identifikasi">
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="kode-identifikasi"
                                    name="kode_identifikasi" required>
                                <label id='kode_app' for="kode-identifikasi">Kode Identifikasi</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <input type="text" class="form-control" id="kode-pasal" name="kode_pasal" required>
                                <label id='main_app' for="kode-pasal">Kode Pasal</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <label for="mb" class="mb-label">
                                    MB
                                    <span id="mbDropdownIcon" class="dropdown-icon"
                                        onclick="toggleDropdown('mbDropdownContent')">&#9660;</span>
                                </label>
                                <select class="form-control dropdown-content" id="mbDropdownContent" name="mb"
                                    onchange="updateMd()">
                                    <option value="0">Tidak Tahu (0)</option>
                                    <option value="0.2">Tidak Yakin (0.2)</option>
                                    <option value="0.4">Mungkin (0.4)</option>
                                    <option value="0.6">Kemungkinan Besar (0.6)</option>
                                    <option value="0.8">Hampir Pasti (0.8)</option>
                                    <option value="1">Pasti (1)</option>
                                </select>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <label for="md" class="mb-label">
                                    MD
                                    <span id="mdDropdownIcon" class="dropdown-icon"
                                        onclick="toggleDropdown('mdDropdownContent')">&#9660;</span>
                                </label>
                                <select class="form-control dropdown-content" id="mdDropdownContent" name="md"
                                    onchange="updateMb()">
                                    <option value="0">Tidak Tahu (0)</option>
                                    <option value="0.2">Tidak Yakin (0.2)</option>
                                    <option value="0.4">Mungkin (0.4)</option>
                                    <option value="0.6">Kemungkinan Besar (0.6)</option>
                                    <option value="0.8">Hampir Pasti (0.8)</option>
                                    <option value="1">Pasti (1)</option>
                                </select>
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

        function updateInput(idIdentifikasi, kode, kode_pasal, mb, md) {
            document.getElementById("kode-identifikasi").value = kode;
            document.getElementById("kode-pasal").value = kode_pasal;
            document.getElementById("mb").value = mb;
            document.getElementById("md").value = md;
            document.getElementById("id_identifikasi").value = idIdentifikasi;
        }

        function actionUbahIdentifikasi(params) {
            const formIdentifikasi = document.getElementById('edit-identifikasi');
            formIdentifikasi.setAttribute('action', params);
            formIdentifikasi.setAttribute('method', 'POST');
            console.log(formIdentifikasi);
        }
    </script>
</body>

</html>
