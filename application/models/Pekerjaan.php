<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pekerjaan extends CI_Model {
	public function index() {
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['kunci'] = $this->db->get_where('kunci', ['alamat_odc' => $this->input->post('alamatOdc',true)])->row_array();

		 $data = [
		 	"id_user" => $data['user']['id_user'],
		 	"tempat_sto" => $data['kunci']['tempat_sto'],
		 	"alamat_odc" => $data['kunci']['alamat_odc'],
		 	"kode_odc" => $data['kunci']['kode_odc'],
		 	"key_odc" =>$data['kunci']['key_odc'],
		 	"name" => $data['user']['name'],
		 	"pekerjaan" => $this->input->post('pekerjaan',true),
		 	"jam_mulai" => time()
		 ];
		 $this->db->insert('info_peminjam', $data);
	}
}