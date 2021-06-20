<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ciri extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //cekLogin();
    $this->load->model('Ciri_model', 'MC');
    $this->load->library('form_validation');
  }

  // Halaman Ciri
  public function index()
  {
    $data['judul'] = 'Halaman Ciri-Ciri';
    $data['tabel'] = 'Data Ciri-Ciri';

    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();
    $data['ciri'] = $this->MC->getAllCiri();
    $data['kode'] = $this->MC->KodeCiri();

    $this->load->view('templates/Admin_header', $data);
    $this->load->view('templates/Admin_sidebar', $data);
    $this->load->view('templates/Admin_topbar');
    $this->load->view('admin/ciri/index', $data);
    $this->load->view('templates/Admin_footer');
    $this->load->view('admin/ciri/modal_ubah');
    $this->load->view('admin/ciri/modal_tambah', $data);
  }

  // Tambah Ciri-Ciri
  public function tambah()
  {
    $data['judul'] = 'Halaman Ciri-Ciri';
    $this->form_validation->set_rules('nama', 'Nama', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/Admin_header', $data);
      $this->load->view('templates/Admin_sidebar', $data);
      $this->load->view('templates/Admin_topbar');
      $this->load->view('admin/ciri/index', $data);
      $this->load->view('templates/Admin_footer');
      $this->load->view('admin/ciri/modal_tambah');
      $this->load->view('admin/ciri/modal_ubah');
    } else {
      $this->MC->tambahCiri();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Ciri-Ciri Berhasil ditambahkan!</div>'); //buat pesan akun berhasil dibuat
      redirect('ciri');
    }
  }

  // Ubah Ciri
  public function ubah()
  {
    $this->MC->ubahCiri();
    $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data Ciri-Ciri Berhasil diubah!</div>'); //buat pesan akun berhasil dibuat
    redirect('ciri');
  }

  //Hapus Ciri
  public function hapus($id)
  {
    $this->MC->hapusCiri($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Ciri Berhasil dihapus!</div>'); //buat pesan akun berhasil dibuat
    redirect('ciri');
  }
}
