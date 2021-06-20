<?php

class Ciri_model extends CI_model
{
  // Membuat kode Ciri menjadi AI (Auto Increment)
  public function KodeCiri()
  {
    $query = $this->db->query("select max(kode_ciri) as max_id from tbl_ciri");
    $rows = $query->row();
    $kode = $rows->max_id;
    $noUrut = (int) substr($kode, 1, 2);
    $noUrut++;
    $char = "G";
    $kode = $char . sprintf("%02s", $noUrut);
    return $kode;
  }
  // CRUD ciri
  // menampilkan seluruh data ciri yang ada di tabel ciri.
  public function getAllCiri()
  {
    return $this->db->get('tbl_ciri')->result_array();
  }

  // Tambah data ciri
  public function tambahCiri()
  {
    $data = [
      'id_ciri' => $this->input->post('id'),
      'kode_ciri' => $this->KodeCiri(),
      "nama_ciri" => $this->input->post('nama', true)
    ];
    $this->db->insert('tbl_ciri', $data);
  }

  // Ubah Data ciri
  public function ubahCiri()
  {
    $id = $this->input->post('id');
    // Mengubah data ciri
    $data = [
      "kode_ciri" => $this->input->post('kode'),
      "nama_ciri" => $this->input->post('nama', true)
    ];
    $this->db->where('id_ciri', $id);
    $this->db->update('tbl_ciri', $data);
  }

  // Menghapus Data ciri
  public function hapusCiri($id)
  {
    // Hapus ciri berdasarkan id yang dipilih.
    $this->db->delete('tbl_ciri', ['id_ciri' => $id]);
  }
  // End CRUD ciri
}
