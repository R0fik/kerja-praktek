<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_work extends CI_Controller {
	public function index() {
		$data['title'] = 'Kunci ODC';
		//$data['judul'] = 'Daftar Pekerjaan';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

		$data['work'] = $this->db->get('info_peminjam')->result_array();

		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('my_work/index',$data);
		$this->load->view('templates/footer');
	}

	public function selesai (){
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

		$idUser =$data['user']['id_user'];
		$time = time();
		$jamSelesai = "UPDATE `info_peminjam` SET `jam_selesai` = $time WHERE `id_user` = $idUser OR `jam_selesai` = NULL ORDER BY `jam_mulai` DESC LIMIT 1";

		$this->db->query($jamSelesai);			
		redirect('my_work');
	}
	
}