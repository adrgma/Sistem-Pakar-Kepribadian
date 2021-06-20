<!-- Modal Tambah -->
<div class="modal fade" id="tambahPengetahuan" tabindex="-1" role="dialog" aria-labelledby="forModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="apasih">Tambah Kepribadian</h5>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('pengetahuan/tambah'); ?>" method="post">
          <div class="form-group">
            <input type="hidden" class="form-control" id="kode" name="kode">
          </div>
          <div class="form-group">
            <select name="kepribadian" id="kepribadian" class="form-control">
              <option value="">Pilih Kepribadian</option>
              <?php foreach ($kepribadian as $K) : ?>
                <option value="<?= $K['id_kepribadian']; ?>"><?= $K['kode_kepribadian']; ?> - <?= $K['nama_kepribadian']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <div class="form-group">
              <select name="ciri" id="ciri" class="form-control">
                <option value="">Pilih Ciri</option>
                <?php foreach ($ciri as $G) : ?>
                  <option value="<?= $G['id_ciri']; ?>"><?= $G['kode_ciri']; ?> - <?= $G['nama_ciri']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <div class="form-group">
                <label for="probabilitas">Nilai Probabilitas</label>
                <input type="text" class="form-control" id="probabilitas" name="probabilitas">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
