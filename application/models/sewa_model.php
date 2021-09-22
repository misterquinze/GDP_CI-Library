<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sewa_Model extends CI_Model {
    private $svcUrl = 'http://localhost:8888/sewa/';
    private $svcSewaDetail = 'http://localhost:8888/sewadetail/';

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

    public function getByIdDetail($sewaId) {
        $svcGet=curl_init();

        curl_setopt_array($svcGet, array(
            CURLOPT_URL => $this->svcSewaDetail . $sewaId,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ));

        $response = json_decode(curl_exec($svcGet));
        curl_close($svcGet);
        // var_dump($response);

        if (!is_null($response))            
            return $response;
        else
            show_404();
    }

    public function getById($sewaId) {
        $svcGet=curl_init();

        curl_setopt_array($svcGet, array(
            CURLOPT_URL => $this->svcUrl . $sewaId,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ));

        $response = json_decode(curl_exec($svcGet));
        curl_close($svcGet);
        // var_dump($response);

        if (!is_null($response))            
            return $response;
        else
            show_404();
    }

    public function addSewa(){
        $data = array(
            'isbn' => $this->input->post('isbn', true),
            'pelangganid' => $this->input->post('pelangganid', true),
            'lamasewa' => $this->input->post('lamasewa', true),
            'keterangan' => $this->input->post('keterangan', true),
            'tglsewa' => $this->input->post('tglsewa', true)
        );

        $svcAdd = curl_init();

        curl_setopt_array($svcAdd, array(
            CURLOPT_URL => $this->svcUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array('Content-Type: application/json')
        ));

        $response = json_decode(curl_exec($svcAdd));

        curl_close($svcAdd);

        // var_dump($response);
        if (!is_null($response))            
            return $response;
        else
            show_404();

    }

	public function editSewa($sewaId) {
        $data = array(
            'isbn' => $this->input->post('isbn', true),
            'pelangganid' => $this->input->post('pelangganid', true),
            'lamasewa' => $this->input->post('lamasewa', true),
            'keterangan' => $this->input->post('keterangan', true),
            'tglsewa' => $this->input->post('tglsewa', true)
        );

        $svcPut = curl_init();

        curl_setopt_array($svcPut, array(
            CURLOPT_URL => $this->svcUrl . $sewaId,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array('Content-Type: application/json')
        ));

        $response = json_decode(curl_exec($svcPut));

        curl_close($svcPut);

        // var_dump($response);
        if (!is_null($response))            
            return $response;
        else
            show_404();


    }

    public function deleteSewa($sewaId) {
        $svcDelete = curl_init();

        curl_setopt_array($svcDelete, array(
            CURLOPT_URL => $this->svcUrl . $sewaId,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE'
        ));

        $response = json_decode(curl_exec($svcDelete));

        curl_close($svcDelete);

        // var_dump($response);
        if (!is_null($response))            
            return $response;
        else
            show_404();
    }



}
