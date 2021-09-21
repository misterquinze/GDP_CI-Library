<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
	//Constructor
	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('username')) {
			$this->session->set_flashdata('error', "Acces Denied, Please Login");

			redirect('login', 'refresh');
		}

		$this->load->model('buku_model');
	}

	public function index() {
		
        $data['title'] = 'Daftar Buku';
        $data['buku'] = $this->buku_model->getAll();

		$this->load->view('templates/header');
		$this->load->view('buku/index', $data);
		$this->load->view('templates/footer');
	}

    public function view($bukuId) {
        $data['title'] = 'Detail Buku';
        $data['buku'] = $this->buku_model->getById($bukuId);

		$this->load->view('templates/header');
		$this->load->view('buku/view', $data);
		$this->load->view('templates/footer');        
    }

	public function add(){
		if(strtolower($this->session->userdata('role'))!='write' && strtolower($this->session->userdata('role'))!='admin') {
			$this->session->set_flashdata('error', "Acces Denied, you dont have the access to this feature");

			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('judul', 'Judul Buku', 'required');
		$this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required');
		$this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'required');
		$this->form_validation->set_rules('tglTerbit', 'Tanggal Terbit', 'required');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Menambah Buku';

            $this->load->view('templates/header');
            $this->load->view('buku/add');
            $this->load->view('templates/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->buku_model->addBuku();
			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status : </strong> $result->status<br />
				<strong>Respond Error : </strong> $result->error<br />
				<strong>Message : </strong> $result->message<br />"
			);
			redirect(($result->status==200) ? "buku/index" : "buku/add");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
	}

    public function edit($bukuId) {
		if(strtolower($this->session->userdata('role'))!='write' && strtolower($this->session->userdata('role'))!='admin') {
			$this->session->set_flashdata('error', "Acces Denied, you dont have the access to this feature");

			redirect($_SERVER['HTTP_REFERER']);
		}


        $data['buku'] = $this->buku_model->getById($bukuId);
        
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('judul', 'Judul Buku', 'required');
		$this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required');
		$this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'required');
		$this->form_validation->set_rules('tglTerbit', 'Tanggal Terbit', 'required');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Edit Buku';

            $this->load->view('templates/header');
            $this->load->view('buku/edit', $data);
            $this->load->view('templates/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->buku_model->editBuku($bukuId);

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "buku/index" : "buku/edit/$bukuId");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
    
    }

	public function delete($bukuId) {
		if(strtolower($this->session->userdata('role'))!='write' && strtolower($this->session->userdata('role'))!='admin') {
			$this->session->set_flashdata('error', "Acces Denied, you dont have the access to this feature");

			redirect($_SERVER['HTTP_REFERER']);
		}

		if (is_null($bukuId)) {
			$this->session->set_flashdata('error', 'buku belum dipilih');
		}

		$result = $this->buku_model->deleteBuku($bukuId);

		$this->session->set_flashdata(
			($result->status==200) ? 'success' : 'error',
			"<strong>Respond Status : </strong> $result->status<br />
			<strong>Respond Error : </strong> $result->error<br />
			<strong>Message : </strong> $result->message<br />"
		);

		redirect('buku/index');
	}

	
}
