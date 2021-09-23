<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('username')) {
			$this->session->set_flashdata('error', "Acces Denied, Please Login");

			redirect('login', 'refresh');
		}
		$this->load->model('pelanggan_model');
	}

	public function index() {
		if(!$this->session->userdata('username')) {
			$this->session->set_flashdata('error', "Acces Denied");

			redirect('login', 'refresh');
		}

        $data['title'] = 'Daftar Pelanggan';
        $data['pelanggan'] = $this->pelanggan_model->getAll();

		$this->load->view('templates/header');
		$this->load->view('pelanggan/index', $data);
		$this->load->view('templates/footer');
	}

    public function view($pelangganId) {
		$data['title'] = 'Detail Pelanggan';
        $data['pelanggan'] = $this->pelanggan_model->getById($pelangganId);

		$this->load->view('templates/header');
		$this->load->view('pelanggan/view', $data);
		$this->load->view('templates/footer');        
    }

	public function add() {
		if(strtolower($this->session->userdata('role'))!='write' && strtolower($this->session->userdata('role'))!='admin') {
			$this->session->set_flashdata('error', "Acces Denied, you dont have the access to this feature");

			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('kodepel', 'Kode Pelanggan', 'required');
		$this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Pelanggan', 'required');
		$this->form_validation->set_rules('telp', 'Telepon Pelanggan', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('email', 'Email Pelanggan', 'required');

        
        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Menambah Pelanggan';
           	$this->load->view('templates/header');
            $this->load->view('pelanggan/add');
            $this->load->view('templates/footer');  

        } else {
		//Simpan data baru
			$result = $this->pelanggan_model->addPelanggan();
			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status : </strong> $result->status<br />
				<strong>Respond Error : </strong> $result->error<br />
				<strong>Message : </strong> $result->message<br />"
				);
			redirect(($result->status==200) ? "pelanggan/index" : "pelanggan/add");	
        }
	}

	public function edit($pelangganId) {
		
		if(strtolower($this->session->userdata('role'))!='Write' && strtolower($this->session->userdata('role'))!='Admin') {
			$this->session->set_flashdata('error', "Acces Denied, you dont have the access to this feature");

			redirect($_SERVER['HTTP_REFERER']);
		}

		$data['pelanggan'] = $this->pelanggan_model->getById($pelangganId);
				
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
				
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('kodepel', 'Kode Pelanggan', 'required');
		$this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required');
		$this->form_validation->set_rules('alamat', 'AlamatPelanggan', 'required');
		$this->form_validation->set_rules('telp', 'Telepon Pelanggan', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('email', 'Email Pelanggan', 'required');
				
		if ($this->form_validation->run() === FALSE) {
			$data['title'] = 'Edit Pelanggan';
		
			$this->load->view('templates/header');
			$this->load->view('pelanggan/edit', $data);
			$this->load->view('templates/footer');    
		} else {
			//Simpan data baru
			$result = $this->pelanggan_model->editPelanggan($pelangganId);
		
			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);
		
			redirect(($result->status==200) ? "pelanggan/index" : "pelanggan/edit/$pelangganId");	
		}
	}

	public function delete($pelangganId) {
		
		if(strtolower($this->session->userdata('role'))!='Write' && strtolower($this->session->userdata('role'))!='Admin') {
			$this->session->set_flashdata('error', "Acces Denied, you dont have the access to this feature");

			redirect($_SERVER['HTTP_REFERER']);
		}

		if (is_null($pelangganId)) {
			$this->session->set_flashdata('error', 'pelanggan belum dipilih');
		}
	
		$result = $this->pelanggan_model->deletePelanggan($pelangganId);
	
		$this->session->set_flashdata(
			($result->status==200) ? 'success' : 'error',
			"<strong>Respond Status : </strong> $result->status<br />
			<strong>Respond Error : </strong> $result->error<br />
			<strong>Message : </strong> $result->message<br />"
		);
	
		redirect('pelanggan/index');	
	}

}

