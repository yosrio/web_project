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
		$data['counts'] = $this->db->count_all_results('surat_masuk');

		$data['counts2'] =$this->db->select('*')->from('surat_masuk')->where('status', 'menunggu')->count_all_results();


		// $data['karyawan'] = $this->db->select('*')->from('user')->get()->result_array();
		$data['karyawan'] = $this->db->select('user.*, user_role.role')->from('user')->join('user_role','user_role.id=user.role_id')->get()->result_array();


		$this->load->view('templates/dash_header', $data);
		$this->load->view('templates/dash_sidebar', $data);
		$this->load->view('templates/dash_navbar', $data);
		$this->load->view('user/lihatAkun', $data);
		$this->load->view('templates/dash_footer', $data);
	}

	public function editAkun(){
		if (!isset($_SESSION['email'])) {
			redirect('auth');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['title'] = 'Profil';
			$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
			$data['counts'] = $this->db->count_all_results('surat_masuk');

			$data['counts2'] =$this->db->select('*')->from('surat_masuk')->where('status', 'menunggu')->count_all_results();

			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_navbar', $data);
			$this->load->view('user/editAkun', $data);
			$this->load->view('templates/dash_footer', $data);
		}
	}

	public function tambahAkun(){
		if (!isset($_SESSION['email'])) {
			redirect('auth');
		}

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registred!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', ['matches' => 'Password dont match!',
			'min_length' => 'Password too short'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[6]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['title'] = 'Profil';
			$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
			$data['counts'] = $this->db->count_all_results('surat_masuk');

			$data['counts2'] =$this->db->select('*')->from('surat_masuk')->where('status', 'menunggu')->count_all_results();

			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_navbar', $data);
			$this->load->view('user/tambahAkun', $data);
			$this->load->view('templates/dash_footer', $data);
		} else {
			$this->registration();
		}
	}

	public function registration()
	{
		$data = [
			'name' => htmlspecialchars($this->input->post('name', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'image' => 'default.jpg',
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id' => htmlspecialchars($this->input->post('role_id', true))
		];

		$this->db->insert('user', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New account has been created. </div>');
		redirect('user/tambahAkun');
	}

	public function hapusAkun(){
		$id_user = $this->input->post('hapusId');
		$this->db->where('user_id', $id_user)->delete('user');
		$this->lihatAkun();
	}

}