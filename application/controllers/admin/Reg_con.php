<?php  
	
	class Reg_con extends CI_Controller
	{
		function __construct(){
	      parent::__construct();
	      $this->load->model("admin/Reg_mod","rm");
	    }
		public function index()
		{
			$this->load->view('admin/Reg');
		}
		public function send_otp(){
			if($this->input->is_ajax_request()){
				$data = $this->input->post();
				$to_email = $data['username'];
				$otp = rand(100000,999999);

		        $this->load->library('email');
		        $config['protocol']='smtp';
		        $config['smtp_host']='smtp.gmail.com';
		        $config['smtp_port']='465';
		        $config['smtp_timeout']='60';
		        $config['smtp_user']='moneytracker741@gmail.com';
		        $config['smtp_pass']='money@tracker';
		        
		        $config['smtp_crypto']='ssl';
		        $config['charset']='utf-8';
		        $config['newline']="\r\n";
		        $config['wordwrap'] = TRUE;
		        $config['mailtype'] = 'html';
		        
		        $this->email->initialize($config);

			    $this->email->from('moneytracker741@gmail.com','Money Tracker');
				$this->email->to($to_email);
				$this->email->subject('One Time Password');
				$this->email->message("<h2>".$otp."</h2><p style='color:red;'>Don't share otp to anyone..</p>");
				if(!$this->email->send()){
					echo json_encode($this->email->print_debugger());
				}else{
				$dt = array("status"=>"success","otp"=>$otp,"msg"=>"OTP Successfully Send On Your Email Address");
				}
				echo json_encode($dt);
			}else{
				$this->error();
			}
		}
		public function check_email(){
			$data = $this->input->post();
			if($this->rm->check_email($data)){
				$data = array("status"=>"success","msg"=>"");
			}else{
				$data = array("status"=>"fail","msg"=>"Email is already exist");
			}
			echo json_encode($data);
		}
		public function insert_reg(){
			if($this->input->is_ajax_request()){
				$data = $this->input->post();
				if($this->rm->insert($data)){
					$data = array("status"=>"success","msg"=>"Registered successfully");
				}else{
					$data = array("status"=>"fail","msg"=>"Registered Unsuccessfull");
				}
				echo json_encode($data);
			}else{
				$this->error();
			}
		}
	}
?>