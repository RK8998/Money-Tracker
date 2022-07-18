<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('Assets/css/style.css');?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('Assets/css/bootstrap.min.css');?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">

<style type="text/css">
	textarea{
	  resize: none;
	}
	#msg_box{
		border-radius: 10px;
		border:2px solid #92a8d1;
	}
	.gradient-admin{
	  background: #6a11cb;
	  background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 0.5), rgba(37, 117, 252, 0.5));
	  background: linear-gradient(to right, rgba(106, 17, 203, 0.5), rgba(37, 117, 252, 0.5))
	}
	.gradient-category{
	  background: #6a85b6;
	  background: -webkit-linear-gradient(to right, rgba(106, 133, 182, 0.5), rgba(186, 200, 224, 0.5));
	  background: linear-gradient(to right, rgba(106, 133, 182, 0.5), rgba(186, 200, 224, 0.5))
	}
	.gradient-income{
	  background: #d4fc79;
	  background: -webkit-linear-gradient(to right, rgba(212, 252, 121, 0.5), rgba(150, 230, 161, 0.5));
	  background: linear-gradient(to right, rgba(212, 252, 121, 0.5), rgba(150, 230, 161, 0.5))
	}
	.gradient-expense{
	  background: #f093fb;
	  background: -webkit-linear-gradient(to right, rgba(240, 147, 251, 0.5), rgba(245, 87, 108, 0.5));
	  background: linear-gradient(to right, rgba(240, 147, 251, 0.5), rgba(245, 87, 108, 0.5))
	}
	.gradient-wallet{
	  background: #a1c4fd;
	  background: -webkit-linear-gradient(to right, rgba(161, 196, 253, 0.5), rgba(194, 233, 251, 0.5));
	  background: linear-gradient(to right, rgba(161, 196, 253, 0.5), rgba(194, 233, 251, 0.5))
	}
	.gradient-client{
	  background: #fa709a;
	  background: -webkit-linear-gradient(to right, rgba(250, 112, 154, 0.5), rgba(254, 225, 64, 0.5));
	  background: linear-gradient(to right, rgba(250, 112, 154, 0.5), rgba(254, 225, 64, 0.5))
	}
	.gradient-loan{
	 background: #c471f5;
  	 background: -webkit-linear-gradient(to right, rgba(196, 113, 245, 0.5), rgba(250, 113, 205, 0.5));
  	 background: linear-gradient(to right, rgba(196, 113, 245, 0.5), rgba(250, 113, 205, 0.5))
	}
	.card:hover{
		cursor: pointer;
	}
</style>


</head>
<body>
	<?php  
      $session = $this->session->userdata('admin_session');
      if($session[0]['status'] == "inactive"){
        echo "<br><h2 style='color:red;'>Your Account is Inactived By Admin</h2><br>";
        echo "
    		<div class='row'>
    			<form id='email_form'>
    			<div class='col-6' id='msg_div'>
    			<h3 id='msg_title'>Message to admin...</h3><br>
    				<textarea class='form-control' rows='4' cols='50' name='msg_box' id='msg_box' placeholder=' Write Message Here...'></textarea><br>
    				<a href='#' class='btn btn-primary' id='msg_btn'>
    				<i class='fab fa-telegram-plane'>&nbsp;&nbsp;</i>SEND MESSAGE</a>	
    			</div>
    			</form>
    		</div>
        ";
      }else{
	?>
	<br><h1>Dashboard</h1><br>

		<?php 
			$session = $this->session->userdata('admin_session');
			if($session[0]['type'] == 1){
				echo "
				<div class='gradient-admin card text-white bg-secondary mb-3' style='max-width: 20rem; height: 180px;border-radius: 20px;'>
				  <div class='card-header'><b>Users</b>
				<i class='fas fa-circle-notch' style='float: right; font-size: 20px; margin-top: 5px;'></i>
				  </div><hr>
				  <div class='card-body' id='user_body'>
				    <h5 id='tot_user' style='text-align: center;'></h5>
				    <h6 id='tot_act_user' style='text-align: center;'></h6>
				    <h6 id='tot_inact_user' style='text-align: center;'></h6>
				  </div>
				</div>		
				";
			}else{

		?>
	<div class="row">
		<div class="col-md-4">
			<div class="gradient-category card text-white bg-secondary mb-3" style="max-width: 20rem; height: 180px;border-radius: 20px;">
			  <div class="card-header"><b>Category</b>
			  	<i class="fas fa-circle-notch" style="float: right; font-size: 20px; margin-top: 5px;"></i>
			  </div><hr>	
			  <div class="card-body" id="category_body">
			    <h5 id="tot_cat" style="text-align: center;"></h5>
			    <h6 id="tot_act_cat" style="text-align: center;"></h6>
			    <h6 id="tot_inact_cat" style="text-align: center;"></h6>
			  </div>
			</div>		
		</div>
		<div class="col-md-4">
			<div class="gradient-income card text-white bg-success mb-3" style="max-width: 20rem; height: 180px;
			border-radius: 20px;">
			  <div class="card-header"><b>Income</b>
			  	<i class="fas fa-circle-notch" style="float: right; font-size: 20px; margin-top: 5px;"></i>
			  </div><hr>
			  <div class="card-body" id="income_body"><br>
			    <h5 id="tot_inc" style="text-align: center;"></h5>
			  </div>
			</div>		
		</div>
		<div class="col-md-4">
			<div class="gradient-expense card text-white bg-danger mb-3" style="max-width: 20rem; height: 180px;border-radius: 20px;">
			  <div class="card-header"><b>Expense</b>
			  	<i class="fas fa-circle-notch" style="float: right; font-size: 20px; margin-top: 5px;"></i>
			  </div><hr>
			  <div class="card-body" id="expense_body"><br>
			    <h5 id="tot_exp" style="text-align: center;"></h5>
			  </div>
			</div>		
		</div>
	</div><br><br>
	<div class="row">
		<div class="col-md-4">
			<div class="gradient-wallet card text-white bg-primary mb-3" style="max-width: 20rem; height: 180px; border-radius: 20px;">
			  <div class="card-header"><b>Wallet</b>
			  	<i class="fas fa-circle-notch" style="float: right; font-size: 20px; margin-top: 5px;"></i>
			  </div><hr>
			  <div class="card-body" id="storage_body"><br>
			    <h5 id="tot_str" style="text-align: center;"></h5>
			  </div>
			</div>		
		</div>
		<div class="col-md-4">
			<div class="gradient-client card text-white bg-warning mb-3" style="max-width: 20rem; height: 180px; border-radius: 20px;">
			  <div class="card-header"><b>Client</b>
			  	<i class="fas fa-circle-notch" style="float: right; font-size: 20px; margin-top: 5px;"></i>
			  </div><hr>
			  <div class="card-body" id="client_body"><br>
			    <h5 id="tot_clt" style="text-align: center;"></h5>
			  </div>
			</div>		
		</div>
		<div class="col-md-4">
			<div class="gradient-loan card text-white bg-primary mb-3" style="max-width: 20rem; height: 180px; border-radius: 20px;">
			  <div class="card-header"><b>Loan</b>
			  	<i class="fas fa-circle-notch" style="float: right; font-size: 20px;"></i>
			  </div><hr>
			  <div class="card-body" id="loan_body">
			    <h5 id="tot_ln" style="text-align: center;"></h5>
			    <h5 id="tot_cl" style="text-align: center;"></h5>
			  </div>
			</div>		
		</div>
	</div>

	<?php 
			}
		} 
	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<script>
		$(document).on("click","#msg_btn",function(){
			var msg = $('#msg_box').val();
			$.ajax({
				url:"<?= base_url('admin/Dashboard_con/email_admin'); ?>",
				type:"post",
				dataType:"json",
				data:{
					msg:msg
				},
				success:function(data){
					console.log(data);
					if(data.status == "success"){
						toastr["success"](data.msg);
						// window.location.href="<?= base_url('admin/Dashboard_con'); ?>";
						 $('#email_form')[0].reset();
					}else{
						toastr["error"](data.msg);
					}
				}
			});
		});
		$(document).ready(function(){
			toastr.options = {
			  "closeButton": false,
			  "debug": false,
			  "newestOnTop": false,
			  "progressBar": true,
			  "positionClass": "toast-top-center",
			  "preventDuplicates": false,
			  "onclick": null,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			}
				$.ajax({
					url:"<?= base_url('admin/Dashboard_con/user'); ?>",
					type:"post",
					dataType:"json",
					success:function(data){
						console.log(data);
						if(data.status == "success"){
							$('#tot_user').show();
							var tot_user = data.user.total_user;
							document.getElementById("tot_user").innerHTML = "Total User : "+tot_user;
						}else{
							toastr["error"](data.msg);
						}
					}
				});
				$.ajax({
					url:"<?= base_url('admin/Dashboard_con/user_active'); ?>",
					type:"post",
					dataType:"json",
					success:function(data){
						console.log(data);
						if(data.status == "success"){
							$('#tot_act_user').show();
							var tot_act_user = data.user.total_act_user;
						document.getElementById("tot_act_user").innerHTML = "Active User : "+tot_act_user;
						}else{
							toastr["error"](data.msg);
						}
					}
				});
				$.ajax({
					url:"<?= base_url('admin/Dashboard_con/user_inactive'); ?>",
					type:"post",
					dataType:"json",
					success:function(data){
						console.log(data);
						if(data.status == "success"){
							$('#tot_inact_user').show();
							var tot_inact_user = data.user.total_inact_user;
					document.getElementById("tot_inact_user").innerHTML = "Inactive User : "+tot_inact_user;
						}else{
							toastr["error"](data.msg);
						}
					}
				});
				$.ajax({
					url:"<?= base_url('admin/Dashboard_con/category'); ?>",
					type:"post",
					dataType:"json",
					success:function(data){
						console.log(data);
						if(data.status == "success"){
							$('#btn_cat').hide();
							$('#tot_cat').show();
							var tot_cat = data.cat.total_category;
							document.getElementById("tot_cat").innerHTML = "Total Category : "+tot_cat;
						}else{
							toastr["error"](data.msg);
						}
					}
				});	
				$.ajax({
					url:"<?= base_url('admin/Dashboard_con/category_active'); ?>",
					type:"post",
					dataType:"json",
					success:function(data){
						console.log(data);
						if(data.status == "success"){
							$('#tot_act_cat').show();
							var tot_act_cat = data.cat.total_active_category;
				document.getElementById("tot_act_cat").innerHTML = "Active Category : "+tot_act_cat;
						}else{
							toastr["error"](data.msg);
						}
					}
				});		
				$.ajax({
					url:"<?= base_url('admin/Dashboard_con/category_inactive'); ?>",
					type:"post",
					dataType:"json",
					success:function(data){
						console.log(data);
						if(data.status == "success"){
							$('#tot_inact_cat').show();
							var tot_inact_cat = data.cat.total_inactive_category;
				document.getElementById("tot_inact_cat").innerHTML = "Inactive Category : "+tot_inact_cat;
						}else{
							toastr["error"](data.msg);
						}
					}
				});	
				$.ajax({
					url:"<?= base_url('admin/Dashboard_con/income'); ?>",
					type:"post",
					dataType:"json",
					success:function(data){
						console.log(data);
						if(data.status == "success"){
							$('#btn_inc').hide();
							$('#tot_inc').show();
							var tot_inc = data.inc.total_income;
							document.getElementById("tot_inc").innerHTML = "Total income : "+tot_inc;
						}else{
							toastr["error"](data.msg);
						}
					}
				});		
				$.ajax({
					url:"<?= base_url('admin/Dashboard_con/expense'); ?>",
					type:"post",
					dataType:"json",
					success:function(data){
						console.log(data);
						if(data.status == "success"){
							$('#btn_exp').hide();
							$('#tot_exp').show();
							var tot_exp = data.exp.total_expense;
							document.getElementById("tot_exp").innerHTML = "Total expense : "+tot_exp;
						}else{
							toastr["error"](data.msg);
						}
					}
				});		
				$.ajax({
					url:"<?= base_url('admin/Dashboard_con/storage'); ?>",
					type:"post",
					dataType:"json",
					success:function(data){
						console.log(data);
						if(data.status == "success"){
							$('#btn_str').hide();
							$('#tot_str').show();
							var tot_str = data.str.total_storage;
							document.getElementById("tot_str").innerHTML = "Total wallet : "+tot_str;
						}else{
							toastr["error"](data.msg);
						}
					}
				});		
				$.ajax({
					url:"<?= base_url('admin/Dashboard_con/client'); ?>",
					type:"post",
					dataType:"json",
					success:function(data){
						console.log(data);
						if(data.status == "success"){
							$('#btn_clt').hide();
							$('#tot_clt').show();
							var tot_clt = data.clt.total_client;
							document.getElementById("tot_clt").innerHTML = "Total client : "+tot_clt;
						}else{
							toastr["error"](data.msg);
						}
					}
				});		
				$.ajax({
					url:"<?= base_url('admin/Dashboard_con/loan'); ?>",
					type:"post",
					dataType:"json",
					success:function(data){
						console.log(data);
						if(data.status == "success"){
							$('#btn_ln').hide();
							$('#tot_ln').show();
							var tot_ln = data.ln.total_loan;
							document.getElementById("tot_ln").innerHTML = "Active Loan : "+tot_ln;
						}else{
							toastr["error"](data.msg);
						}
					}
				});		
				$.ajax({
					url:"<?= base_url('admin/Dashboard_con/close_loan'); ?>",
					type:"post",
					dataType:"json",
					success:function(data){
						console.log(data);
						if(data.status == "success"){
							$('#btn_ln').hide();
							$('#tot_ln').show();
							var tot_cl = data.cl.total_close_loan;
							document.getElementById("tot_cl").innerHTML = "Closed Loan : "+tot_cl;
						}else{
							toastr["error"](data.msg);
						}
					}
				});		
		});
	</script>


	<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>
</html>

