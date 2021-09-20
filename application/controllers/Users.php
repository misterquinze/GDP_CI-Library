<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	//Constructor
	public function __construct() {
		parent::__construct();

		$this->load->model('users_model');
	}

	public function index() {
        if(!$this->session->userdata('username')) {
			$this->session->set_flashdata('error', "Acces Denied");

			redirect('login', 'refresh');
		}
        
        $data['title'] = 'Daftar Users';
        $data['users'] = $this->users_model->getAll();

		$this->load->view('templates/header');
        // var_dump($data['users']);
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');
	}

    public function view($userId) {
        // $data['title'] = 'Detail User';
        // $data['users'] = $this->users_model->getById($bukuId);

		// $this->load->view('templates/header');
		// $this->load->view('buku/view', $data);
		// $this->load->view('templates/footer');        
    }

	

	
}
