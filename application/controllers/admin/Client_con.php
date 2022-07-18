<?php 
	
	class Client_con extends My_Controller
	{
		function index()
		{
			$this->load->view('admin/template/header');
            $this->load->view('admin/Client');
            $this->load->view('admin/template/footer');
		}
		public function error(){
			$this->load->view('admin/error');
		}
		function get_client()
		{
			$data=$this->clm->fetch_client();
			echo json_encode($data);
		}
		function insert_client()
		{
			if($this->input->is_ajax_request()){
				$data=$this->input->post();
				if($this->clm->check_client($data)){
					if($this->clm->add_client($data))
					{
						$data=array('status'=>'success','message'=>'Client Successfully added');
					}
					else
					{
						$data=array('status'=>'fail','message'=>'Not added');
					}
				}else{
					$data=array('status'=>'fail','message'=>'Client is alredy exist');
				}
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
		function del_client()
		{
			if($this->input->is_ajax_request()){
				$did=$this->input->post('did');
				if($user=$this->clm->delete($did))
				{
					$data=array('status'=>'Success','message'=>'Delete Successfully');
				}
				else
				{
					$data=array('status'=>'fail','message'=>'Not delete');
				}
				echo json_encode($data);	
			} else {
				$this->error();
			}
		}
		function edit_client()
		{
			if($this->input->is_ajax_request()){
				$eid=$this->input->post('eid');
				if($client=$this->clm->fetch_client($eid))
				{
					$data=array('status'=>'Success','client'=>$client);
				}
				else
				{
					$data=array('status'=>'fail','message'=>'Not delete');
				}
				echo json_encode($data);	
			} else {
				$this->error();
			}
		}
		function update_client()
		{
			if ($this->input->is_ajax_request()) {
				$data=$this->input->post();
				if($user=$this->clm->update($data))
				{
					$data=array('status'=>'Success','message'=>'Update Successfully');
				}
				else
				{
					$data=array('status'=>'fail','message'=>'Not update');
				}
				echo json_encode($data);
			} else {
				$this->error();
			}
		}
	}
?>