<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Upload extends CI_Controller
	{
            public function  __construct()
            {
                    parent::__construct();
                    if(!$this->session->has_userdata('id_usuario')){
                            redirect('geral');
                    }
                    $this->load->model('aplicacao_model', 'aplicacao');
            }
        public function adicionar(){

                if($this->input->method() !== 'post'){
                        //apresenta o formulário para carregar nova imagem
                        $dados['erros'] = '';
                        $this->load->view('layouts/inicio');
                        $this->load->view('aplicacao/barra_usuario');
                        $this->load->view('aplicacao/adicionar_foto', $dados);
                        $this->load->view('layouts/fim');
                        return;
                }

                $data = array();

                if(!empty($_FILES['userFiles']['name'])){

                        $filesCount = count($_FILES['userFiles']['name']);

                        for($i = 0; $i < $filesCount; $i++){

                                $_FILES['userFile']['name'] = md5($_FILES['userFiles']['name'][$i].date('Y-m-d H:i:s')).'.jpg';
                                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];



                                $uploadPath = 'assets/fotos/';
                                $config['upload_path'] = $uploadPath;
                                $config['allowed_types'] = '*';
                                //$config['max_size']	= '100';
                                //$config['max_width'] = '1024';
                                //$config['max_height'] = '768';

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);

                                if($this->upload->do_upload('userFile')){

                                    $fileData = $this->upload->data();
                                    $uploadData[$i]['foto'] = $fileData['file_name'];
                                    $uploadData[$i]['data_hora'] = date("Y-m-d H:i:s");
                                    $uploadData[$i]['id_usuario']  = $this->session->id_usuario;
                                    $uploadData[$i]['publica'] = $publica = true;

                                    if($this->input->post('check_publica') === null){
                                            $uploadData[$i]['publica'] = $publica = false;
                                    }

                                }
                        }

                        if(!empty($uploadData)){

                                // Insere os arquivos no banco de dados
                                $insert = $this->aplicacao->insert($uploadData);
                                $dados['teste'] = [$uploadData, 'teste'];
                                $this->load->view('layouts/inicio');
                                $this->load->view('aplicacao/sucesso', $dados);
                                $this->load->view('layouts/fim'); 

                        } else {
                                //ocorreu um erro no carregamento da fotografia
                                $this->load->view('layouts/inicio');
                                $dados['erros'] = $this->upload->display_errors();
                                $this->load->view('aplicacao/erro',$dados);
                                $this->load->view('layouts/fim');
                        }
                }
            }
	}
?>
