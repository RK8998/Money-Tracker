<?php
class Admin_login extends CI_controller
{
    function __construct(){
      parent::__construct();
      $this->load->model("admin/Admin_login_model","aml");
    }
    public function index()
    {
      $this->load->view('admin/Admin_login_view');
    }
    public function error(){
      $this->load->view('admin/error');
    }
    public function admin_varification()
    {
        if($this->input->is_ajax_request()){
          $data=$this->input->post();
         
          if($ses=$this->aml->login($data)){
              // $data = $this->aml->login_data($data);
              $this->session->set_userdata('admin_session',$ses);
              $data = array("status"=>"success","msg"=>"Login successfully");
              echo json_encode($data);
          }else{
              $data = array("status"=>"fail","msg"=>"Username or password Invalid");
              echo json_encode($data);
          }
        }else{
          $this->error();
        }      
    }
    public function logout(){
      $this->session->sess_destroy();
      return redirect('admin/Admin_login');
    }
    public function for_send_otp(){
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
            $this->email->subject('Forgot Password');
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
    public function forget_pass(){
      $data = $this->input->post();
      if($this->aml->forget_pass($data)){
        $data = array("status"=>"success","msg"=>"Password Successfully Forgeted ");
      }else{
        $data = array("status"=>"fail","msg"=>"Password Not Seted");
      }
      echo json_encode($data);
    }
    public function delete_account(){
      $data = $this->session->userdata('admin_session');
      $u_id = $data[0]['u_id'];
      $email = $data[0]['username'];
      if($this->aml->delete_account($u_id)){
        $data = array("status"=>"success","msg"=>"Account Successfully Deleted");
      }else{
        $data = array("status"=>"fail","msg"=>"Account Not Deleted"); 
      }
      echo json_encode($data);
    }
    public function check_email(){
      $data = $this->input->post();
      if($this->aml->check_email($data)){
        $data = array("status"=>"success","msg"=>"");
      }else{
        $data = array("status"=>"fail","msg"=>"Email is not exist");
      }
      echo json_encode($data);
    }
}
?>