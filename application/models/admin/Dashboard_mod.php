<?php 
	
	class Dashboard_mod extends CI_Model
	{	
		public function user(){
			$usr = $this->session->userdata('admin_session');
			$u_id = $usr[0]['u_id'];
			$q = "select count(u_id)As 'total_user' from login where type = 2";
			$data = $this->db->query($q);
			return $data = $data->row();
		}
		public function user_active(){
			$usr = $this->session->userdata('admin_session');
			$u_id = $usr[0]['u_id'];
			$q = "select count(u_id)As 'total_act_user' from login where type = 2 and status = 'active'";
			$data = $this->db->query($q);
			return $data = $data->row();
		}
		public function user_inactive(){
			$usr = $this->session->userdata('admin_session');
			$u_id = $usr[0]['u_id'];
			$q = "select count(u_id)As 'total_inact_user' from login where type = 2 and status = 'inactive'";
			$data = $this->db->query($q);
			return $data = $data->row();
		}
		public function category(){
			$das = $this->session->userdata('admin_session');
			$u_id = $das[0]['u_id'];
			$q = "select count(cid)As 'total_category' from category where u_id = $u_id";
			$data = $this->db->query($q);
			return $data = $data->row();
		}
		public function category_active(){
			$act_cat = $this->session->userdata('admin_session');
			$u_id = $act_cat[0]['u_id'];
			$q = "select count(cid)As 'total_active_category' from category where status = 'Active' and u_id = $u_id";
			$data = $this->db->query($q);
			return $data = $data->row();
			// echo json_encode($q);
		}
		public function category_inactive(){
			$inact_cat = $this->session->userdata('admin_session');
			$u_id = $inact_cat[0]['u_id'];
			$q = "select count(cid)As 'total_inactive_category' from category where status = 'Inactive' and u_id = $u_id";
			$data = $this->db->query($q);
			return $data = $data->row();
		}
		public function income(){
			$inc = $this->session->userdata('admin_session');
			$u_id = $inc[0]['u_id'];
			$q = "select sum(amount)As 'total_income' from income where u_id = $u_id";
			$data = $this->db->query($q);
			return $data = $data->row();
		}
		public function expense(){
			$exp = $this->session->userdata('admin_session');
			$u_id = $exp[0]['u_id'];
			$q = "select sum(amount)As 'total_expense' from expense where u_id = $u_id";
			$data = $this->db->query($q);
			return $data = $data->row();
		}
		public function storage(){
			$str = $this->session->userdata('admin_session');
			$u_id = $str[0]['u_id'];
			$q = "select count(sid)As 'total_storage' from storage where u_id = $u_id";
			$data = $this->db->query($q);
			return $data = $data->row();
		}
		public function client(){
			$clt = $this->session->userdata('admin_session');
			$u_id = $clt[0]['u_id'];
			$q = "select count(cid)As 'total_client' from client where u_id = $u_id";
			$data = $this->db->query($q);
			return $data = $data->row();
		}
		public function loan(){
			$ln = $this->session->userdata('admin_session');
			$u_id = $ln[0]['u_id'];
			$q = "select sum(amount)As 'total_loan' from loan where u_id = $u_id";
			$data = $this->db->query($q);
			return $data = $data->row();
		}
		public function close_loan(){
			$cl = $this->session->userdata('admin_session');
			$u_id = $cl[0]['u_id'];
			$q = "select sum(amount)As 'total_close_loan' from close_deal where u_id = $u_id";
			$data = $this->db->query($q);
			return $data = $data->row();
		}
	}
?>