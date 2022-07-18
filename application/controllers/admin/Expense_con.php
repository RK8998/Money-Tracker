<?php
	class Expense_con extends My_Controller
	{
		public function index(){
			$data['cat'] = $this->em->category();
			$data['storage'] = $this->sm->storage();
			$this->load->view('admin/template/header');
			$this->load->view('admin/Expense',$data);
			$this->load->view('admin/template/footer');
		}
		public function error(){
			$this->load->view('admin/error');
		}
		public function get_expense(){
			if($this->input->is_ajax_request()){
				$data = $this->em->expense_data();
				// if($data = $this->em->expense_data()){
				// 	$data = array("status"=>"success","expense"=>$data);
				// }else{
				// 	$data = array("status"=>"fail","expense"=>"No data found");
				// }
				echo json_encode($data);
			}else{
				$this->error();
			}
		}
		public function insert_expense(){
			if($this->input->is_ajax_request()){		
				$data = $this->input->post();
				$sname = $this->em->storage_name($data);
				$dt = array("data"=>$data,"sname"=>$sname[0]['sname']);
				if($this->em->insert($dt)){
					$data = array("status"=>"success","msg"=>"Expense successfuly added");
				}else{
					$data = array("status"=>"fail","msg"=>"Expense not added");
				}	
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
		public function delete_expense(){
			if($this->input->is_ajax_request()){
				$id = $this->input->post('did');
				$dt = $this->em->expense_data($id);
				if($this->em->delete($dt)){
					$data = array("status"=>"success","msg"=>"Delete Succcessfully");
				}else{
					$data = array("status"=>"fail","msg"=>"Not Deleted");
				}
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
		public function edit()
		{
			if($this->input->is_ajax_request()){
				$id = $this->input->post('eid');
				// $edit = $this->im->edit_entry($id);
				
				// $this->im->storage_edit($dt);

				if($edit = $this->em->edit_entry($id)){
					$dt = $this->em->expense_data($id);
					$this->em->storage_edit($dt);	
					$data = array("status"=>"success","editexpense"=>$edit);
				} else {
					$data = array("status"=>"error","msg"=>"failed to fetch record");
				}
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
		public function update(){
			if ($this->input->is_ajax_request()) {
				$data = $this->input->post();

				if ($this->em->update_entry($data)) {
					$data = array("status"=>"success","msg"=>"Update Successfully");
				} else {
					$data = array("status"=>"error","msg"=>"Failed to update income");
				}
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
		public function amount_validation(){
			if($this->input->is_ajax_request()) {
				$sid = $this->input->post('sid');
				if($data = $this->em->amount_validation($sid)){
					$data = array("status"=>"success","amount"=>$data);
				}else{
					$data = array("status"=>"fail","amount"=>"no storage available");
				}
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
	}
?>