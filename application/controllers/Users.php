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
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');
	}

    public function view($userName) {
		if(!$this->session->userdata('username')) {
			$this->session->set_flashdata('error', "Acces Denied");

			redirect('login', 'refresh');
		}

        $data['title'] = 'Detail User';
        $data['users'] = $this->users_model->getUser($userName);
		
		// var_dump($data['users']); die;
		$this->load->view('templates/header');
		$this->load->view('users/view', $data);
		$this->load->view('templates/footer');        
    }

	public function add() {
		if(strtolower($this->session->userdata('role'))!='Write' && strtolower($this->session->userdata('role'))!='Admin') {
			$this->session->set_flashdata('error', "Acces Denied, you dont have the access to this feature");

			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('name', 'Nama User', 'required');
		$this->form_validation->set_rules('email', 'Email User', 'required');
		$this->form_validation->set_rules('username', 'Username User', 'required');
		$this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('aktif', 'Status Akun', 'required');
		$this->form_validation->set_rules('role', 'Role User', 'required');

        
        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Menambah User';
           	$this->load->view('templates/header');
            $this->load->view('users/add');
            $this->load->view('templates/footer');  

        } else {
		//Simpan data baru
			$result = $this->users_model->addUser();
			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status : </strong> $result->status<br />
				<strong>Respond Error : </strong> $result->error<br />
				<strong>Message : </strong> $result->message<br />"
				);
			redirect(($result->status==200) ? "users/index" : "users/add");	
        }
	}

	
}
