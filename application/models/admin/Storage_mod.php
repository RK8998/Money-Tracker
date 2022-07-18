<?php
	class Storage_mod extends CI_model
	{
		public function storage(){
			$sto = $this->session->userdata('admin_session');
			$u_id = $sto[0]['u_id'];
			$data = $this->db->where('u_id',$u_id)->get('storage');
			return $r = $data->result_array();
		}
		public function storage_data(){
			$sto = $this->session->userdata('admin_session');
			$u_id = $sto[0]['u_id'];
			$data = $this->db->where('u_id',$u_id)->get('storage');
			return $r = $data->result_array();
		}
		public function insert($data){
			$sto = $this->session->userdata('admin_session');
			$u_id = $sto[0]['u_id'];

			$dt = array(
				"sname"=>$data['sname'],
				"amount"=>$data['amount'],
				"detail"=>$data['detail'],
				"u_id"=>$u_id
			);
			return $this->db->insert('storage',$dt);
		}
		public function delete($id){
			return $this->db->where('sid',$id)->delete('storage');
		}
		public function edit_entry($id){
			$data = $this->db->where('sid',$id)->get('storage');
			return $data->row();
		}
		public function update_entry($data){
			return $this->db->where('sid',$data['sid'])->update('storage',$data);
		}
		public function transaction_income($id){
			$q1 = "select * from income where storage = $id";
			$data = $this->db->query($q1);
			return $data = $data->result_array();
		}
		public function transaction_expense($id){
			$q1 = "select * from expense where storage = $id";
			$data = $this->db->query($q1);
			return $data = $data->result_array();
		}
	}
?>