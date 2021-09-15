<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('pelanggan_model');
	}

	public function index() {
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


}
