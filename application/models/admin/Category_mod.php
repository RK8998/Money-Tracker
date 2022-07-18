<?php

	class Category_mod extends CI_model
	{
		public function cat_data(){
			$cat = $this->session->userdata('admin_session');
			$u_id = $cat[0]['u_id'];
			$data = $this->db->where('u_id',$u_id)->get('category');
			return $r = $data->result_array();
		}
		public function insert($data){
			$cat = $this->session->userdata('admin_session');
			$u_id = $cat[0]['u_id'];
			$dt = array(
				"cname"=>$data['cname'],
				"type"=>$data['type'],
				"status"=>$data['status'],
				"u_id"=>$u_id
			);
			return $this->db->insert('category',$dt);
		}
		public function delete($id){
			return $this->db->where('cid',$id)->delete('category');
		}
		public function edit_entry($id){
			$data = $this->db->where('cid',$id)->get('category');
			return $data->row();
		}
		public function update_entry($data){
			return $this->db->where('cid',$data['cid'])->update('category',$data);
		}
	}
?>