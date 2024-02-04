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
                                <label for="mb" class="mb-label">
                                    MB
                                    <span id="mbDropdownIcon" class="dropdown-icon"
                                        onclick="toggleDropdown('mbDropdownContentEdit')">&#9660;</span>
                                </label>
                                <select class="form-control dropdown-content" id="mbDropdownContentEdit" name="mb"
                                    onchange="updateMd('mbDropdownContentEdit')">
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
                                        onclick="toggleDropdown('mdDropdownContentEdit')">&#9660;</span>
                                </label>
                                <select class="form-control dropdown-content" id="mdDropdownContentEdit" name="md"
                                    onchange="updateMd('mdDropdownContentEdit')">
                                    <option value="0">Tidak Tahu (0)</option>
                                    <option value="0.2">Tidak Yakin (0.2)</option>
                                    <option value="0.4">Mungkin (0.4)</option>
                                    <option value="0.6">Kemungkinan Besar (0.6)</option>
                                    <option value="0.8">Hampir Pasti (0.8)</option>
                                    <option value="1">Pasti (1)</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <!-- Tabel Bobot -->
                                <table class="table mr-4">
                                    <thead>
                                        <tr>
                                            <th>Bobot</th>
                                            <th>Nilai</th>
                                            <th>Panduan Pengisian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>0</td>
                                            <td>Tidak Tahu</td>
                                            <td>Pakar tidak dapat menemukan hubungan atau relevansi yang jelas.</td>
                                        </tr>
                                        <tr>
                                            <td>0.2</td>
                                            <td>Tidak Yakin</td>
                                            <td>Terdapat keraguan dalam menghubungkan identifikasi pertanyaan.</td>
                                        </tr>
                                        <tr>
                                            <td>0.4</td>
                                            <td>Mungkin</td>
                                            <td>Pakar melihat kemungkinan adanya hubungan antara identifikasi
                                                pertanyaan.</td>
                                        </tr>
                                        <tr>
                                            <td>0.6</td>
                                            <td>Kemungkinan Besar</td>
                                            <td>Terdapat relevansi yang kuat antara identifikasi dan pasal tertentu,
                                                tetapi adanya
                                                ketidakpastian karena perbedaan penafsiran fakta dari berbagai sudut
                                                pandang.</td>
                                        </tr>
                                        <tr>
                                            <td>0.8</td>
                                            <td>Hampir Pasti</td>
                                            <td>Pakar memiliki keyakinan tinggi terkait hubungan identifikasi
                                                pertanyaan.</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Pasti</td>
                                            <td>Terdapat keyakinan yang mutlak antara identifikasi pertanyaan dan pasal
                                                hukum.</td>
                                        </tr>
                                    </tbody>
                                </table>
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
    <!-- Modal Tambah Keputusan -->
    <div class="modal fade modal-fullscreen-md-down" id="storeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Keputusan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Form Tambah --}}
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
                                <input type="text" class="form-control" id="kode-pasal" name="kode_pasal"
                                    required>
                                <label id='main_app' for="kode-pasal">Kode Pasal</label>
                            </div>
                            <div class="form-floating mb-3 p-2 mx-2">
                                <label for="mb" class="mb-label">
                                    MB
                                    <span id="mbDropdownIcon" class="dropdown-icon"
                                        onclick="toggleDropdown('mbDropdownContent')">&#9660;</span>
                                </label>
                                <select class="form-control dropdown-content" id="mbDropdownContent" name="mb"
                                    onchange="updateMd('mbDropdownContent')">
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
                                    onchange="updateMb('mdDropdownContent')">
                                    <option value="0">Tidak Tahu (0)</option>
                                    <option value="0.2">Tidak Yakin (0.2)</option>
                                    <option value="0.4">Mungkin (0.4)</option>
                                    <option value="0.6">Kemungkinan Besar (0.6)</option>
                                    <option value="0.8">Hampir Pasti (0.8)</option>
                                    <option value="1">Pasti (1)</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <!-- Tabel Bobot -->
                            <table class="table mr-4">
                                <thead>
                                    <tr>
                                        <th>Bobot</th>
                                        <th>Nilai</th>
                                        <th>Panduan Pengisian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>0</td>
                                        <td>Tidak Tahu</td>
                                        <td>Pakar tidak dapat menemukan hubungan atau relevansi yang jelas.</td>
                                    </tr>
                                    <tr>
                                        <td>0.2</td>
                                        <td>Tidak Yakin</td>
                                        <td>Terdapat keraguan dalam menghubungkan identifikasi pertanyaan.</td>
                                    </tr>
                                    <tr>
                                        <td>0.4</td>
                                        <td>Mungkin</td>
                                        <td>Pakar melihat kemungkinan adanya hubungan antara identifikasi pertanyaan.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>0.6</td>
                                        <td>Kemungkinan Besar</td>
                                        <td>Terdapat relevansi yang kuat antara identifikasi dan pasal tertentu, tetapi
                                            adanya
                                            ketidakpastian karena perbedaan penafsiran fakta dari berbagai sudut
                                            pandang.</td>
                                    </tr>
                                    <tr>
                                        <td>0.8</td>
                                        <td>Hampir Pasti</td>
                                        <td>Pakar memiliki keyakinan tinggi terkait hubungan identifikasi pertanyaan.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Pasti</td>
                                        <td>Terdapat keyakinan yang mutlak antara identifikasi pertanyaan dan pasal
                                            hukum.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah Keputusan -->


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

        function actionUbahIdentifikasi(params) {
            const formIdentifikasi = document.getElementById('edit-identifikasi');
            formIdentifikasi.setAttribute('action', params);
            formIdentifikasi.setAttribute('method', 'POST');
            console.log(formIdentifikasi);
        }

        function setDropdownValues(mbValue, mdValue) {
            // Set nilai dropdown MB
            $("#mbDropdownContentEdit").val(mbValue);
            // Set nilai dropdown MD
            $("#mdDropdownContentEdit").val(mdValue);
        }

        // Fungsi untuk menangani perubahan data dan memanggil fungsi setDropdownValues
        function updateInput(idIdentifikasi, kode, kode_pasal, mb, md) {
            document.getElementById("kode-identifikasi").value = kode;
            document.getElementById("kode-pasal").value = kode_pasal;
            document.getElementById("id_identifikasi").value = idIdentifikasi;

            // Panggil fungsi setDropdownValues untuk mengatur nilai default dropdown
            setDropdownValues(mb, md);

            // Tetapkan nilai dropdown pada elemen tampilan
            $("#mbDropdownValueEdit").text(getDropdownLabel(mb, 'mbDropdownContentEdit'));
            $("#mdDropdownValueEdit").text(getDropdownLabel(md, 'mdDropdownContentEdit'));
        }


        function getDropdownLabel(value, dropdownId) {
            return $("#" + dropdownId + " option[value='" + value + "']").text();
        }

        $('#exampleModal').on('shown.bs.modal', function() {
            var mbValue = $("#mbDropdownContentEdit").val();
            var mdValue = $("#mdDropdownContentEdit").val();

            // Tetapkan nilai dropdown pada elemen tampilan
            $("#mbDropdownValueEdit").text(getDropdownLabel(mbValue, 'mbDropdownContentEdit'));
            $("#mdDropdownValueEdit").text(getDropdownLabel(mdValue, 'mdDropdownContentEdit'));
        });

        function updateMd(dropdownId) {
            var mbValue = parseFloat(document.getElementById(dropdownId).value);
            var mdDropdown = document.getElementById(getOppositeDropdownId(dropdownId));

            // Set nilai MD berdasarkan nilai MB
            if (mbValue === 0) {
                mdDropdown.value = 1;
            } else if (mbValue === 0.2) {
                mdDropdown.value = 0.4;
            } else if (mbValue === 0.4) {
                mdDropdown.value = 0.6;
            } else if (mbValue === 0.6) {
                mdDropdown.value = 0.4;
            } else if (mbValue === 0.8) {
                mdDropdown.value = 0.2;
            } else if (mbValue === 1) {
                mdDropdown.value = 0;
            }
        }

        function updateMb(dropdownId) {
            var mdValue = parseFloat(document.getElementById(dropdownId).value);
            var mbDropdown = document.getElementById(getOppositeDropdownId(dropdownId));

            // Set nilai MB berdasarkan nilai MD
            if (mdValue === 0) {
                mbDropdown.value = 1;
            } else if (mdValue === 0.2) {
                mbDropdown.value = 0.4;
            } else if (mdValue === 0.4) {
                mbDropdown.value = 0.6;
            } else if (mdValue === 0.6) {
                mbDropdown.value = 0.8;
            } else if (mdValue === 0.8) {
                mbDropdown.value = 0.2;
            } else if (mdValue === 1) {
                mbDropdown.value = 0;
            }
        }

        // Fungsi untuk mendapatkan ID dropdown yang berlawanan
        function getOppositeDropdownId(dropdownId) {
            return dropdownId.includes('mb') ? dropdownId.replace('mb', 'md') : dropdownId.replace('md', 'mb');
        }
    </script>
</body>

</html>
