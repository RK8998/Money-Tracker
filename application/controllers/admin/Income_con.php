<?php
	class Income_con extends My_Controller
	{
		public function index(){
			$data['cat'] = $this->im->category();
			$data['storage'] = $this->sm->storage();
			$this->load->view('admin/template/header');
			$this->load->view('admin/Income',$data);
			$this->load->view('admin/template/footer');
		}
		public function error(){
			$this->load->view('admin/error');
		}
		public function get_income(){
			if($this->input->is_ajax_request()){
				$data = $this->im->income_data();
				 echo json_encode($data);
			}else{
				$this->error();
			}
		}
		public function insert_income(){
			if($this->input->is_ajax_request()){		
				$data = $this->input->post();
				$sname = $this->im->storage_name($data);
				$dt = array("data"=>$data,"sname"=>$sname[0]['sname']);
				// $this->im->insert($dt);
				if($this->im->insert($dt)){
					$data = array("status"=>"success","msg"=>"Income successfuly added");
				}else{
					$data = array("status"=>"fail","msg"=>"Income not added");
				}	
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
		public function delete_income(){
			if($this->input->is_ajax_request()){
				$id = $this->input->post('did');
				$dt = $this->im->income_data($id);
				if($this->im->delete($dt)){
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

				if($edit = $this->im->edit_entry($id)){
					$dt = $this->im->income_data($id);
					$this->im->storage_edit($dt);	
					$data = array("status"=>"success","editincome"=>$edit);
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

				if ($this->im->update_entry($data)) {
					$data = array("status"=>"success","msg"=>"Update Successfully");
				} else {
					$data = array("status"=>"error","msg"=>"Failed to update income");
				}
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
	}
?>