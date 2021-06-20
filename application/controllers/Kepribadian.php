<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepribadian extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cekLogin();
    $this->load->model('Kepribadian_model', 'kepribadian');
    $this->load->library('form_validation');
  }

  // Halaman Kepribadian
  public function index()
  {
    $data['judul'] = "Halaman Kepribadian";
    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();
    $data['tbl_kepribadian'] = $this->kepribadian->getAllKepribadian();
    $data['kode'] = $this->kepribadian->KodeKepribadian();

    $this->load->view('templates/Admin_header', $data);
    $this->load->view('templates/Admin_sidebar', $data);
    $this->load->view('templates/Admin_topbar');
    $this->load->view('admin/kepribadian/index', $data);
    $this->load->view('templates/Admin_footer');
    $this->load->view('admin/kepribadian/modal_tambah_kepribadian', $data);
    $this->load->view('admin/kepribadian/modal_ubah_kepribadian');
  }

  // Tambah Kepribadian
  public function tambah()
  {
    $data['tbl_kepribadian'] = $this->db->get('tbl_kepribadian')->result_array();
    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();

    // cek jika ada gambar yang akan diupload
    $upload_image = $_FILES['gambar']['name'];
    if ($upload_image) {
      $config['allowed_types'] = 'jpg|png';
      $config['max_size']      = '4096';
      $config['upload_path'] = './assets/images/kepribadian/';

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('gambar')) {
        // $old_image = $data['tbl_kepribadian']['gambar'];
        // if ($old_image != 'user.png') {
        //   unlink(FCPATH . '/assets/images/kepribadian/' . $old_image);
        // }
        $new_image = $this->upload->data('file_name');
        $this->db->set('gambar', $new_image);
        // } else {
        //   echo $this->upload->dispay_errors();
        // }
      }
      $this->kepribadian->tambahKepribadian();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kepribadian Berhasil ditambahkan!</div>'); //buat pesan akun berhasil dibuat
      redirect('kepribadian');
    }
  }

  // Ubah kepribadian
  public function ubahkepribadian()
  {
    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();

    // cek jika ada gambar yang akan diupload
    $upload_image = $_FILES['gambar']['name'];
    if ($upload_image) {
      $config['allowed_types'] = 'jpg|png';
      $config['max_size']      = '4096';
      $config['upload_path'] = './assets/images/kepribadian/';

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('gambar')) {
        // $old_image = $data['tbl_kepribadian']['gambar'];
        // if ($old_image != 'user.png') {
        //   unlink(FCPATH . '/assets/images/kepribadian/' . $old_image);
        // }
        $new_image = $this->upload->data('file_name');
        // var_dump($new_image);
        // die;
        $this->db->set('gambar', $new_image);
        // } else {
        //   echo $this->upload->dispay_errors();
        // }

        $this->kepribadian->ubahkepribadian();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data Kepribadian Berhasil diubah!</div>'); //buat pesan akun berhasil dibuat
        redirect('kepribadian');
      }
    }
  }

  // Hapus kepribadian
  public function hapus($id)
  {
    $this->kepribadian->hapusKepribadian($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Kepribadian Berhasil dihapus!</div>'); //buat pesan akun berhasil dibuat
    redirect('kepribadian');
  }
}
