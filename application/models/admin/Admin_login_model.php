<?php

    class Admin_login_model extends CI_Model
    {
        public function login($data)
        {
            $username=$data['username'];
            $password=$data['password'];
            $data = $this->db->where('username',$username)->where('password',$password)->get('login');
            if($data->num_rows() == 1){  
	            return $data->result_array();  
	        }else {  
	            return false;  
	        }  
        }
        public function forget_pass($data){
            $username = $data['email'];
            $password = $data['password'];
            $q = "update login set password = '$password' where username = '$username'";
            $res = $this->db->query($q);
            return $res;
        }
        public function delete_account($u_id){
            return $this->db->where('u_id',$u_id)->delete('login');
        }
        public function check_email($data){
            $username = $data['username'];
            $res = $this->db->select('*')->from('login')->where('username',$username)->get();
            // $res = $res->result_array();
            $cnt = $res->num_rows();
            if($cnt >= 1){
                return true;
            }else{
                return false;
            }
        }
    }
?>