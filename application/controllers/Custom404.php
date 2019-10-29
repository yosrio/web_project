<?php
class Custom404 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->output->set_status_header('404');
		$this->data['content'] = 'custom404';  // View name
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Profil';
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$data['counts'] = $this->db->count_all_results('surat_masuk');

		$data['counts2'] =$this->db->select('*')->from('surat_masuk')->where('status', 'menunggu')->count_all_results();
		$this->load->view('templates/dash_header', $data);
		$this->load->view('templates/dash_sidebar', $data);
		$this->load->view('templates/dash_navbar', $data);
		$this->load->view('custom404', $data);
		$this->load->view('templates/dash_footer', $data);
	}
}