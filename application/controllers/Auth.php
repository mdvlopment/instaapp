<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('ModelAuth');
    }  
    
    public function index(){
        $this->load->view('login');
    }

    public function register(){
        $this->load->view('register');
    }

    public function login(){
        
        $dataInput = array(
            'username' => $this->input->post('username'),
            'password' => hash("sha256",$this->input->post('password'))
        );
                
        $query = $this->ModelAuth->login($dataInput);
        if ($query -> num_rows() == 1) {
            $data = $query->result();
            $this->session->sess_expiration = 7200;
            $this->session->set_userdata('logged_in', $data);
            
            header("location:" . base_url() . "home");

        } else {
            $data['message'] = "<code>Invalid Username or Password, try again</code>";
            $this->load->view('login', $data);
        }
    }

    public function registerUser(){
        $dataInput = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => hash("sha256",$this->input->post('password'))
        );

        if($this->ModelAuth->insert($dataInput)){
            $data['message'] = "<code>Register berhasil, silahkan Login</code>";
            $this->load->view('login', $data);
        } else {
            $data['message'] = "<code>Register gagal, coba lagi ya</code>";
            $this->load->view('register', $data);
        }

    }
            
    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        $data['message'] = 'Successfully Logout';
        $this->load->view('login', $data);
    }
}
