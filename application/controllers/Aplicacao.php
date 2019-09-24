<?php
    defined('BASEPATH') OR exit('URL inválida.');
    
    class Aplicacao extends CI_Controller{
    
        private function controlo()
        {
            if(!$this->session->has_userdata('id_usuario')){
                redirect('geral');
            } 
        }

        public function index()
        {
            $this->controlo();

            $this->load->view('layouts/inicio');
            $this->load->view('aplicacao/barra_usuario');

            $this->load->model('aplicacao_model', 'aplicacao');
            $dados['fotos'] = $this->aplicacao->todas_fotos_publicas();
            $this->load->view('aplicacao/pagina_inicial', $dados);
            $this->load->view('layouts/fim');
        }        
        // ==============================================
        public function minhas(){
            $this->controlo();

            //apresenta o quadro com as fotografias do usuário ativo
            $this->load->view('layouts/inicio');
            $this->load->view('aplicacao/barra_usuario');

            //vai buscar todas as imagens que são públicas
            $this->load->model('aplicacao_model', 'aplicacao');
            $dados['fotos'] = $this->aplicacao->buscar_fotos_usuario();
            $this->load->view('aplicacao/minhas', $dados);
            $this->load->view('layouts/fim');
        }
        // ==============================================
        public function eliminar($id){
            $this->controlo();            
            //elimina a foto
            $this->load->model('aplicacao_model', 'aplicacao');
            $this->aplicacao->eliminar($id);
            $this->minhas();
        }

        // ==============================================
        public function privada($id){
            $this->controlo();

            //passa a foto de pública para privada
            $this->load->model('aplicacao_model', 'aplicacao');
            $this->aplicacao->mudar_para_privada($id);
            $this->minhas();
        }

        // ==============================================
        public function publica($id){
            $this->controlo();

            //passa a foto de privada para pública
            $this->load->model('aplicacao_model', 'aplicacao');
            $this->aplicacao->mudar_para_publica($id);
            $this->minhas();
        }
    
    }
?>