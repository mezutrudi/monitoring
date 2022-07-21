<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
	}
	public function index()
	{
		$data['pesan']="";
        $this->load->view('auth/login', $data);
    }
    public function proses_login(){
		$user=$this->input->post('username');
		$pass=$this->input->post('password');

		$ceklogin=$this->m_auth->login($user,$pass);
		if ($ceklogin) {
			foreach ($ceklogin as $row) {
			$this->session->set_userdata('id_admin', $row->id_admin);
			$this->session->set_userdata('username', $row->username);
			$this->session->set_userdata('password', $row->password);
			$this->session->set_userdata('nama_lengkap', $row->nama_lengkap);
			redirect('administrator/index');
			}
		}else {
			$data['pesan']="Username atau Password tidak sesuai";
			$this->load->view('auth/login' ,$data);
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('Auth/index');
	}
}
