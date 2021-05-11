<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Man_user extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Man_user_mod');
	}

	public function index() {
		$data['title'] = 'Kunci ODC';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

		$data['userTampil'] = $this->Man_user_mod->tampil();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('man_user/index',$data);
		$this->load->view('templates/footer');
	}

	public function ubah($id) {
		$data['title'] = 'Kunci ODC';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['userId'] = $this->Man_user_mod->getUserById($id);

		$this->form_validation->set_rules('password1', 'Password','required|trim|min_length[4]|matches[password2]', [
				'matches' => 'Password don\'t match!',
				'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password','required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'ODC Reset Password User';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('man_user/ubah',$data);
			$this->load->view('templates/footer');
		} else {
			$data = [
					// enkripsi password
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id' => 2,
					'is_active' => 1,
					'date_created' => time()
			];
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('user', $data);
			$this->session->set_flashdata('message',
				'<div class="alert alert-success" role="alert"> Password user berhasil diubah
				 </div>');
			redirect('man_user');
		}
	}

}