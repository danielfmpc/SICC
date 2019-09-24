<?php
    defined('BASEPATH') OR exit('URL inválida.');

    class Slide_model extends CI_Model{

        public function todas_fotos_publicas()
        {
            $resultado = $this->db->select('*')
            ->from('fotos')
            ->where('publica', true)
            ->get();
            return $resultado->result_array();
        }

    }
?>
