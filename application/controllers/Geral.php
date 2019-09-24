<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geral extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->view('layouts/inicio_slide');
		$this->load->model('slide_model', 'slide');
		$dados['fotos'] = $this->slide->todas_fotos_publicas();
		$this->load->view('slide', $dados);
		$this->load->view('layouts/fim_slide');
	}

	public function home()
	{
		if($this->session->has_userdata('id_usuario')){
			redirect('aplicacao');
		} else {
			$this->load->view('layouts/inicio');
			$this->load->view('home');
			$this->load->view('layouts/fim');
		}
	}
}
