<?php

class Surat_model extends CI_Model {
	public function show_data()
	{
		return $this->db->get('tb_surat');
	}

	public function input_data($data){
		$this->db->insert('tb_surat',$data);
	}

	public function delete_data($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function edit_data($where, $table){
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	public function detail_data($id = NULL){
		$query = $this->db->get_where('tb_surat', array('id' => $id))->row();
		return $query;
	}

	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('tb_surat');
		$this->db->like('judul', $keyword);
		return $this->db->get()->result();
	}

}

?>
