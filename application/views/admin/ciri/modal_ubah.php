<?php foreach ($ciri as $c) : ?>
  <div class="modal fade ubahCiri<?= $c['id_ciri']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Ubah Data Ciri-Ciri</h4>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('ciri/ubah'); ?>" method="post">
            <input type="hidden" name="id" value="<?= $c['id_ciri']; ?>">
            <div class="form-group">
              <label for="kode">Kode Ciri-Ciri</label>
              <input type="text" class="form-control" id="kode" name="kode" value="<?= $c['kode_ciri']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="nama">Nama Ciri-Ciri</label>
              <textarea id="nama" class="form-control" name="nama"><?= $c['nama_ciri']; ?></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

        </form>
      </div>
    </div>
  </div>

<?php endforeach; ?>
