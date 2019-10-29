<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	public function index()
	{
		if (!isset($_SESSION['email'])) {
			redirect('auth');
		}
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Manajemen Surat';
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$data['counts'] =$this->db->select('*')->from('surat_masuk')->where('disposisi', '')->count_all_results();
		$data['counts3'] =$this->db->count_all_results('surat_masuk');
		$data['counts2'] =$this->db->select('*')->from('surat_masuk')->where('status', 'menunggu')->count_all_results();

		$this->load->view('templates/dash_header', $data);
		$this->load->view('templates/dash_sidebar', $data);
		$this->load->view('templates/dash_navbar', $data);
		$this->load->view('surat/index', $data);
		$this->load->view('templates/dash_footer', $data);
	}

	public function suratMasuk()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$data['counts2'] =$this->db->select('*')->from('surat_masuk')->where('status', 'menunggu')->count_all_results();
		$this->load->view('templates/dash_header', $data);
		$this->load->view('templates/dash_sidebar', $data);
		$this->load->view('templates/dash_navbar', $data);
		$this->load->view('surat/surat_masuk', $data);
		$this->load->view('templates/dash_footer', $data);
	}

	public function tambahSuratMasuk()
	{
		$this->form_validation->set_rules('tgl_surat', 'Tgl_surat', 'required|trim');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim');
		$this->form_validation->set_rules('penerima', 'Penerima', 'required|trim');
		$this->form_validation->set_rules('noSuratMasuk', 'NoSuratMasuk', 'required|trim');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required|trim');
		$this->form_validation->set_rules('sifatSurat', 'SifatSurat', 'required|trim');

		if ( $this->form_validation->run() == false ) {
			$data['title'] = 'Surat Masuk';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_navbar', $data);
			$this->load->view('surat/tambahSuratMasuk', $data);
			$this->load->view('templates/dash_footer', $data);
		} else {
			$data = [
				'tanggal_masuk' => htmlspecialchars($this->input->post('tgl_surat', true)),
				'tujuan' => htmlspecialchars($this->input->post('tujuan', true)),
				'penerima' => htmlspecialchars($this->input->post('penerima', true)),
				'no_surat_masuk' => htmlspecialchars($this->input->post('noSuratMasuk', true)),
				'pengirim' => htmlspecialchars($this->input->post('pengirim', true)),
				'perihal' => htmlspecialchars($this->input->post('perihal', true)),
				'sifat_surat' => htmlspecialchars($this->input->post('sifatSurat', true)),
				'status' => 'menunggu'
			];
			$this->db->insert('surat_masuk', $data);
			redirect('surat');
		}

	}

	public function disposisi()
	{
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('status', 'status', 'required|trim');

		if ( $this->form_validation->run() == false ) {
			$data['title'] = 'Surat Masuk';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['menu'] = $this->db->get('surat_masuk')->result_array();
			$data['counts2'] =$this->db->select('*')->from('surat_masuk')->where('status', 'menunggu')->count_all_results();

			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_navbar', $data);
			$this->load->view('surat/lihatSurat', $data);
			$this->load->view('templates/dash_footer', $data);
		} else {

			$keterangan = $this->input->post('keterangan');
			$status = $this->input->post('status');
			$noUrut = $this->input->post('noUrut');

			$this->db->set('disposisi', $keterangan);
			$this->db->set('status', $status);
			$this->db->where('no_urut', $noUrut);
			$this->db->update('surat_masuk');

			redirect('surat/lihatSurat');
		}
	}

	public function laporan(){
		$noUrut = $this->input->post('noUrut');
		$surat = $this->db->get_where('surat_masuk', ['no_urut' => $noUrut])->row_array();
		$pdf = new FPDF('P','mm','A4');

		$pdf->AddPage();

		$cellWidth = 170;
		$cellHeight = 10;

		if ($pdf->GetStringWidth($surat['disposisi']) < $cellWidth){
			$line = 1;
		} else {

			$textLength = strlen($surat['disposisi']);
			$errMargin = 5;
			$startChar = 0;
			$maxChar = 0;
			$textArray = array();
			$tmpString = "";

			while($startChar < $textLength){
				while($pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) && ($startChar+$maxChar) < $textLength ) {
					$maxChar++;
					$tmpString = substr($surat['disposisi'],$startChar,$maxChar);
				}
				$startChar = $startChar+$maxChar;
				array_push($textArray,$tmpString);
				$maxChar = 0;
				$tmpString = '';

			}
			$line=count($textArray);
		}

		$pdf->SetFont('Arial','B',24);
		$pdf->Cell(40,10,'Disposisi Surat',0,1);
		$pdf->SetFont('Arial','B',20);
		$pdf->cell(40,10,'No: '.$surat['no_surat_masuk'],0,1);
		$pdf->cell(40,10,'',0,1);
		$pdf->SetFont('Arial','',18);
		$pdf->cell(40,10,'Nama: '.$surat['pengirim'],0,1);
		$pdf->cell(40,10,'Perihal: '.$surat['perihal'],0,1);
		$pdf->SetFont('Arial','',14);
		$pdf->cell(40,10,'',0,1);
		$pdf->cell(40,10,'Disposisi: ',0,1);

		$xPos=$pdf->GetX();
		$yPos=$pdf->GetY();
		$pdf->MultiCell($cellWidth,$cellHeight,$surat['disposisi'],0);

		$pdf->SetXY($xPos + $cellWidth , $yPos);

		$pdf->Output('laporan'.$noUrut.'.pdf','D');
	}

	public function lihatSurat()
	{
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['counts2'] =$this->db->select('*')->from('surat_masuk')->where('status', 'menunggu')->count_all_results();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

		if ($this->session->userdata('role_id') == '1') {
			$filter = '2';
		} else {
			$filter = '3';
		}

		$filter = $this->input->post('filter');

		if (empty($filter) || $filter == '1') {
			$data['menu'] =  $this->db->from('surat_masuk')->order_by('surat_masuk.sifat_surat DESC')->get()->result_array();
			$data['menu2'] =  $this->db->from('surat_masuk')->order_by('surat_masuk.status ASC')->get()->result_array();

			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_navbar', $data);
			$this->load->view('surat/lihatSurat', $data);
			$this->load->view('templates/dash_footer', $data);

		} else if ($filter == '2') {
			$data['menu'] =  $this->db->from('surat_masuk')->where('status', 'menunggu')->order_by('surat_masuk.sifat_surat DESC')->get()->result_array();
			$data['menu2'] =  $this->db->from('surat_masuk')->where('status', 'menunggu')->order_by('surat_masuk.status ASC')->get()->result_array();

			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_navbar', $data);
			$this->load->view('surat/lihatSurat', $data);
			$this->load->view('templates/dash_footer', $data);

		} else {
			$data['menu'] =  $this->db->from('surat_masuk')->where('status !=', 'menunggu')->order_by('surat_masuk.sifat_surat DESC')->get()->result_array();
			$data['menu2'] =  $this->db->from('surat_masuk')->where('status !=', 'menunggu')->order_by('surat_masuk.status ASC')->get()->result_array();

			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_navbar', $data);
			$this->load->view('surat/lihatSurat', $data);
			$this->load->view('templates/dash_footer', $data);

		}
	}

}
