<?php

	class Category_con extends My_Controller
	{
		public function index(){
			$this->load->view('admin/template/header');
			$this->load->view('admin/Category');
			$this->load->view('admin/template/footer');
		}
		public function error(){
			$this->load->view('admin/error');
		}
		public function get_cat(){
			if($this->input->is_ajax_request()){
				$data = $this->cm->cat_data();
				
				echo json_encode($data);
			}else{
				$this->error();
			}
		}
		public function insert_cat(){
			if($this->input->is_ajax_request()){		
				$data = $this->input->post();
				if($this->cm->insert($data)){
					$data = array("status"=>"success","msg"=>"Category successfuly created");
				}else{
					$data = array("status"=>"fail","msg"=>"Category not create");
				}	
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
		public function delete_cat(){
			if($this->input->is_ajax_request()){
				$id = $this->input->post('did');
				if($this->cm->delete($id)){
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

				if($edit = $this->cm->edit_entry($id)) {
					$data = array("response"=>"success","editcat"=>$edit);
				} else {
					$data = array("response"=>"error","msg"=>"failed to fetch record");
				}
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
		public function update(){
			if ($this->input->is_ajax_request()) {
					$data = $this->input->post();

					if ($this->cm->update_entry($data)) {
						$data = array("status"=>"success","msg"=>"Update Successfully");
					} else {
						$data = array("status"=>"error","msg"=>"Failed to update category");
					}
					echo json_encode($data);
			} else {
				$this->error();
			}
		}
	}
?>