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
		$this->load->model('buku_model');
		$this->load->model('pelanggan_model');
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

	   $data['sewa'] = $this->sewa_model->getByIdDetail($sewaId);

	   $this->load->view('templates/header');
	   $this->load->view('sewa/view', $data);
	   $this->load->view('templates/footer');
    }

	
	public function add(){
		if(strtolower($this->session->userdata('role'))!='write' && strtolower($this->session->userdata('role'))!='admin') {
			$this->session->set_flashdata('error', "Acces Denied, you dont have the access to this feature");

			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['buku'] = $this->buku_model->getAll();
		
		$data['pelanggan'] = $this->pelanggan_model->getAll();
	
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('isbn', 'ISBN Buku', 'required');
		$this->form_validation->set_rules('pelangganid', 'ID Pelanggan', 'required');
		$this->form_validation->set_rules('lamasewa', 'Lama Sewa', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan Sewa', 'required');
		$this->form_validation->set_rules('tglsewa', 'Tanggal Sewa', 'required');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Menambah Sewa';

            $this->load->view('templates/header');
            $this->load->view('sewa/add', $data);
            $this->load->view('templates/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->sewa_model->addSewa();
			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status : </strong> $result->status<br />
				<strong>Respond Error : </strong> $result->error<br />
				<strong>Message : </strong> $result->message<br />"
			);
			redirect(($result->status==200) ? "sewa/index" : "sewa/add");	//Jika Sukses kembali ke Index Sewa, jika Tidak kembali ke Form
        }
	}

	public function edit($sewaId) {
		if(strtolower($this->session->userdata('role'))!='write' && strtolower($this->session->userdata('role'))!='admin') {
			$this->session->set_flashdata('error', "Acces Denied, you dont have the access to this feature");

			redirect($_SERVER['HTTP_REFERER']);
		}


        $data['sewa'] = $this->sewa_model->getById($sewaId);
        
		//Load Library untuk Form Validation
		$this->load->library('form_validation');
        
		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('isbn', 'ISBN Buku', 'required');
		$this->form_validation->set_rules('pelangganid', 'ID Pelanggan', 'required');
		$this->form_validation->set_rules('lamasewa', 'Lama Sewa', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan Sewa', 'required');
		$this->form_validation->set_rules('tglsewa', 'Tanggal Sewa', 'required');
        
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Edit Sewa';

            $this->load->view('templates/header');
            $this->load->view('sewa/edit', $data);
            $this->load->view('templates/footer');    
        }
        else {
			//Simpan data baru
			$result = $this->sewa_model->editSewa($sewaId);

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "sewa/index" : "sewa/edit/$sewaId");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
        }
    
    }
    
	public function delete($sewaId) {
		if(strtolower($this->session->userdata('role'))!='write' && strtolower($this->session->userdata('role'))!='admin') {
			$this->session->set_flashdata('error', "Acces Denied, you dont have the access to this feature");

			redirect($_SERVER['HTTP_REFERER']);
		}

		if (is_null($sewaId)) {
			$this->session->set_flashdata('error', 'buku belum dipilih');
		}

		$result = $this->sewa_model->deleteSewa($sewaId);

		$this->session->set_flashdata(
			($result->status==200) ? 'success' : 'error',
			"<strong>Respond Status : </strong> $result->status<br />
			<strong>Respond Error : </strong> $result->error<br />
			<strong>Message : </strong> $result->message<br />"
		);

		redirect('sewa/index');
	}
	
	
}
