<div class="section section-features">
  <div class="container">
    <h4 class="header-text text-center">Pilih Ciri-Ciri</h4>
    <div class="row">
      <form action="<?= base_url('diagnosa/hasil'); ?>" method="POST">
        <div class="boxes">
          <table>
            <?php foreach ($ciri as $c) : ?>
              <tr>
                <td>
                  <input type="checkbox" id="<?= $c['id_ciri']; ?>" name="id_ciri[]" value="<?= $c['id_ciri']; ?>">
                </td>
                <td colspan="2">
                  <?= $c['kode_ciri']; ?> | Apakah <?= $c['nama_ciri']; ?> ?
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
          <center>
            <button type="submit">Simpan</button>
          </center>
        </div>
      </form>
    </div>
  </div>
</div>
