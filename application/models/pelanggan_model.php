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

    
}
