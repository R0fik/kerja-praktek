<?php
class Man_user_mod extends CI_Model {
	public function tampil() {
		return $queryGet = $this->db->get('user')->result_array();
	}

	public function getUserById($id) {
		return $this->db->get_where('user', ['id' => $id])->row_array();
	}
}