<?php

class Man_key_mod extends CI_Model {
	public function tampil() {
		return $queryGet = $this->db->get('kunci')->result_array();
	}

	public function tambahKunci() {
		$data = [
	        'kode_odc' => $this->input->post('kodeODC',true),
	        'key_odc' => $this->input->post('kunciODC',true),
	        'alamat_odc' => $this->input->post('alamatODC',true),
	        'tempat_sto' => $this->input->post('tempatSTO',true)
		];
		$this->db->insert('kunci', $data);
	}

	public function hapus($id) {
		//$this->db->where('id', $id);
		$this->db->delete('kunci',['id' => $id]);
	}

	public function getKeyById($id) {
		return $this->db->get_where('kunci', ['id' => $id])->row_array();
	}

	public function ubahKunci() {
		$data = [
	        'kode_odc' => $this->input->post('kodeODC',true),
	        'key_odc' => $this->input->post('kunciODC',true),
	        'alamat_odc' => $this->input->post('alamatODC',true),
	        'tempat_sto' => $this->input->post('tempatSTO',true)
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('kunci', $data);
	}

	public function cariAlamatODC() {
		$keyword = $this->input->post('keyword',true);
		$this->db->like('alamat_odc', $keyword);
		$this->db->or_like('tempat_sto', $keyword);
		$this->db->or_like('kode_odc', $keyword);
		return $this->db->get('kunci')->result_array();
	}
}