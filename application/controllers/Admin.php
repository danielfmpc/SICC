<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if(!$this->session->has_userdata('id_usuario')){
            redirect('geral');
    }
  }

  public function index()
  {

      if ($this->input->method() != 'post') {
          $this->load->view('layouts/inicio');
          $this->load->view('usuarios/signup');
          $this->load->view('layouts/fim');
          return;
      }

      if($this->input->post('senha_1') !== $this->input->post('senha_2')){
          $dados['erro'] = 'As senhas não correspondem';
          $this->load->view('layouts/inicio');
          $this->load->view('usuarios/signup', $dados);
          $this->load->view('layouts/fim');
          return;
      }

      $this->load->model('usuarios_model', 'usuarios');
      $this->load->model('admin_model', 'admin');

      if ($this->usuarios->signup_check_usuario()) {
          $dados['erro'] = 'Já existe um usuário com o mesmo nome ou email.';
          $this->load->view('layouts/inicio');
          $this->load->view('usuarios/signup', $dados);
          $this->load->view('layouts/fim');
          return;
      }

      $this->admin->signup_criar_conta();
      $this->load->view('layouts/inicio');
      $this->load->view('usuarios/signup_sucesso');
      $this->load->view('layouts/fim');
  }


}
