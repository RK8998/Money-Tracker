<?php
	class Income_mod extends CI_model
	{
		public function category(){
			$inc = $this->session->userdata('admin_session');
			$u_id = $inc[0]['u_id'];
			$cat = $this->db->where('u_id',$u_id)->where('type','Income')->get('category');
			return $data = $cat->result_array();
		}
		public function income_data($id = NULL){
			$inc = $this->session->userdata('admin_session');
			$u_id = $inc[0]['u_id'];
			if($id == NULL){
				$data=$this->db->where('u_id',$u_id)->get('income');
				return $r = $data->result_array();
			}else{
				$data = $this->db->where('iid',$id)->get('income');
				return $r = $data->result_array();
			}
		}
		public function storage_name($data){
			$sid = $data['storage'];
			$dt = $this->db->select('sname')->where('sid',$sid)->get('storage');
			return $r = $dt->result_array();
		}
		public function insert($data){
			$amount = $data['data']['amount'];
			$storage = $data['data']['storage'];
			$q = "update storage set amount = amount + $amount where sid = $storage";
			$this->db->query($q);
			// $storage_name = $data[0]['sname'];
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
			// echo json_encode($storage_name);
			// $this->db->update('storage')->set('amount','500')->where('sid','4');
			return  $this->db->insert('income',$dt);
		}
		public function delete($data){
			$id = $data[0]['iid'];
			$amount = $data[0]['amount'];
			$storage = $data[0]['storage'];
			$q = "update storage set amount = amount - $amount where sid = $storage";
			$this->db->query($q);
			$res = $this->db->where('iid',$id)->delete('income');
			return $res;
		}
		public function edit_entry($id){
			$data = $this->db->where('iid',$id)->get('income');
			return $data->row();
		}
		public function storage_edit($data){
			$amount = $data[0]['amount'];
			$storage = $data[0]['storage'];
			$q = "update storage set amount = amount - $amount where sid = $storage";
			$this->db->query($q);
		}
		public function update_entry($data){
			$amount = $data['amount'];
			$storage = $data['storage'];
			$q = "update storage set amount = amount + $amount where sid = $storage";
			$this->db->query($q);
			return $this->db->where('iid',$data['iid'])->update('income',$data);
		}
	}
?>