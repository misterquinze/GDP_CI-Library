<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {
	//Constructor
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('username')) {
			$this->session->set_flashdata('error', "Acces Denied, Please Login");

			redirect('login', 'refresh');
		}
		$this->load->model('sewa_model');
	}

	public function index() {
		if(!$this->session->userdata('username')) {
			$this->session->set_flashdata('error', "Acces Denied");

			redirect('login', 'refresh');
		}

        $data['title'] = 'Daftar Sewa';
        $data['sewa'] = $this->sewa_model->getAll();

		$this->load->view('templates/header');
		$this->load->view('sewa/index', $data);
		$this->load->view('templates/footer');
	}

    public function view($sewaId) {
		if(!$this->session->userdata('username')) {
			$this->session->set_flashdata('error', "Acces Denied");

			redirect('login', 'refresh');
		}

       $data['title'] = 'Detail Sewa';

	   $data['sewa'] = $this->sewa_model->getById($sewaId);

	   $this->load->view('templates/header');
	   $this->load->view('sewa/view', $data);
	   $this->load->view('templates/footer');
    }

	
	
    

	
	
}
