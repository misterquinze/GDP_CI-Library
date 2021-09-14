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


}
