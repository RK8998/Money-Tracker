<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>header</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('Assets/css/bootstrap.min.css');?>">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <style type="text/css">
    #user{
      cursor: pointer;
      color: white;
      font-size: 30px;
      margin-right: 20px;
      border: 3px solid white;
      padding: 5px;
      border-radius: 100%;
    }
    #user:hover{
      color: gray;
    }
    #userModal{
      box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }
    .active{
      border: 1px solid black;
      width: 100px;
      padding: 3px;
      padding-left: 15px;
      padding-right: 15px;
      background-color: green;
      color: white;
      border-radius: 20px;
    }
    .inactive{
      border: 1px solid black;
      width: 100px;
      padding: 3px;
      padding-left: 15px;
      padding-right: 15px;
      background-color: red;
      color: white;
      border-radius: 20px;
    }
  </style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">MONEY TRACKER</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/Dashboard_con');?>">Dashboard
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <?php
          $session = $this->session->userdata('admin_session');
          if($session[0]['type'] == 1){
            echo "<a class='nav-link' href='".base_url('admin/User_con')."'>Users</a>";
            // echo "<span class='sr-only'>(current)</span>";
          }
          else if($session[0]['status'] == 'active'){
        ?> 
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/Category_con/');?>">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/Income_con/');?>">Income</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/Expense_con/');?>">Expense</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/Storage_con/');?>">Storage</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/Client_con/');?>">Client</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/Loan_con/');?>">Loan</a>
      </li>
      <?php } ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <?php
          $data = $this->session->userdata('admin_session');
          $email = $data[0]['username'];
          $user = strstr($email, '@', true);
          echo "<i id='user' data-toggle='modal' data-target='#userModal' class='fas fa-user-tie'></i>";
        ?>
        &nbsp;&nbsp;&nbsp;&nbsp;
      <a class="btn btn-danger" href="<?= base_url('admin/Admin_login/logout');?>"><b>LOGOUT</b></a>
    </form>
  </div>
</nav>
<div class="container">

  <?php
    $data = $this->session->userdata('admin_session');
    $email = $data[0]['username'];
    $pass = $data[0]['password'];
    // $p = substr_replace($pass ,"*",0);
    $type = $data[0]['type'];
    $status = $data[0]['status'];
    $user = strstr($email, '@', true);
    
  ?>
  <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" id="mdl1" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background:#203647;color: whitesmoke;">
            <h5 class="modal-title"  id="exampleModalLabel">Welcome <?php echo $user; ?></h5>
            <button type="button" style="color:white;" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="">
              <b>Username </b><br><br>
              <p style="color:gray;text-align:left;font-size: 18px;"><?php echo $email; ?></p>
            </div><hr>
            <div class="">
              <b>Passowrd </b><br>
              <p style="color:gray;text-align:left;font-size: 18px;"><?php echo $pass; ?></p>
            </div><hr>
            <div class="">
            <?php
              if($status == "active"){
                echo "<span class='active'>Active</span>";
              }else{
                echo "<span class='inactive'>Inactive</span>";
              }
            ?>
            
            </div>
          </div>

          <div class="modal-footer">
            <?php 
              if($type == 2){
                echo "<a href='#' class='btn btn-danger' style='float: right;' id='del_acc'>Delete Account</a>";  
              }
            ?>
            
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <script>
      $(document).on("click","#del_acc",function(){
        var temp = confirm('Are You Sure ?');
        if(temp == true){
          $.ajax({
            url:"<?= base_url('admin/Admin_login/delete_account'); ?>",
            type:"post",
            dataType:"json",
            success:function(data){
              console.log(data);
              if(data.status == "success"){
                toastr["success"](data.msg);
                window.location.href="<?= base_url('admin/Admin_login'); ?>";
              }else{
                toastr["error"](data.msg);
              }
            }
          });   
        }
      });
  </script>  
  