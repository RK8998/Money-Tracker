<?php
	
	class My_Controller extends CI_Controller
	{
		function __construct(){
			parent::__construct();

			$this->load->model("admin/Admin_login_model","aml");
			$this->load->model("admin/Reg_mod","rm");
			$this->load->model("admin/Dashboard_mod","dm");
			$this->load->model('admin/Category_mod','cm');
			$this->load->model('admin/Income_mod','im');
			$this->load->model('admin/Expense_mod','em');
			$this->load->model('admin/Storage_mod','sm');
			$this->load->model('admin/Client_mod','clm');
			$this->load->model('admin/Loan_mod','lm');
			$this->load->model('admin/User_mod','usm');

			if(!$this->session->userdata('admin_session')){
				return redirect('admin/Admin_login');
			}
		}
	}
?>