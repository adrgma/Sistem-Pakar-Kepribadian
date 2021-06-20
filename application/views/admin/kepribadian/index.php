      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Halaman Kepribadian</h3>
            </div>

          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Daftar Kepribadian</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="row mt-3">
                    <div class="col-md-6">
                      <a href="" class="btn btn-primary" data-toggle="modal" data-target="#tambahKepribadian">Tambah Data Kepribadian</a>
                    </div>
                  </div>

                  <?= $this->session->flashdata('pesan'); ?>
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10%">No</th>
                        <th style="width: 5%">Kode Kepribadian</th>
                        <th style="width: 15%">Nama Kepribadian</th>
                        <th style="width: 5%">Probabilitas</th>
                        <th style="width: 10%">Gambar</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($tbl_kepribadian as $kp) : ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $kp['kode_kepribadian']; ?></td>
                          <td><?= $kp['nama_kepribadian']; ?></td>
                          <td><?= $kp['probabilitas']; ?></td>
                          <td><img src="<?= base_url('assets/images/kepribadian/') . $kp['gambar']; ?>" width="150"></td>
                          <td>
                            <a href="<?= base_url('kepribadian/hapus/') . $kp['id_kepribadian']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Data akan dihapus');">Hapus</a>
                            <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target=".ubahKepribadian<?= $kp['id_kepribadian']; ?>">Ubah</a>
                          </td>
                        </tr>
                        <?php $i++; ?>
                      <?php endforeach; ?>
                    </tbody>

                  </table>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
      <!-- /page content -->
