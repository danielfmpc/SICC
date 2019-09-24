<?php
    defined('BASEPATH') OR exit('URL inválida.');

    class Aplicacao_model extends CI_Model{

        private function controlo()
        {
            if(!$this->session->has_userdata('id_usuario')){
                redirect('geral');
            }
        }

        public function insert($data = array())
		{
			$insert = $this->db->insert_batch('fotos', $data);
			return $insert?true:false;
		}

        public function todas_fotos_publicas()
        {
            $resultado = $this->db->select('*')
            ->from('fotos')
            ->join('usuarios', 'usuarios.id_usuario = fotos.id_usuario')
            ->where('publica', true)
            ->get();
            return $resultado->result_array();
        }

        // ==============================================
        public function buscar_fotos_usuario()
        {
            //vai buscar as fotos do usuários com sessão ativa
            $resultados = $this->db->select('*')
                                   ->from('fotos')
                                   ->join('usuarios', 'usuarios.id_usuario = fotos.id_usuario')
                                   ->where('fotos.id_usuario', $this->session->id_usuario)
                                   ->get();
            return $resultados->result_array();
        }
        public function mudar_para_privada($id){
            //muda de pública para privada
            $this->db->set('publica', false)
                     ->where('id_foto', $id)
                     ->update('fotos');
        }

        // ==============================================
        public function mudar_para_publica($id){
            //muda de privada para pública
            $this->db->set('publica', true)
                     ->where('id_foto', $id)
                     ->update('fotos');
        }

        // ==============================================
        public function eliminar($id){
            //elimina a fotografia selecionada

            //vai buscar os dados da foto
            $resultados = $this->db->get('fotos', array('id_foto' => $id));


            if($resultados->num_rows() !== 0){

                //elimina da base de dados
                $this->db->delete('fotos', array('id_foto' => $id));
                $pasta = 'assets/fotos/';
                //elimina a fotografia da pasta
                $foto = $resultados->result_array()[0]['foto'];


            }
        }
    }
?>
