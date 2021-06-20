<!-- Modal Edit -->
<?php foreach ($tbl_kepribadian as $kp) : ?>
  <div class="modal fade ubahKepribadian<?= $kp['id_kepribadian']; ?>" tabindex="-1" role="dialog" aria-labelledby="forModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" id="apasih">Ubah Kepribadian</h5>
        </div>

        <?= form_open_multipart('kepribadian/ubahkepribadian'); ?>
        <input type="hidden" name="id" value="<?= $kp['id_kepribadian']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label for="kode">Kode Kepribadian</label>
            <input type="text" class="form-control" id="kode" name="kode" value="<?= $kp['kode_kepribadian']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="nama">Nama Kepribadian</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $kp['nama_kepribadian']; ?>">
          </div>
          <div class="form-group">
            <label for="probabilitas">Nilai Probabilitas</label>
            <input type="text" class="form-control" id="probabilitas" name="probabilitas" value="<?= $kp['probabilitas']; ?>">
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label>
            <img style="margin-bottom: 10px; width: 100px;" src=" <?= base_url('assets/images/kepribadian/') . $kp['gambar']; ?>">
            <input type="file" class="form-control" id="gambar" name="gambar" value="<?= $kp['gambar']; ?>"><?= $kp['gambar']; ?>"
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-round btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
