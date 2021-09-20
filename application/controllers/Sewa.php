<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {
	//Constructor
	// public function __construct() {
	// 	parent::__construct();

	// 	$this->load->model('sewa_model');
	// }

	public function index() {
		if(!$this->session->userdata('username')) {
			$this->session->set_flashdata('error', "Acces Denied");

			redirect('login', 'refresh');
		}

        $data['title'] = 'Daftar Sewa';
        // $data['sewa'] = $this->sewa_model->getAll();

		$this->load->view('templates/header');
		$this->load->view('sewa/index', $data);
		$this->load->view('templates/footer');
	}

    public function view() {
       
    }

	

    

	
	
}
