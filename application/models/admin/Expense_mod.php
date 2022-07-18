<?php
	class Expense_mod extends CI_model
	{
		public function category(){
			$exp = $this->session->userdata('admin_session');
			$u_id = $exp[0]['u_id'];
			$cat = $this->db->where('u_id',$u_id)->where('type','Expense')->get('category');
			return $data = $cat->result_array();
		}
		public function expense_data($id = NULL){
			$exp = $this->session->userdata('admin_session');
			$u_id = $exp[0]['u_id'];
			if($id == NULL){
				$data = $this->db->where('u_id',$u_id)->get('expense');
				return $r = $data->result();
			}else{
				$data = $this->db->where('eid',$id)->get('expense');
				return $r = $data->result_array();
			}
		}
		public function insert($data){
			$amount = $data['data']['amount'];
			$storage = $data['data']['storage'];
			$q = "update storage set amount = amount - $amount where sid = $storage";
			$this->db->query($q);

			$inc = $this->session->userdata('admin_session');
			$u_id = $inc[0]['u_id'];
			$dt = array(
				"amount"=>$data['data']['amount'],
				"detail"=>$data['data']['detail'],
				"date"=>$data['data']['date'],
				"category"=>$data['data']['category'],
				"storage"=>$data['data']['storage'],
				"storage_name"=>$data['sname'],
				"u_id"=>$u_id
			);
			return $this->db->insert('expense',$dt);
		}
		public function delete($data){
			$id = $data[0]['eid'];
			$amount = $data[0]['amount'];
			$storage = $data[0]['storage'];
			$q = "update storage set amount = amount + $amount where sid = $storage";
			$this->db->query($q);

			return $this->db->where('eid',$id)->delete('expense');
		}
		public function edit_entry($id){
			$data = $this->db->where('eid',$id)->get('expense');
			return $data->row();
		}
		public function storage_edit($data){
			$amount = $data[0]['amount'];
			$storage = $data[0]['storage'];
			$q = "update storage set amount = amount + $amount where sid = $storage";
			$this->db->query($q);
		}
		public function update_entry($data){
			$amount = $data['amount'];
			$storage = $data['storage'];
			$q = "update storage set amount = amount - $amount where sid = $storage";
			$this->db->query($q);
			return $this->db->where('eid',$data['eid'])->update('expense',$data);
		}
		public function amount_validation($sid){
			$data = $this->db->where('sid',$sid)->get('storage');
			return $data->row();
		}
		public function storage_name($data){
			$sid = $data['storage'];
			$dt = $this->db->select('sname')->where('sid',$sid)->get('storage');
			return $r = $dt->result_array();
		}
	}
?>