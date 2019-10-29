<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		if (!isset($_SESSION['email'])) {
			redirect('auth');
		}
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Profil';
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$data['counts'] = $this->db->count_all_results('surat_masuk');

		$data['counts2'] =$this->db->select('*')->from('surat_masuk')->where('status', 'menunggu')->count_all_results();

		$this->load->view('templates/dash_header', $data);
		$this->load->view('templates/dash_sidebar', $data);
		$this->load->view('templates/dash_navbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/dash_footer', $data);
	}

	public function lihatAkun(){
		if (!isset($_SESSION['email'])) {
			redirect('auth');
		}

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Profil';
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$data['karyawan'] =$this->db->select('*')->from('user')->get()->result_array();
		$data['roleKaryawan'] =$this->db->select('*')->from('user')->get()->result_array();


		$this->load->view('templates/dash_header', $data);
		$this->load->view('templates/dash_sidebar', $data);
		$this->load->view('templates/dash_navbar', $data);
		$this->load->view('user/lihatAkun', $data);
		$this->load->view('templates/dash_footer', $data);
	}
}