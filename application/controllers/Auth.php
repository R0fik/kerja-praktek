<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()	{

		$this->form_validation->set_rules('id_user', 'ID User', 'numeric|trim|required');
		$this->form_validation->set_rules('password', 'Password User', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Kunci ODC';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login() {
		$id_user = $this->input->post('id_user');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
		if ($user) {
			//jika user aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'id_user' => $user['id_user'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('work');
						// redirect('admin');
					} else {
						redirect('my_work');
						// redirect('user');
					}
				} else {
					$this->session->set_flashdata('message',
					'<div class="alert alert-danger" role="alert">Wrong password!
					 </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message',
				'<div class="alert alert-danger" role="alert">This ID User has not been activated!
				 </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message',
				'<div class="alert alert-danger" role="alert">ID User is not registered!
				 </div>');
			redirect('auth');
		}

	}

	public function registration() {
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		// unique pengecekan id_user yg sdh terdaftar
		$this->form_validation->set_rules('id_user', 'ID User', 'numeric|required|trim|is_unique[user.id_user]', [
				'is_unique' => 'This ID User has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password','required|trim|min_length[4]|matches[password2]', [
				'matches' => 'Password don\'t match!',
				'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password','required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'ODC User Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');	
		} else {
			$data = [
					'id_user' => htmlspecialchars($this->input->post('id_user', true)),
					'name' => htmlspecialchars($this->input->post('name', true)),
					// enkripsi password
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id' => 2,
					'is_active' => 1,
					'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message',
				'<div class="alert alert-success" role="alert">Congratulation! your user has been created. <br>Please Login
				 </div>');
			redirect('auth');
		}
	}

	public function logout() {
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('role_id');
		$this->session->sess_destroy('id_user');
		$this->session->sess_destroy('role_id');

		$this->session->set_flashdata('message',
				'<div class="alert alert-success" role="alert"> You have been logged out!
				 </div>');
		redirect('auth');
	}
}