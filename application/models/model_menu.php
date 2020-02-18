<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_menu extends CI_Model {

  public function getsubmenu() {
    $kueri = "select `tb_usersubmenu`.*, `tb_usermenu`.`menu` from `tb_usersubmenu` join `tb_usermenu` on `tb_usersubmenu`.`id_menu` = `tb_usermenu`.`id`";
    return $this->db->query($kueri)->result_array();
  }

}