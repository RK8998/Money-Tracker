<?php 
	class Reg_mod extends CI_Model
	{
		public function insert($data){
			return $this->db->insert('login',$data);
		}
		public function check_email($data){
			$username = $data['username'];
			$res = $this->db->select('*')->from('login')->where('username',$username)->get();
			// $res = $res->result_array();
			$cnt = $res->num_rows();
			if($cnt == 0){
				return true;
			}else{
				return false;
			}
		}
	}
?>