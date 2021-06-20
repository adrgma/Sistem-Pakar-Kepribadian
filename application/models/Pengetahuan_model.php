<?php

class Pengetahuan_model extends CI_model
{
  // Menampilkan seluruh isi tabel Pengetahuan
  public function getAllPengetahuan()
  {
    // menampilkan seluruh data ciri yang ada di tabel ciri.
    $queryRule = "SELECT `tbl_pengetahuan`.`id`,`tbl_kepribadian`.`kode_kepribadian`,`tbl_kepribadian`.`nama_kepribadian`,`tbl_ciri`.`kode_ciri`,`tbl_ciri`.`nama_ciri`,`tbl_pengetahuan`.`probabilitas`
    FROM `tbl_kepribadian` JOIN `tbl_pengetahuan` 
    ON `tbl_kepribadian`.`id_kepribadian` = `tbl_pengetahuan`.`id_kepribadian`
    JOIN `tbl_ciri` 
    ON `tbl_pengetahuan`.`id_ciri` = `tbl_ciri`.`id_ciri`
                        ";
    return $this->db->query($queryRule)->result_array();

    //return $this->db->get('tbl_pengetahuan')->result_array();
  }

  // Menampilkan seluruh isi tabel Ciri
  public function getAllCiri()
  {
    // menampilkan seluruh data Ciri yang ada di tabel Ciri.
    return $this->db->get('tbl_ciri')->result_array();
  }

  // Menampilkan seluruh isi tabel Kepribadian
  public function getAllKepribadian()
  {
    // menampilkan seluruh data Kepribadian yang ada di tabel Kepribadian.
    return $this->db->get('tbl_kepribadian')->result_array();
  }

  // CRUD PENGETAHUAN
  // Tambah Data Pengetahuan
  public function tambahPengetahuan()
  {
    $data = [
      "id_kepribadian" => $this->input->post('kepribadian', true,),
      "id_ciri" => $this->input->post('ciri'),
      "probabilitas" => $this->input->post('probabilitas')
    ];
    $this->db->insert('tbl_pengetahuan', $data);
  }

  // Ubah Data Pengetahuan
  public function ubahPengetahuan()
  {
    $id = $this->input->post('id');
    $data = [
      "id_kepribadian" => $this->input->post('kepribadian'),
      "id_ciri" => $this->input->post('ciri'),
      "probabilitas" => $this->input->post('probabilitas')
    ];
    $this->db->where('id', $id);
    $this->db->update('tbl_pengetahuan', $data);
  }
  // Hapus Data Pengetahuan
  public function hapus($id)
  {
    $this->db->delete('tbl_pengetahuan', ['id' => $id]);
  }
  // END CRUD PENGETAHUAN
}
