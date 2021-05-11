<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_work extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('pekerjaan');
    }
	public function index() {
		$data['title'] = 'Form Tambah Pekerjaan';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('add_work/index',$data);
		$this->load->view('templates/footer');

	}
	public function tambah() {
		$data['title'] = 'Form Tambah Pekerjaan';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('add_work/index',$data);
			$this->load->view('templates/footer');
		} else {
		    $this->pekerjaan->index();
			redirect('my_work');
		}
	}

}