<?php

class Pelanggan_Model extends CI_Model {
    private $svcUrl = 'http://localhost:8888/pelanggan/';

    public function getAll() {
        $svcGet = curl_init();

        curl_setopt_array($svcGet, array(
            CURLOPT_URL => $this->svcUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ));

        $response = json_decode(curl_exec($svcGet));
        curl_close($svcGet);

        if(is_null($response)) {
            show_404();
        }

        return $response;
    }

    // public function getById($bukuId) {
    //     $svcGet = curl_init();

    //     curl_setopt_array($svcGet, array(
    //         CURLOPT_URL => $this->svcUrl . $bukuId,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'GET'
    //     ));

    //     $response = json_decode(curl_exec($svcGet));
    //     curl_close($svcGet);
    //     // var_dump($response);

    //     if (!is_null($response))            
    //         return $response;
    //     else
    //         show_404();
    // }

    // public function editBuku($bukuId) {
    //     //Mengakses Web Service menggunakan HTTP Request
    //     //$api_url = "http://localhost:8888/buku/$bukuId";

    //     $data = array(
    //         'id' => $this->input->post('id', true),
    //         'judul' => $this->input->post('judul', true),
    //         'pengarang' => $this->input->post('pengarang', true),
    //         'penerbit' => $this->input->post('penerbit', true),
    //         'tglterbit' => $this->input->post('tglTerbit', true),
    //         'isbn' => $this->input->post('isbn', true),
    //         'userid' => $this->input->post('userId', true)
    //     );

    //     $svcPut = curl_init();

    //     curl_setopt_array($svcPut, array(
    //         CURLOPT_URL => $this->svcUrl . $bukuId,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'PUT',
    //         CURLOPT_POSTFIELDS => json_encode($data),
    //         CURLOPT_HTTPHEADER => array('Content-Type: application/json')
    //     ));

    //     $response = json_decode(curl_exec($svcPut));

    //     curl_close($svcPut);

    //     // var_dump($response);
    //     if (!is_null($response))            
    //         return $response;
    //     else
    //         show_404();

    // }

	// public function deleteBuku($bukuId) {
 
    //     $svcDelete = curl_init();

    //     curl_setopt_array($svcDelete, array(
    //         CURLOPT_URL => $this->svcUrl . $bukuId,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'DELETE'
    //     ));

    //     $response = json_decode(curl_exec($svcDelete));

    //     curl_close($svcDelete);

    //     // var_dump($response);
    //     if (!is_null($response))            
    //         return $response;
    //     else
    //         show_404();

    // }

    // public function addBuku(){
    //     $data = array(
    //         'judul' => $this->input->post('judul', true),
    //         'pengarang' => $this->input->post('pengarang', true),
    //         'penerbit' => $this->input->post('penerbit', true),
    //         'tglterbit' => $this->input->post('tglTerbit', true),
    //         'isbn' => $this->input->post('isbn', true),
    //         'userid' => $this->input->post('userId', true)
    //     );

    //     $svcAdd = curl_init();

    //     curl_setopt_array($svcAdd, array(
    //         CURLOPT_URL => $this->svcUrl,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => json_encode($data),
    //         CURLOPT_HTTPHEADER => array('Content-Type: application/json')
    //     ));

    //     $response = json_decode(curl_exec($svcAdd));

    //     curl_close($svcAdd);

    //     // var_dump($response);
    //     if (!is_null($response))            
    //         return $response;
    //     else
    //         show_404();

    // }

}
