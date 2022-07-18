<?php
	class Storage_con extends My_Controller
	{
		public function index(){
			$data['storage'] = $this->sm->storage();
			// echo "<pre>"; print_r($data);
			$this->load->view('admin/template/header');
			$this->load->view('admin/Storage',$data);
			$this->load->view('admin/template/footer');
		}
		public function get_storage(){
			$data = $this->sm->storage_data();
			echo json_encode($data);
		}
		public function error(){
			$this->load->view('error');
		}
		public function insert_storage(){
			if($this->input->is_ajax_request()){		
				$data = $this->input->post();
				if($this->sm->insert($data)){
					$data = array("status"=>"success","msg"=>"Wallet successfuly Added");
				}else{
					$data = array("status"=>"fail","msg"=>"Wallet not Added");
				}
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
		public function delete_storage(){
			if($this->input->is_ajax_request()){
				$id = $this->input->post('did');
				if($this->sm->delete($id)){
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

				if($edit = $this->sm->edit_entry($id)) {
					$data = array("status"=>"success","editstorage"=>$edit);
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

					if ($this->sm->update_entry($data)) {
						$data = array("status"=>"success","msg"=>"Update Successfully");
					} else {
						$data = array("status"=>"error","msg"=>"Failed to update category");
					}
					echo json_encode($data);
			} else {
				$this->error();
			}
		}
		public function transaction_data_income(){
			$id = $this->input->post('sid');
			$data = $this->sm->transaction_income($id);
			echo json_encode($data);
		}
		public function transaction_data_expense(){
			$id = $this->input->post('sid');
			$data = $this->sm->transaction_expense($id);
			echo json_encode($data);
		}
	}
?>	