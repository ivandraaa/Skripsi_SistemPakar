<!-- Modal Edit penyakit -->
<div class="modal fade modal-fullscreen-md-down" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Penyakit</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- form --}}
          <form id="edit-penyakit" action="" method="post">
            @method("put")
            @csrf
            <div class="input-form d-flex">
                <input type="hidden" name="id" id="id_penyakit">
                <div class="form-floating mb-3 p-2 mx-2">
                    <input type="text" class="form-control" id="kode-penyakit" name="kode_penyakit" readonly>
                    <label for="kode-penyakit">Kode Penyakit</label>
                </div>
                <div class="form-floating mb-3 p-2 mx-2">
                    <input type="text" class="form-control" id="penyakit" name="penyakit">
                    <label for="penyakit">Penyakit</label>
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
{{-- end modal edit penyakit --}}

{{-- modal tambah penyakit --}}
<div class="modal fade modal-fullscreen-md-down" id="penyakitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Penyakit</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- form edit --}}
          <form id="tambah-penyakit" action="{{ route('penyakit.store') }}" method="post">
            @csrf
            <div class="input-form d-flex">
                <input type="hidden" name="id" id="id_penyakit">
                <div class="form-floating mb-3 p-2 mx-2">
                    <input type="text" class="form-control" id="kode-penyakit" name="kode_penyakit" placeholder="kode penyakit" required>
                    <label for="kode-penyakit">Kode Penyakit</label>
                </div>
                <div class="form-floating mb-3 p-2 mx-2">
                    <input type="text" class="form-control" id="penyakit" name="penyakit" placeholder="penyakit" required>
                    <label for="penyakit">Penyakit</label>
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
{{-- end modal tambah penyakit --}}

<script>
    function updateInput(idpenyakit, kode, penyakit){
        document.getElementById("kode-penyakit").value = kode;
        document.getElementById("penyakit").value = penyakit;
        document.getElementById("id_penyakit").value = idpenyakit;
    }

    function actionUbahpenyakit(params) {
        const formpenyakit = document.getElementById('edit-penyakit');
        formpenyakit.setAttribute('action', params);
        formpenyakit.setAttribute('method', 'POST');
        console.log(formpenyakit);
    }

</script>
