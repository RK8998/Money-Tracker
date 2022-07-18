<?php 
	class User_con extends My_Controller
	{
		public function index(){
			$this->load->view('admin/template/header');
			$this->load->view('admin/User');
			$this->load->view('admin/template/footer');
		}
		public function error(){
			$this->load->view('admin/error');
		}
		public function get_user(){
			if($this->input->is_ajax_request()){
				$data = $this->usm->user_data();
				echo json_encode($data);
			}else{
				$this->error();
			}
		}
		public function delete_user(){
			if($this->input->is_ajax_request()){
				$id = $this->input->post('did');
				if($this->usm->delete($id)){
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

				if($edit = $this->usm->edit_entry($id)) {
					$data = array("response"=>"success","edituser"=>$edit);
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
					if ($this->usm->update_entry($data)) {
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