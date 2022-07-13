<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	function proses_login()
	{

		$u    =   $this->input->post('username');
		$p    =   md5($this->input->post('password'));
		$cek  =   $this->Auth_model->cek_login($u,$p);

		if($cek->num_rows() > 0)
		{
			foreach($cek->result() as $ck):
			$username = $ck->username;
			$role   = $ck->role;
			$nama_user= $ck->nama_user;
			$id_user  = $ck->id_user;
			endforeach;
			$data = array(
					'username'  => $username,
					'role'      => $role,
					'id_user'   => $id_user,
					'nama_user' => $nama_user
				);

			$this->session->set_userdata($data);

			//cek status user
			if($this->session->userdata('id_user') !== NULL && $this->session->userdata('role') == 'Admin')
			{
			redirect(base_url().'Ruangan');
			}
			elseif($this->session->userdata('id_user') !== NULL && $this->session->userdata('role') == 'Karyawan')
			{
			redirect(base_url().'Booking');
			}
			else{
			redirect(base_url().'Login');
			}

		}else

		{
			$this->session->set_flashdata('notif','
						<div class="alert alert-danger alert-common alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<i class="tf-ion-close-circled"></i><span>Username atau password anda salah.</span> Silahkan coba lagi! 
						</div>');
			redirect('login');
		}

	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'Login');
	}

}