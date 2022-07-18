<?php

	class Dashboard_con extends My_Controller
	{
		public function index(){
			$this->load->view('admin/template/header');
			$this->load->view('admin/Dashboard');
			$this->load->view('admin/template/footer');
		}
		public function error(){
			$this->load->view('admin/error');
		}
		public function email_admin(){
			if($this->input->is_ajax_request()){
				$session = $this->session->userdata('admin_session');
				$username = $session[0]['username'];
				
				$data = $this->input->post();
				$msg = $data['msg'];
				$subject = "username : $username";

		        $this->load->library('email');
		        $config['protocol']='smtp';
		        $config['smtp_host']='smtp.gmail.com';
		        $config['smtp_port']='465';
		        $config['smtp_timeout']='30';
		        $config['smtp_user']='moneytracker741@gmail.com';
		        $config['smtp_pass']='money@tracker';
		        
		        $config['smtp_crypto']='ssl';
		        $config['charset']='utf-8';
		        $config['newline']="\r\n";
		        $config['wordwrap'] = TRUE;
		        $config['mailtype'] = 'html';
		        
		        $this->email->initialize($config);

			    $this->email->from('moneytracker741@gmail.com','From User');
				$this->email->to('moneytracker741@gmail.com');
				$this->email->subject($subject);
				$this->email->message($msg);
				if(!$this->email->send()){
					echo json_encode($this->email->print_debugger());
				}else{
					$dt = array("status"=>"success","msg"=>"Email Successfully Send To Admin");
				}
				echo json_encode($dt);
			}else{
				$this->error();
			}
		}
		public function user(){
			if($this->input->is_ajax_request()){
				if($user = $this->dm->user()){
					$data=array("status"=>"success","user"=>$user);
				}else{
					$data=array("status"=>"fail","user"=>"no user");
				}
				echo json_encode($data);	
			} else {
				$this->error();
			}	
		}
		public function user_active(){
			if($this->input->is_ajax_request()){
				if($act_user = $this->dm->user_active()){
					$data=array("status"=>"success","user"=>$act_user);
				}else{
					$data=array("status"=>"fail","user"=>"no active user");
				}
				echo json_encode($data);	
			} else {
				$this->error();
			}	
		}
		public function user_inactive(){
			if($this->input->is_ajax_request()){
				if($inact_user = $this->dm->user_inactive()){
					$data=array("status"=>"success","user"=>$inact_user);
				}else{
					$data=array("status"=>"fail","user"=>"no inactive user");
				}
				echo json_encode($data);	
			} else {
				$this->error();
			}	
		}
		public function category(){
			if($this->input->is_ajax_request()){
				if($cat = $this->dm->category()){
					$data=array("status"=>"success","cat"=>$cat);
				}else{
					$data=array("status"=>"fail","cat"=>"no category");
				}
				echo json_encode($data);	
			} else {
				$this->error();
			}	
		}
		public function category_active(){
			if($this->input->is_ajax_request()){
				if($act_cat = $this->dm->category_active()){
					$data=array("status"=>"success","cat"=>$act_cat);
				}else{
					$data=array("status"=>"fail","cat"=>"no active category");
				}
				echo json_encode($data);	
			} else {
				$this->error();
			}
		}
		public function category_inactive(){
			if($this->input->is_ajax_request()){
				if($inact_cat = $this->dm->category_inactive()){
					$data=array("status"=>"success","cat"=>$inact_cat);
				}else{
					$data=array("status"=>"fail","cat"=>"no active category");
				}
				echo json_encode($data);	
			} else {
				$this->error();
			}
			
		}
		public function income(){
			if($this->input->is_ajax_request()){
				if($inc = $this->dm->income()){
					$data=array("status"=>"success","inc"=>$inc);
				}else{
					$data=array("status"=>"fail","inc"=>"no income");
				}
				echo json_encode($data);	
			} else {
				$this->error();
			}
			
		}
		public function expense(){
			if($this->input->is_ajax_request()){
				if($exp = $this->dm->expense()){
					$data=array("status"=>"success","exp"=>$exp);
				}else{
					$data=array("status"=>"fail","exp"=>"no expense");
				}
				echo json_encode($data);	
			} else {
				$this->error();
			}
			
		}
		public function storage(){
			if($this->input->is_ajax_request()){
				if($str = $this->dm->storage()){
					$data=array("status"=>"success","str"=>$str);
				}else{
					$data=array("status"=>"fail","str"=>"no expense");
				}
				echo json_encode($data);	
			} else {
				$this->error();
			}
			
		}
		public function client(){
			if($this->input->is_ajax_request()){
				if($clt = $this->dm->client()){
					$data=array("status"=>"success","clt"=>$clt);
				}else{
					$data=array("status"=>"fail","clt"=>"no client");
				}
				echo json_encode($data);	
			} else {
				$this->error();
			}	
		}
		public function loan(){
			if($this->input->is_ajax_request()){
				if($ln = $this->dm->loan()){
					$data=array("status"=>"success","ln"=>$ln);
				}else{
					$data=array("status"=>"fail","ln"=>"no loan");
				}
				echo json_encode($data);	
			} else {
				$this->error();
			}	
		}
		public function close_loan(){
			if($this->input->is_ajax_request()){
				if($cl = $this->dm->close_loan()){
					$data=array("status"=>"success","cl"=>$cl);
				}else{
					$data=array("status"=>"fail","cl"=>"no loan");
				}
				echo json_encode($data);	
			} else {
				$this->error();
			}	
		}
	}
?>