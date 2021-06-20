<?php

class Kepribadian_model extends CI_model
{
  public function KodeKepribadian()
  {
    // Membuat kode kepribadian menjadi generate AI (Auto Increment)
    $query = $this->db->query("select max(kode_kepribadian) as max_id from tbl_kepribadian");
    $rows = $query->row();
    $kode = $rows->max_id;
    $noUrut = (int) substr($kode, 1, 2);
    $noUrut++;
    $char = "K";
    $kode = $char . sprintf("%02s", $noUrut);
    return $kode;
  }

  // CRUD kepribadian
  // menampilkan seluruh data kepribadian yang ada di tabel kepribadian.
  public function getAllKepribadian()
  {
    return $this->db->get('tbl_kepribadian')->result_array();
  }

  // Tambah data Kepribadian
  public function tambahKepribadian()
  {
    $data = [
      // Data yang ada di modal
      'kode_kepribadian' => $this->KodeKepribadian(),
      'nama_kepribadian' => $this->input->post('nama', true),
      'probabilitas' => $this->input->post('probabilitas', true)
    ];
    $this->db->insert('tbl_kepribadian', $data);
  }

  // Ubah Data kepribadian
  public function ubahkepribadian()
  {
    $id = $this->input->post('id');
    // Mengubah data gejala
    $data = [
      "kode_kepribadian" => $this->input->post('kode', true),
      "nama_kepribadian" => $this->input->post('nama', true),
      "probabilitas" => $this->input->post('probabilitas', true)
    ];
    $this->db->where('id_kepribadian', $id);
    $this->db->update('tbl_kepribadian', $data);
  }

  // Hapus Data Kepribadian
  public function hapusKepribadian($id)
  {
    $this->db->delete('tbl_kepribadian', ['id_kepribadian' => $id]);
  }
  // END CRUD kepribadian
}
