<?php
	class Loan_mod extends CI_model
	{
		public function loan_data(){
			$dt = $this->db->get('loan');
			$r = $dt->num_rows();
			$data = $dt->result_array();

			for($i=0;$i<$r;$i++){
				$lid = $data[$i]['lid'];
				$amount = $data[$i]['amount'];
				$date = $data[$i]['date'];
				$int_per = $data[$i]['int_per'];
				$duration = $data[$i]['duration'];
				$int_type = $data[$i]['int_type'];
				$return_date = $data[$i]['return_date'];

				if($int_type == "Simple"){
					$return_dt = date("Y-m-d");
					if($duration == "monthly"){
						$datetime1 = date_create($date);
						$datetime2 = date_create($return_dt);
						$diff = date_diff($datetime1, $datetime2);
    					
						$days = $diff->d;
    					$months = $diff->y * 12 + $diff->m + $diff->d / 30;

    					$total_per = $int_per * $months;
    					$close_amount = $amount + ($amount * $total_per / 100);
    					
    					$q = "update loan set close_amount = $close_amount where lid = $lid";
    					$this->db->query($q);
					}
					else{
						$datetime1 = date_create($date);
						$datetime2 = date_create($return_date);
						$diff = date_diff($datetime1, $datetime2);
    					
    					$months = $diff->y * 12 + $diff->m + $diff->d / 30;						
    					$monthly_int = $int_per / 12;
    					$total_per = $monthly_int * $months;

						$close_amount = $amount + ($amount * $total_per / 100);
						
						$q = "update loan set close_amount = $close_amount where lid = $lid";
    					$this->db->query($q);	
					}
				}else{
					if($duration == "monthly"){
						$datetime1 = date_create($date);
						$datetime2 = date_create($return_date);
						$diff = date_diff($datetime1, $datetime2);
    					
						$days = $diff->d;
    					$months = $diff->y * 12 + $diff->m + $diff->d / 30;

    					for($i=1;$i<=$months;$i++){
    						$amount = $amount + ($amount * $int_per / 100);	
    					}
    					// $total_per = $int_per * $months;
    					$close_amount = $amount;
    					
    					$q = "update loan set close_amount = $close_amount where lid = $lid";
    					$this->db->query($q);
					}else{
						$datetime1 = date_create($date);
						$datetime2 = date_create($return_date);
						$diff = date_diff($datetime1, $datetime2);
    					
    					$months = $diff->y * 12 + $diff->m + $diff->d / 30;
    					$year = $months / 12;
    					for($j=1;$j<=$year;$j++){
    						$amount = $amount + ($amount * $int_per / 100);	
    					}
    					// $total_per = $int_per * $months;
    					$close_amount = $amount;
    					
    					$q = "update loan set close_amount = $close_amount where lid = $lid";
    					$this->db->query($q);
					}
				}
			}

			$loan = $this->session->userdata('admin_session');
			$u_id = $loan[0]['u_id'];
			$dt = $this->db->where('u_id',$u_id)->get('loan');
			return $data = $dt->result_array();
		}
		
		public function match_user($data){
			$loan = $this->session->userdata('admin_session');
			$u_id = $loan[0]['u_id'];
			$key = $data['name'];
			$data = $this->db->select('name')->from('client')->where('u_id',$u_id)->where("name LIKE '$key%'")->get();
			return $data = $data->result();
		}
		public function insert($data){
			$cid = $data['cid'];
			$name = $data['data']['name']; 
			$amount = $data['data']['amount']; 
			$date = $data['data']['date']; 
			$int_per = $data['data']['int_per']; 
			$duration = $data['data']['duration']; 
			$int_type = $data['data']['int_type']; 
			$return_date = $data['data']['return_date']; 
			$storage = $data['data']['storage'];
			$close_amount = $data['close_amount'];

			$loan = $this->session->userdata('admin_session');
			$u_id = $loan[0]['u_id'];

			$data = array(
			 'cid' => $cid,
			 'name' => $name,
			 'amount' => $amount,
			 'date' => $date,
			 'int_per' => $int_per,
			 'duration' => $duration,
			 'int_type' => $int_type,
			 'return_date' => $return_date,
			 'storage' => $storage,
			 'close_amount' => $close_amount,
			 'u_id' => $u_id
			);

			$q = "update storage set amount = amount - $amount where sid = $storage";
			$this->db->query($q);
			return $this->db->insert('loan',$data);
		}
		public function delete($id){
			return $this->db->where('lid',$id)->delete('loan');
		}
		public function close_entry($id){
			$data = $this->db->where('lid',$id)->get('loan');
			return $data->row();
		}
		public function close_deal($data){
			$lid = $data['lid'];
			$close_id = $data['lid'];
			$cid = $data['cid'];
			$name = $data['name']; 
			$amount = $data['amount']; 
			$date = $data['date']; 
			$int_per = $data['int_per']; 
			$duration = $data['duration']; 
			$int_type = $data['int_type']; 
			$return_date = $data['return_date']; 
			$storage = $data['storage'];
			$close_amount = $data['close_amount'];

			$loan = $this->session->userdata('admin_session');
			$u_id = $loan[0]['u_id'];

			$dt = array(
			 'close_id' => $close_id, 
			 'cid' => $cid,
			 'name' => $name,
			 'amount' => $amount,
			 'date' => $date,
			 'int_per' => $int_per,
			 'duration' => $duration,
			 'int_type' => $int_type,
			 'return_date' => $return_date,
			 'storage' => $storage,
			 'close_amount' => $close_amount,
			 'u_id'=>$u_id
			);
			
			$this->db->insert('close_deal',$dt);
			$q = "update storage set amount = amount + $close_amount where sid = $storage";
			$this->db->query($q);
			return $this->db->where('lid',$lid)->delete('loan');
			// echo json_encode($dt);
		}
		public function close_deal_data(){
			$loan = $this->session->userdata('admin_session');
			$u_id = $loan[0]['u_id'];
			$data = $this->db->where('u_id',$u_id)->get('close_deal');
			return $r = $data->result_array();	
		}
		public function delete_deal($id){
			return $this->db->where('close_id',$id)->delete('close_deal');
		}
		public function client_data($data){
			$data = $this->db->where('name',$data['name'])->get('client');
			return $data->result_array();
		}
		public function check_cliet($data){
			$clt = $this->session->userdata('admin_session');
			$u_id = $clt[0]['u_id'];
			$res = $this->db->where('u_id',$u_id)->where('name',$data['name'])->get('client');
			$r = $res->num_rows();
			if($r == 1){
				return true;
			}else{
				return false;
			}
		}
	}
?>