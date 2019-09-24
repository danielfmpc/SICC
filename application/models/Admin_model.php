<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    if(!$this->session->has_userdata('id_usuario')){
            redirect('geral');
    }
  }
  public function signup_criar_conta()
  {
      var_dump($_POST);
      $dados = array(
          'usuario' => $this->input->post('usuario'),
          'senha' => password_hash('senha_1', PASSWORD_BCRYPT),
          'nv' => $this->input->post('nivel')
      );
      $this->db->insert('usuarios', $dados);
  }

}
