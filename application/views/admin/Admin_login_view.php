<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
<link rel="stylesheet" type="text/css" href="<?= base_url('./Assets/css/bootstrap.min.css'); ?>">
<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('Assets/css/style.css');?>"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
    *{
      margin: 0px 0px;
      padding: 0px 0px;
    }
    body{
      background: linear-gradient(90deg, #EEFBFB 50%, #203647 50%);
    }
    .login_box{
      background-color: white;
      padding: 10px;
      width: 500px;
      height: 400px;
      text-align: center;
      margin-left: 100px;
      margin-top: 70px;
      padding-top: 15px;
      box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
    }
    .forget_box{
      background-color: white;
      padding: 10px;
      width: 500px;
      height: 350px;
      text-align: center;
      margin-left: 100px;
      margin-top: 70px;
      padding-top: 15px;
      box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
    }
    .btn_in{
      text-decoration: none;
      font-size: 25px;
      font-weight: bold;
      font-family: Georgia, serif;
      color: #203647;
      text-decoration: underline;
      transition: 0.5s;
    }
    .title_for{
      text-decoration: none;
      font-size: 25px;
      font-weight: bold;
      font-family: Georgia, serif;
      color: #203647;
      text-decoration: underline;
      transition: 0.5s;
    }
    .btn_in:hover, .btn_in:focus{
      outline: none;
      text-decoration: none;
      text-decoration: underline;
      color: #203647;
    }
    .btn_up{
      text-decoration: none;
      font-size: 25px;
      font-weight: bold;
      font-family: Georgia, serif;
      color: #808080;
      transition: 0.5s;
    }
    .btn_up:hover, .btn_up:focus{
      outline: none;
      text-decoration: none;
      color: #808080;
    }
    input{
      text-align: center;
    }
    ::-webkit-input-placeholder {
      text-align: center;
    }
    :-moz-placeholder {
      text-align: center;
    }
    input[type=email]{
      width: 350px; 
      margin-left: 50px;
      border-radius: 50px;
    }
    input[type=password]{
      width: 350px; 
      margin-left: 50px;
      border-radius: 50px;
    }
    #signin{
      margin-left: 135px;
      width: 200px;
      /*border-radius: 50px;*/
    }
    #sub_for{
      margin-left: 135px;
      width: 200px;
      /*border-radius: 50px;*/
    }
    #close{
      margin-left: 20px;
      width: 200px;
      /*border-radius: 50px;*/
    }
    hr{ 
      display: block;
      margin-top: 0.5em;
      margin-bottom: 0.5em;
      margin-left: auto;
      margin-right: auto;
      border-style: inset;
      border-width: 1px;
    } 
    /*.................otp style......................*/
    .otp_box{
      background-color: white;
      padding: 10px;
      width: 500px;
      height:250px;
      text-align: center;
      margin-left: 100px;
      margin-top: 70px;
      padding-top: 40px;
      text-align: center;
      box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
    }
    input[type=text]{
      width: 350px; 
      margin-left: 50px;
      border-radius: 50px;
    }
    #btn_otp{
      margin-left: 135px;
      width: 200px;
      /*border-radius: 50px;*/
    }
      /*..............set password style............*/
    .pass_box{
      background-color: white;
      padding: 10px;
      width: 500px;
      height:320px;
      text-align: center;
      margin-left: 100px;
      margin-top: 70px;
      padding-top: 40px;
      text-align: center;
      box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
    }
    #btn_pass{
      margin-left: 135px;
      width: 200px;
      /*border-radius: 50px;*/
    }
    </style>
  </head>
  <body>
      <br><br>
      <!-- login view -->
      <div class="container-fluid">
         <div class="row justify-content-center" id="login_form">
            <div class="col-12 col-sm-6 col-md-6">
              <div class="login_box"><br>
                <a href="#" class="btn_in">SIGN IN</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?= base_url('admin/Reg_con'); ?>" class="btn_up">SIGN UP</a>
                <br><hr><br><br>
                <form action="#" method="post" >
                    <div class="col-5 email">
                      <input type="email" class="form-control" id="username" name="username" 
                      autocomplete="off" placeholder="Email">
                    </div><br>
                    <div class="col-5 pass">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
                      </div><br>
                    <div class="col-5 sign_in">
                      <button type="button" id="signin" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <div class="col-5 sign_in" style="margin-left: 150px;">
                      <br>
                      <a href="#" id="forget_passowrd">Forgot Password ?</a>
                    </div>
                  </form>
                </div>
             </div>
          </div>
      </div>       
    
      <!-- forget password view -->
      <div class="container-fluid">
         <div class="row justify-content-center"  id="for_form">
            <div class="col-12 col-sm-6 col-md-6">
              <div class="forget_box"><br>
                <a href="#" class="title_for">Forget Password</a>
                <br><hr><br><br>
                <form action="#" method="post" >
                    <div class="col-5 email">
                      <input type="email" class="form-control" id="for_username" name="for_username" 
                      autocomplete="off" placeholder="Enter Email">
                    </div><br>
                    <div class="col-5 sign_in">
                      <button type="button" id="sub_for" class="btn btn-primary btn-block">Send OTP</button>
                    </div><br>
                    <div class="col-12 close">
                      <button type="button" id="close" class="btn btn-secondary btn-block">Cancel</button>
                    </div>
                  </form>
                </div>
             </div>
          </div>
      </div>       

      <!-- opt form view -->
        <div class="container-fluid">
            <div class="row justify-content-center" id="otp_form">
              <div class="col-12 col-sm-6 col-md-6">
                <div class="otp_box">
                  <h2>Enter OTP</h2>
                  <hr><br>
                  <form method="post" >
                      <div class="col-5">
                        <input type="text" class="form-control" id="otp" name="otp" 
                        autocomplete="off" placeholder="OTP">
                      </div><br>
                      <div class="col-5">
                        <button type="button" id="btn_otp" class="btn btn-primary btn-block">Submit</button>
                      </div><br>
                  </form>
                </div>
              </div>
            </div>  
          </div>

          <!-- set passowrd form -->
          <div class="container-fluid">
            <div class="row justify-content-center" id="pass_form">
              <div class="col-12 col-sm-6 col-md-6">
                <div class="pass_box">
                  <h2>Set Your Password</h2>
                  <hr><br>
                  <form method="post" >
                      <div class="col-5">
                        <input type="password" class="form-control" id="set_pass" name="set_pass" 
                        autocomplete="off" placeholder="New Password">
                      </div><br>
                      <div class="col-5">
                        <input type="password" class="form-control" id="confirm_set_pass" name="confirm_set_pass" 
                        autocomplete="off" placeholder="Confirm Password">
                      </div><br>
                      <div class="col-5">
                        <button type="button" id="btn_pass" class="btn btn-primary btn-block">Done</button>
                      </div><br>
                  </form>
                </div>
              </div>
            </div>  
          </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <script>
    $(document).ready(function(){
      $('#for_form').hide();
      $('#otp_form').hide();
      $('#pass_form').hide();
      
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
    });
      $(document).on("click","#close",function(){
        $('#for_form').hide();
        $('#login_form').show();
      });
      $(document).on("click","#signin",function(){
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var username = $('#username').val();
        var password = $('#password').val();
        var chk = regex.test(username);

        if(username == "" && password == ""){
          toastr["error"]("All fields are required");
        }else if(username == ""){
          toastr["error"]('Email field required');
        }else if(password == ""){
          toastr["error"]('Password field required');
        }else if(chk == false){
          toastr["warning"]('Please Enter Valid Email Address');
        }
        else{
          $.ajax({
            url:"<?= base_url('admin/Admin_login/admin_varification'); ?>",
            type:"post",
            dataType:"json",
            data:{
                username:username,
                password:password,
            },
            success:function(data){
              // console.log(data);
              if(data.status == "success"){
                toastr["success"](data.msg);
                window.location.href="<?= base_url('admin/Dashboard_con'); ?>";
              }else{
                toastr["error"](data.msg);
                // alert('username or password invalid');
              }
            }
          });
        }
      });

      $(document).on("click","#forget_passowrd",function(){
        $('#login_form').hide();
        $('#for_form').show();
      });

      $(document).on("click","#sub_for",function(){
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var username = $('#for_username').val();
        var chk = regex.test(username);
        
        if(username == ""){
          toastr["error"]('Email field required');
        }else if(chk == false){
          toastr["warning"]('Please Enter Valid Email Address');
        }
        else{
          $.ajax({
            url:"<?= base_url('admin/Admin_login/check_email'); ?>",
            type:"post",
            dataType:"json",
            data:{
                username:username,
            },
            success:function(data){
              // console.log(data);
              if(data.status == "success"){
                  $.ajax({
                    url:"<?= base_url('admin/Admin_login/for_send_otp'); ?>",
                    type:"post",
                    dataType:"json",
                    data:{
                        username:username,
                    },
                    success:function(data){
                      // console.log(data);
                      if(data.status == "success"){
                        toastr["success"](data.msg);
                        $('#for_form').hide();
                        $('#otp_form').show();

                        $(document).on('click','#btn_otp',function(){
                              var fill_otp =  $('#otp').val();
                              if(fill_otp == ''){
                                 toastr["error"]('OTL field is required');      
                              }   
                              else if(data.otp == fill_otp){                        
                                $('#otp_form').hide();
                                $('#pass_form').show();
                                $(document).on("click","#btn_pass",function(){
                                  var set_pass = $('#set_pass').val();
                                  var con_set_pass = $('#confirm_set_pass').val();
                                  var email = $('#for_username').val();

                                  if(set_pass == '' && con_set_pass == ''){
                                    toastr["error"]('Both fields is required');
                                  }else if(set_pass == ''){
                                    toastr["error"]('password field is required');
                                  }else if(con_set_pass == ''){
                                    toastr["error"]('confirm password field is required');
                                  }else if(set_pass != con_set_pass){
                                    toastr["warning"]('Password Miss Match');
                                  }
                                  else{
                                      $.ajax({
                                        url:"<?= base_url('admin/Admin_login/forget_pass'); ?>",
                                        type:"post",
                                        dataType:"json",
                                        data:{
                                            email:email,
                                            password:set_pass
                                        },
                                        success:function(data){
                                          // console.log(data); 
                                          if(data.status == "success"){
                                              toastr["success"](data.msg);
                                              $('#pass_form').hide();
                                              $('#login_form').show();
                                          }
                                          else{
                                            toastr["error"](data.msg);
                                          }
                                        }
                                      });
                                  }
                              });
                              }
                              else{
                                toastr["error"]('Invalid OTP');      
                              }
                          });
                      }else{
                        toastr["error"](data.msg);
                      }
                    }
                  });

              }else{
                toastr["error"](data.msg);
              }
            }

          });
          
        }
      }); 

      
  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  </body>
</html>