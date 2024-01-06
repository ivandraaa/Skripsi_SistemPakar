<!-- Modal Edit Identifikasi -->
<div class="modal fade modal-fullscreen-md-down" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                    <button type="submit" class="btn btn-primary">ubah</button>
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
                {{-- form edit --}}
                <form id="tambah-identifikasi" action="{{ route('keputusan.store') }}" method="post">
                    @csrf
                    <div class="input-form d-flex">
                        <input type="hidden" name="id" id="id_identifikasi">
                        <div class="form-floating mb-3 p-2 mx-2">
                            <input type="text" class="form-control" id="kode-identifikasi" name="kode_identifikasi"
                                required>
                            <label id='kode_app' for="kode-identifikasi">Kode Identifikasi</label>
                        </div>
                        <div class="form-floating mb-3 p-2 mx-2">
                            <input type="text" class="form-control" id="kode-pasal" name="kode_pasal" required>
                            <label id='main_app' for="kode-pasal">kode Pasal</label>
                        </div>
                        <div class="form-floating mb-3 p-2 mx-2">
                            <input type="text" class="form-control" id="mb" placeholder="mb"
                                name="mb">
                            <label id='main_app' for="mb">MB</label>
                        </div>
                        <div class="form-floating mb-3 p-2 mx-2">
                            <input type="text" class="form-control" id="md" placeholder="md"
                                name="md">
                            <label id='main_app' for="md">MD</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">simpan</button>
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
