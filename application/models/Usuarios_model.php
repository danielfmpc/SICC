<?php
    defined('BASEPATH') OR exit('URL inválida.');

    class Usuarios_model extends CI_Model{

        public function signup_check_usuario()
        {
            $usuario =$this->input->post('usuario');
            $email =$this->input->post('email');
            $resultados = $this->db->from('usuarios')
                                   ->where('usuario', $usuario)
                                   ->get();
            return $resultados->num_rows() !== 0 ? true : false;
        }
        

        public function verificar_login(){
            //verifica se os dados inseridos são os corretos para o login
            $dados = array(
                'usuario'   => $this->input->post('usuario'),
                'senha'     => password_verify('senha')
            );
            $resultados = $this->db->from('usuarios')
                                   ->where($dados)
                                   ->get();
            if($resultados->num_rows() === 0){
                //login inválido
                return false;
            } else {
                //login válido

                //coloca os dados do usuários na sessão
                $this->session->set_userdata(
                    array(
                        'id_usuario'    => $resultados->row()->id_usuario,
                        'usuario'       => $resultados->row()->usuario,
                        'nv'            => $resultados->row()->nv
                    )
                );
                return true;
            }
        }
    }
?>
