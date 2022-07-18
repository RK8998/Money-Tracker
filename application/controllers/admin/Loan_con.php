<?php
	class Loan_con extends My_Controller
	{
		public function index(){
			$data['storage'] = $this->sm->storage();
			$this->load->view('admin/template/header');
			$this->load->view('admin/Loan',$data);
			$this->load->view('admin/template/footer');
		}
		public function error(){
			$this->load->view('admin/error');
		}
		public function match_user(){
			if($this->input->is_ajax_request()){		
				$data = $this->input->post();
				$dt = $this->lm->match_user($data);
				// if(){
				// 	$data = array("status"=>"success","match"=>$dt);
				// }else{
				// 	$data = array("status"=>"success","match"=>"no match");
				// }
				echo json_encode($dt);
			} else {
				$this->error();
			}
		}
		public function get_loan(){
			if($this->input->is_ajax_request()){
				// $this->lm->loan_data();
				$data = $this->lm->loan_data();
				echo json_encode($data);
			}else{
				$this->error();
			}
		}
		public function delete_loan(){
			if($this->input->is_ajax_request()){
				$id = $this->input->post('did');
				if($this->lm->delete($id)){
					$data = array("status"=>"success","msg"=>"Delete Succcessfully");
				}else{
					$data = array("status"=>"fail","msg"=>"Not Deleted");
				}
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
		public function close()
		{
			if($this->input->is_ajax_request()){
				$id = $this->input->post('cid');

				if($close = $this->lm->close_entry($id)) {
					$data = array("status"=>"success","close"=>$close);
				} else {
					$data = array("status"=>"error","msg"=>"failed to fetch record");
				}
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
		public function close_deal()
		{
			if($this->input->is_ajax_request()){
				$data = $this->input->post();
				// $this->lm->close_deal($data);
				if($this->lm->close_deal($data)){
					$data = array("status"=>"success", "msg"=>"Deal successfully closed");
				}else{
					$data = array("status"=>"fail", "msg"=>"Loan not closed");
				}
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
		public function close_deal_view(){
			$this->load->view('admin/template/header');
			$this->load->view('admin/close_deal');
			$this->load->view('admin/template/footer');
		}
		public function get_close_deal(){
			if($this->input->is_ajax_request()){
				$data = $this->lm->close_deal_data();
				echo json_encode($data);
			}else{
				$this->error();
			}	
		}
		public function delete_close_deal(){
			if($this->input->is_ajax_request()){
				$id = $this->input->post('did');
				if($this->lm->delete_deal($id)){
					$data = array("status"=>"success","msg"=>"Delete Succcessfully");
				}else{
					$data = array("status"=>"fail","msg"=>"Not Deleted");
				}
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
		public function insert_loan(){
			if($this->input->is_ajax_request()){		
				$data = $this->input->post();
				// $res = $this->lm->client_data($data);
				// $dt = array("cid"=>$res[0]['cid'],"data"=>$data,"close_amount"=>0);
				if($this->lm->check_cliet($data)){
					$res = $this->lm->client_data($data);
					$dt = array("cid"=>$res[0]['cid'],"data"=>$data,"close_amount"=>0);
					if($this->lm->insert($dt)){
						$data = array("status"=>"success","msg"=>"Deal successfuly created");
					}else{
						$data = array("status"=>"fail","msg"=>"Deal not created");
					}
				}
				else{
					$data=array('status'=>'fail','msg'=>'Client is not exist');
				}
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
	}
?>