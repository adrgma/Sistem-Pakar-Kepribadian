<?php
class Member_model extends CI_model
{
  // menampilkan seluruh data ciri yang ada di tabel ciri.
  public function Ciri()
  {
    return $this->db->get('tbl_ciri')->result_array();
  }
}
