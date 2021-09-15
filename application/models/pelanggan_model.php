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

    public function getById($pelangganId) {
        $svcGet = curl_init();

        curl_setopt_array($svcGet, array(
            CURLOPT_URL => $this->svcUrl . $pelangganId,
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

	public function addPelanggan(){
        $data = array(
            'kodepel' => $this->input->post('kodepel', true),
            'nama' => $this->input->post('nama', true),
            'alamat' => $this->input->post('alamat', true),
            'telp' => $this->input->post('telp', true),
            'jk' => $this->input->post('jk', true),
            'email' => $this->input->post('email', true)
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

	public function editPelanggan($pelangganId) {

        $data = array(
            'id' => $this->input->post('id', true),
            'kodepel' => $this->input->post('kodepel', true),
            'nama' => $this->input->post('nama', true),
            'alamat' => $this->input->post('alamat', true),
            'telp' => $this->input->post('telp', true),
            'jk' => $this->input->post('jk', true),
            'email' => $this->input->post('email', true)
        );

        $svcPut = curl_init();

        curl_setopt_array($svcPut, array(
            CURLOPT_URL => $this->svcUrl . $pelangganId,
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
    
}
