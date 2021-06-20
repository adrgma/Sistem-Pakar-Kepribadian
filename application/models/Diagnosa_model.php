<?php
class Diagnosa_model extends CI_model
{
  // Mengosongkan tabel tmp_ciri sebelum digunakan
  public function kosongTmpCiri()
  {
    return $this->db->truncate('tmp_ciri');
  }

  // mengosongkan tabel tmp_final sebelum digunakan
  public function kosongTmpFinal()
  {
    return  $this->db->truncate('tmp_final');
  }

  // memasukkan ciri-ciri terpilih ke tabel tmp_ciri
  public function insertTmpCiri()
  {
    $ciri = $this->input->post('id_ciri');
    $membernya = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();
    $member = $membernya['id_user'];

    foreach ($ciri as $g) {
      $data = [
        'id_user' => $member,
        'id_ciri' => $g
      ];
      $this->db->insert('tmp_ciri', $data);
    }
  }

  // memasukkan ke tmp_final
  public function insertTmpFinal()
  {
    $query = "SELECT `tmp_ciri`.`id_ciri`,`tbl_pengetahuan`.`id_kepribadian`,`tbl_pengetahuan`.`probabilitas`
    FROM `tbl_pengetahuan` JOIN `tmp_ciri` 
    ON `tmp_ciri`.`id_ciri` = `tbl_pengetahuan`.`id_ciri`";
    return $this->db->query($query)->result_array();
  }

  // Perhitungan tiap kepribadian
  // Perhitungan kepribadian 1
  // Perhitungan Probabilitas tiap kepribadian yang ada di tmp_final
  public function ProbK1()
  {
    $this->db->select('*');
    $this->db->from('tmp_final');
    $this->db->where('id_kepribadian', 1);
    $prob = $this->db->get()->result();
    //inisialisasi untuk total probabilitas
    $jumlah = 1;
    foreach ($prob as $pr) {
      $jumlah = $jumlah * $pr->probabilitas;
    }
    // Perhitungan hasil bayes kepribadian 1
    // (Prob kepribadian di tmp_final * prob di tabel kepribadian)
    $this->db->select('*');
    $this->db->from('tbl_kepribadian');
    $this->db->where('id_kepribadian', 1);
    $data = $this->db->get()->result();
    foreach ($data as $rowku) {
      $hasilBayes = $jumlah * $rowku->probabilitas;
    }
    return $hasilBayes;
  }

  // Perhitungan kepribadian 2
  // Perhitungan Probabilitas tiap kepribadian yang ada di tmp_final
  public function ProbK2()
  {
    $this->db->select('*');
    $this->db->from('tmp_final');
    $this->db->where('id_kepribadian', 2);
    $prob = $this->db->get()->result();
    //inisialisasi untuk total probabilitas
    $jumlah = 1;
    foreach ($prob as $pr) {
      $jumlah = $jumlah * $pr->probabilitas;
    }
    // Perhitungan hasil bayes kepribadian 2
    // (Prob kepribadian di tmp_final * prob di tabel kepribadian)
    $this->db->select('*');
    $this->db->from('tbl_kepribadian');
    $this->db->where('id_kepribadian', 2);
    $data = $this->db->get()->result();
    foreach ($data as $rowku) {
      $hasilBayes = $jumlah * $rowku->probabilitas;
    }
    return $hasilBayes;
  }

  // Perhitungan kepribadian 3
  // Perhitungan Probabilitas tiap kepribadian yang ada di tmp_final
  public function ProbK3()
  {
    $this->db->select('*');
    $this->db->from('tmp_final');
    $this->db->where('id_kepribadian', 3);
    $prob = $this->db->get()->result();
    //inisialisasi untuk total probabilitas
    $jumlah = 1;
    foreach ($prob as $pr) {
      $jumlah = $jumlah * $pr->probabilitas;
    }
    // Perhitungan hasil bayes kepribadian 3
    // (Prob kepribadian di tmp_final * prob di tabel kepribadian)
    $this->db->select('*');
    $this->db->from('tbl_kepribadian');
    $this->db->where('id_kepribadian', 3);
    $data = $this->db->get()->result();
    foreach ($data as $rowku) {
      $hasilBayes = $jumlah * $rowku->probabilitas;
    }
    return $hasilBayes;
  }

  // Perhitungan kepribadian 4
  // Perhitungan Probabilitas tiap kepribadian yang ada di tmp_final
  public function ProbK4()
  {
    $this->db->select('*');
    $this->db->from('tmp_final');
    $this->db->where('id_kepribadian', 4);
    $prob = $this->db->get()->result();
    //inisialisasi untuk total probabilitas
    $jumlah = 1;
    foreach ($prob as $pr) {
      $jumlah = $jumlah * $pr->probabilitas;
    }
    // Perhitungan hasil bayes kerusakan 4
    // (Prob kerusakan di tmp_final * prob di tabel kerusakan)
    $this->db->select('*');
    $this->db->from('tbl_kepribadian');
    $this->db->where('id_kepribadian', 4);
    $data = $this->db->get()->result();
    foreach ($data as $rowku) {
      $hasilBayes = $jumlah * $rowku->probabilitas;
    }
    return $hasilBayes;
  }
  // End Perhitungan tiap kerusakan


  // Update Hasil Probabilitas pada tmp_final
  public function hasilProbK1($K1)
  {
    $hasilK1 = ['hasil_probabilitas' => $K1];
    $this->db->where('id_kepribadian', 1);
    $this->db->update('tmp_final', $hasilK1);
  }
  public function hasilProbK2($K2)
  {
    $hasilK2 = ['hasil_probabilitas' => $K2];
    $this->db->where('id_kepribadian', 2);
    $this->db->update('tmp_final', $hasilK2);
  }
  public function hasilProbK3($K3)
  {
    $hasilK3 = ['hasil_probabilitas' => $K3];
    $this->db->where('id_kepribadian', 3);
    $this->db->update('tmp_final', $hasilK3);
  }
  public function hasilProbK4($K4)
  {
    $hasilK4 = ['hasil_probabilitas' => $K4];
    $this->db->where('id_kepribadian', 4);
    $this->db->update('tmp_final', $hasilK4);
  }
  // End Update Hasil Probabilitas pada tmp_final


  // Menampilkan Hasil diagnosa 

  // (Mendapatkan 3 kepribadian dengan probabilitas yang terbesar)
  public function diagnosa()
  {
    $query = "SELECT DISTINCT `id_kepribadian`,`hasil_probabilitas` 
    FROM `tmp_final`
    ORDER BY `tmp_final`.`hasil_probabilitas` DESC LIMIT 4";
    return $this->db->query($query)->result_array();
  }

  // Mendapatkan 1 kepribadian dengan probabilitas terbesar
  public function tertinggi()
  {
    $query = "SELECT `id_kepribadian`, MAX(`hasil_probabilitas`) FROM `tmp_final` GROUP BY `id_kepribadian` ORDER BY `hasil_probabilitas` DESC LIMIT 1";
    return $this->db->query($query)->result_array();
  }

  // Menampilkan Detail Hasil Akhir Diagnosa
  public function detailDiagnosa()
  {
    $query = "SELECT `tmp_final`.`id_kepribadian`, MAX(`hasil_probabilitas`) as `hasil_probabilitas`,`tbl_kepribadian`.`nama_kepribadian`, `tbl_kepribadian`.`gambar` FROM `tmp_final` JOIN `tbl_kepribadian` ON `tmp_final`.`id_kepribadian` = `tbl_kepribadian`.`id_kepribadian` GROUP BY `id_kepribadian` ORDER BY `hasil_probabilitas` DESC LIMIT 1";
    return $this->db->query($query)->result_array();
  }
  // End Menampilkan Hasil diagnosa 

  // Memasukkan hasil diagnosa ke tbl_hasil_diagnosa
  public function insertHasil()
  {
    $this->db->select('*');
    $this->db->from('tbl_user');
    $this->db->where('username', $this->session->userdata('username'));
    $data = $this->db->get()->result();
    foreach ($data as $row) {
      $nama = $row->nama_user;
    }
    $kepribadian = $this->detailDiagnosa();
    foreach ($kepribadian as $k) {
      $kepribadiannya = $k['nama_kepribadian'];
      $nilai = floor($k['hasil_probabilitas'] * 100);
    }
    $data = [
      'hasil_probabilitas' => $nilai,
      'nama_kepribadian' => $kepribadiannya,
      'nama_user' => $nama,
      'waktu' => time()
    ];
    return $this->db->insert('tbl_hasil_diagnosa', $data);
  }
}
