<?php
    defined('BASEPATH') OR exit('URL inválida.');

    // ==================================================
    // controlador de usuários
    // ==================================================
    class Usuarios extends CI_Controller{

        // ==============================================

        public function login()
        {
            //apresenta o quadro de login ou processa o post do login
            if ($this->input->method()!='post') {

                // formulário
                $this->load->view('layouts/inicio');
                $this->load->view('usuarios/login');
                $this->load->view('layouts/fim');

                return;
            }

            if($this->input->post('usuario') == '' ||
               $this->input->post('senha') == ''){

                    //define mensagem de erro
                    $dados['erro'] = 'Os dois campos são de preenchimento obrigatório.';

                    //apresenta novamente o formulário
                    $this->load->view('layouts/inicio');
                    $this->load->view('usuarios/login', $dados);
                    $this->load->view('layouts/fim');
                    return;
               }

            //verifica se o login foi válido
            $this->load->model('usuarios_model', 'usuarios');
            if($this->usuarios->verificar_login()){
                redirect('geral/home');
                } else {
                    $dados['erro'] = 'Usuário ou senha inválidos.';
                    $this->load->view('layouts/inicio');
                    $this->load->view('usuarios/login', $dados);
                    $this->load->view('layouts/fim');
            }
        }

        public function logout()
        {
            if ($this->session->has_userdata('id_usuario')) {
                $this->session->unset_userdata('id_usuario');
                $this->session->unset_userdata('usuario');
                $this->session->unset_userdata('nv');
                redirect('geral');
            } else {
                redirect('geral');
            }

        }

    }
?>
