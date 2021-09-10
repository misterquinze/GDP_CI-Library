<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salam extends CI_Controller {
	private $testText = 'Sebuah Testing';
	
	public function index($nama = 'Manusia', $alamat = 'Bandung') {
		$data['nama'] = $nama;
		$data['alamat'] = $alamat;
		$data['daftarPendidikan'] = ['SD', 'SMP', 'SMA'];

		$this->load->view('templates/header');
		$this->load->view('salam/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($pages = 'view') {
		if (!file_exists(APPPATH . 'views/salam/' . $pages . '.php')) {
			show_404();
		}

		$this->load->view('templates/header');
		$this->load->view('salam/' . $pages);
		$this->load->view('templates/footer');
	}
}
