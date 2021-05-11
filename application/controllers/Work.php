<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work extends CI_Controller {
	public function index() {
		$data['title'] = 'Kunci ODC';
		//$data['judul'] = 'Daftar Pekerjaan';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

		$this->db->order_by('id', 'DESC');
		$data['work'] = $this->db->get('info_peminjam')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('work/index',$data);
		$this->load->view('templates/footer');
	}
}