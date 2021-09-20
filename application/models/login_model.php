<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_Model extends CI_Model {
    private $svcUrl = 'http://localhost:8888/users/';

    public function request_login() {
        $userEmail = $this->input->post('userEmail', true);
        $userPass = md5($this->input->post('userPass', true));
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->svcUrl .'userRole/' .$userEmail,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      
        ));

        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        // var_dump($response);
        if (isset($response->status)){
            $this->session->set_flashdata(
               'error',
               "<strong>Respond Status</strong> $response->statusn</br>
               <strong>Message</strong> $response->message</br>" 
            );
            throw new Exception($response->message);
        }

        if (strtoupper($userPass) == strtoupper($response->password)) {
            $this->session->set_userdata('id', $response->id);
            $this->session->set_userdata('name', $response->name);
            $this->session->set_userdata('zipcode', $response->zipcode);
            $this->session->set_userdata('email', $response->email);
            $this->session->set_userdata('username', $response->username);
            $this->session->set_userdata('pasword', $response->password);
            $this->session->set_userdata('roleid', $response->roleid);
            $this->session->set_userdata('role', $response->role);
            $this->session->set_userdata('aktif', $response->aktif);
            // var_dump($response); die();

            if(!$response->aktif) {
                $this->session->set_flashdata('error', "<strong>User is not active</strong>");

                throw new Exception("User is not active");
            }
            return true;

        } else {
            $this->session->set_flashdata('error', "<strong>Wrong Password</strong>");

            throw new Exception("Wrong Password");
        }

    }



}
