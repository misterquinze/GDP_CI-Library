<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Model extends CI_Model {
    // private $svcUrl = 'http://localhost:8888/users/email/$userEmail';
    private $svcUrl = 'http://localhost:8888/users/';


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

    public function getUser($userEmail) {
        if (is_null($userEmail)) {
            $this->session->set_flashdata('error', "Message: Please select a User!");
            throw new Exception();
        }
        $api_url = 'http://localhost:8888/users/userRole/username/';
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url . $userEmail,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
        ));

        $response = json_decode(curl_exec($curl));

        curl_close($curl);
        // var_dump($response);

        if (!is_null($response))            
            return $response;
        else
            show_404();
    }

   
    
}
