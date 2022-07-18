<!DOCTYPE html>
<html>
<title>Money Tracker</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">s
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('./Assets/css/style.css');?>"> -->
<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('Assets/css/bootstrap.min.css');?>"> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<style>

.sidenav {
  height: 100%;
  width: 16%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}
.sidenav a{
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}
.sidenav h3 {
  color: #818181;
}
.sidenav a:hover {
  color: #f1f1f1;
  text-decoration: none;
}
#logout{
  float: right;
  margin-top: 7px;
}
#main {
  font-size: 32px;
  background-color: #111;
}
.lbl{
  color: white;
}
</style>
<body>

<div class="sidenav">
  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menu</h3><br>
  <a href="<?= base_url('admin/Dashboard_con/');?>">Dashboard</a>
  <span class="sr-only">(current)</span>
  <?php
    $session = $this->session->userdata('admin_session');
    if($session[0]['type'] == 1){
      echo "<a class='nav-link' href='".base_url('admin/User_con')."'>Users</a>";
      // echo "<span class='sr-only'>(current)</span>";
    }
    else if($session[0]['status'] == 'active'){
  ?>
  <a href="<?= base_url('admin/Category_con/');?>">Category</a>
  <a href="<?= base_url('admin/Income_con/');?>">Income</a>
  <a href="<?= base_url('admin/Expense_con/');?>">Expense</a>
  <a href="<?= base_url('admin/Storage_con/');?>">Storage</a>
  <a href="<?= base_url('admin/Client_con/');?>">Client</a>
  <a href="<?= base_url('admin/Loan_con/');?>">Loan</a>

  <?php } ?>
  <br><br><br><br><br><br><br><br><br><br>
  <?php
    $data = $this->session->userdata('admin_session');
    $email = $data[0]['username'];
    $user = strstr($email, '@', true);
    // echo "<h4 class='wel_usr'>Welcome <br> $user</h4>"
  ?>
</div>

<!-- Page Content -->
<div style="margin-left:16%">
  <div class="w3-container" id="main">
    <label class="lbl">MONEY TRACKER</label>
  <a class="btn btn-danger" id="logout" href="<?= base_url('admin/Admin_login/logout');?>"><b>LOGOUT</b></a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
   

<div class="w3-container">