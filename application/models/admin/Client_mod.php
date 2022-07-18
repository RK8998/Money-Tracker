<?php 
	
	class Client_mod extends CI_Model
	{	
		public function fetch_client($cid = NULL){

			$client = $this->session->userdata('admin_session');
			$u_id = $client[0]['u_id'];
			
			if($cid==NULL){
				$r=$this->db->where('u_id',$u_id)->get('client');
				return $r->result();	
			}else
			{
				$u=$this->db->where('cid',$cid)->get('client');
				return $u->row();
			}
		}
		public function add_client($data){
			$clt = $this->session->userdata('admin_session');
			$u_id = $clt[0]['u_id'];
			$dt = array(
				"name"=>$data['name'],
				"mobile"=>$data['mobile'],
				"address"=>$data['address'],
				"u_id"=>$u_id
			);
			return $this->db->insert('client',$dt);
		}
		public function delete($cid){
			return $this->db->where('cid',$cid)->delete('client');
		}
		public function update($data){
			return $this->db->where('cid',$data['cid'])->update('client',$data);
		}
		public function check_client($data){
			$clt = $this->session->userdata('admin_session');
			$u_id = $clt[0]['u_id'];
			$res = $this->db->where('u_id',$u_id)->where('name',$data['name'])->get('client');
			$r = $res->num_rows();
			if($r == 0){
				return true;
			}else{
				return false;
			}
		}
	}
?>