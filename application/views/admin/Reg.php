<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="<?= base_url('./Assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <title>Register</title>

  <style>
    *{
      margin: 0px 0px;
      padding: 0px 0px;
    }
     body{
      background: linear-gradient(90deg, #EEFBFB 50%, #203647 50%);
    }
    .reg_box{
      background-color: white;
      padding: 10px;
      width: 500px;
      height: 400px;
      text-align: center;
      margin-left: 100px;
      margin-top: 70px;
      padding-top: 40px;
      text-align: center;
      box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
    }
    .btn_in{
      text-decoration: none;
      font-size: 25px;
      font-weight: bold;
      font-family: Georgia, serif;
      color: #808080;
      transition: 0.5s;
    }
    .btn_in:hover, .btn_in:focus{
      outline: none;
      text-decoration: none;
      color: #808080;
    }
    .btn_up{
      text-decoration: none;
      font-size: 25px;
      font-weight: bold;
      font-family: Georgia, serif;
      text-decoration: underline;
      color: #203647;
      transition: 0.5s;
    }
    .btn_up:hover, .btn_up:focus{
      outline: none;
      text-decoration: none;
      text-decoration: underline;
      color: #203647;
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
    #signup{
      margin-left: 135px;
      width: 200px;
      /*border-radius: 50px;*/
    }
    hr{ 
      width: 450px;
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
      height: 300px;
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
  </style>
  </head>
  <body>
      <br><br>
      <div class="row justify-content-center" id="reg_form">         
             <div class="col-12 col-sm-6 col-md-6">
              <div class="reg_box">
                <a href="<?= base_url('admin/Admin_login'); ?>" class="btn_in">SIGN IN</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#" class="btn_up">SIGN UP</a>
                <br><hr><br>
                <form method="post" >
                      <div class="col-5">
                        <input type="email" class="form-control" id="username" name="username" 
                        autocomplete="off" placeholder="Email">
                      </div><br>
                      <div class="col-5">
                        <input type="password" class="form-control" id="password" name="password" placeholder=" password" />
                      </div><br>
                      <div class="col-5">
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm password" />
                      </div><br>
                      <div class="col-5">
                        <button type="button" id="signup" class="btn btn-primary btn-block">Sign Up</button>
                      </div>
                  </form>
                </div>
              </div>
          </div>

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

      </div>     
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <script>
    $(document).ready(function(){
       $('#otp_form').hide();
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
    
      $(document).on("click","#signup",function(){
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var username = $('#username').val();
        var password = $('#password').val();
        var cpassword = $('#cpassword').val();
        var type = '2';
        var status = 'active';
        var chk = regex.test(username);

        if(username == "" && password == "" && cpassword == ""){
          toastr["error"]("All fields are required");
        }else if(username == ""){
          toastr["error"]('Email field required');
        }else if(password == ""){
          toastr["error"]('Password field required');
        }else if(cpassword == ""){
          toastr["error"]('Confirm password field required');
        }else if(password != cpassword){
          toastr["warning"]('Password miss match');
        }else if(chk == false){
          toastr["warning"]('Please Enter Valid Email Address');
        }
        else{
          $.ajax({
            url:"<?= base_url('admin/Reg_con/check_email'); ?>",
            type:"post",
            dataType:"json",
            data:{
                username:username,
            },
            success:function(data){
              // console.log(data);
              if(data.status == "success"){
                  $.ajax({
            url:"<?= base_url('admin/Reg_con/send_otp'); ?>",
            type:"post",
            dataType:"json",
            data:{
                username:username,
                // password:password,
                // type:type,
                // status:status
            },
            success:function(data){
              // console.log(data);
              if(data.status == "success"){
                toastr["success"](data.msg);
                
                  $('#reg_form').hide();
                  $('#otp_form').show();

                    $(document).on('click','#btn_otp',function(){
                        var fill_otp =  $('#otp').val();
                        if(data.otp == fill_otp){
                          $.ajax({
                            url:"<?= base_url('admin/Reg_con/insert_reg'); ?>",
                            type:"post",
                            dataType:"json",
                            data:{
                                username:username,
                                password:password,
                                type:type,
                                status:status        
                            },
                            success:function(data){
                              // console.log(data);
                              if(data.status == "success"){
                                  toastr["success"](data.msg);
                                  window.location.href="<?= base_url('admin/Admin_login'); ?>";
                              }else{
                                toastr["error"](data.msg);
                              }
                            }
                          });  
                        }
                        else{
                          toastr["error"]('Invalid OTP (Try Again)');
                          $('#otp').val();
                          $('#reg_form').show();
                          $('#otp_form').hide();
                        }
                    });
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" defer></script>
  </body>
</html>