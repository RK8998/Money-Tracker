<?php

	class User_mod extends CI_model
	{
		public function user_data(){
			$data = $this->db->where('type',2)->get('login');
			return $r = $data->result_array();
		}
		public function delete($id){
			return $this->db->where('u_id',$id)->delete('login');
		}
		public function edit_entry($id){
			$data = $this->db->where('u_id',$id)->get('login');
			return $data->row();
		}
		public function update_entry($data){
			$u_id = $data['u_id'];
			$status = $data['status'];
			$q = "update login set status = '$status' where u_id = $u_id";
			return $this->db->query($q);
		}
	}
?>