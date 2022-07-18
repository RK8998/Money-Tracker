<!DOCTYPE html>
<html>
<head>
	<title>Storage</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('./Assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/					bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>
<body>
	<div class="container">
		<br><h1>Storage / Wallet</h1><br>
	<button type="button" class="btn btn-primary" id="btn_create" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Create</button>

	<a href="<?= base_url('admin/Storage_con/');?>" id='back' class="btn btn-primary col-2">
	<i class="fas fa-arrow-left" style="font-size: 22px;margin-top: 5px;"></i></a>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" id="mdl1" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Create New Storage</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="#" method="post" id="storage_form">
		        	<div class="form-group">
		        		<label>Wallet Name</label>
		        		<input type="text" name="sname" id="sname" class="form-control" autocomplete="off">
		        	</div>
		        	<div class="form-group">
		        		<label>Wallet Detail</label>
		        		<input type="text" name="detail" id="detail" class="form-control" autocomplete="off">
		        	</div>
		        </form>
			      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
		        <button type="button" id="submit" class="btn btn-primary">Submit</button>
		      </div>
		    </div>
		  </div>
		</div>
		<br><br>
		<div id="storage_box">
		<!-- storage box  view  -->
		<?php
			foreach($storage as  $value){
			echo "
				<div class='jumbotron' id=''>
					<div class='action' style='float:right;'>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href='#' id='edit' value=".$value['sid']." class='btn btn-success'><i class='far fa-edit'></i>&nbsp;&nbsp;Edit</a>
						<a href='#'' id='del' value=".$value['sid']." class='btn btn-danger'><i class='fas fa-trash-alt'></i>&nbsp;&nbsp;Delete</a><br><br>
				<a href='#' id='tra_inc' value=".$value['sid']." class='btn btn-secondary'><i class='far fa-eye'></i>&nbsp;&nbsp; Income</a>
				<a href='#' id='tra_exp' value=".$value['sid']." class='btn btn-secondary'><i class='far fa-eye'></i>&nbsp;&nbsp; Expense</a>
					</div>
				  <h1 class='display-3' id='h1'>".$value['sname']."</h1><br>  
					<div class='list-group'>
				  		<h4 id='h4' class='list-group-item list-group-item-action active col-md-2'>
				  			".$value['amount']."
				  		</h4>
					</div>
					<hr class='my-4'>
					<p id='p'>".$value['detail']."</p>
				</div>
			";	
			}
		?>
		</div>
		<div class="table-responsive">
			<table class="table" style="text-align: center;" id="tbl_tra">
				<thead>
					<tr>
						<th>NO</th>
						<th>Amount</th>
						<th>Category</th>
						<th>Date</th>
						<th>Detail</th>
					</tr>
				</thead>
				<tbody>   
				</tbody>
			</table>
		</div>
		
	
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" id="editModal" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Update Storage</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="#" method="post" id="frm1">
		        	<input type="hidden" name="esid" id="esid">
		        	<div class="form-group">
		        		<label>Wallet Name</label>
		        		<input type="text" name="esname" id="esname" class="form-control" autocomplete="off">
		        	</div>
		        	<div class="form-group">
		        		<label>Wallet Detail</label>
		        		<input type="text" name="edetail" id="edetail" class="form-control" autocomplete="off">
		        	</div>
		        </form>
			      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
		        <button type="button" id="update" class="btn btn-primary">Update</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>	<!-- container end --> 
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<script>
		$(document).ready(function(){
			$('#back').hide();
			$('#tbl_tra').hide();
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

		$(document).on("click","#submit",function(){
			var sname = $('#sname').val();
			var amount = 0;
			var detail = $('#detail').val();
			if(sname == "" && amount == "" && detail == ""){
				toastr["error"]('All fields are required');
			}else if(sname == ""){
				toastr["error"]('wallet name field required');
			}
			else if(detail == ""){
				toastr["error"]('walllet detail field required');
			}else{
				$("#sname").css("border-color", "green");
				$("#amount").css("border-color", "green");	
				$("#detail").css("border-color", "green");	
				$.ajax({
					url:"<?= base_url('admin/Storage_con/insert_storage'); ?>",
					type:"post",
					dataType:"json",
					data:{
							sname:sname,
							amount:amount,
							detail,detail
					},
					success:function(data){
						console.log(data);
						if(data.status == "success"){
							toastr["success"](data.msg);
							window.location.href="<?= base_url('admin/Storage_con');?>";
							$("#exampleModal").modal().hide();
							$(".modal-backdrop").hide();
							$('#tbl').DataTable().destroy();
							fetch();
							// $('#storage_form')[0].reset();
						}else{
							toastr["error"](data.msg);
						}
					}
				});		
			}
		});
		$(document).on("click", "#del", function(e){
	        e.preventDefault();

	        var id = $(this).attr("value");

	        const swalWithBootstrapButtons = Swal.mixin({
	          customClass: {
	            confirmButton: 'btn btn-success',
	            cancelButton: 'btn btn-danger mr-2'
	          },
	          buttonsStyling: false
	        })

	        swalWithBootstrapButtons.fire({
	          title: 'Are you sure?',
	          text: "You won't be able to revert this!",
	          icon: 'warning',
	          showCancelButton: true,
	          confirmButtonText: 'Yes, delete it!',
	          cancelButtonText: 'No, cancel!',
	          reverseButtons: true
	        }).then((result) => {
	          if (result.value) {

	              $.ajax({
	                url:"<?= base_url('admin/Storage_con/delete_storage'); ?>",
	                type: "post",
	                dataType: "json",
	                data: {
	                  did:id
	                },
	                success: function(data){
	                  console.log(data);
	                  if(data.status == "success") {
	                      window.location.href="<?= base_url('admin/Storage_con');?>";
	                      $('#tbl').DataTable().destroy();
	                      fetch();
	                      swalWithBootstrapButtons.fire(
	                        'Deleted!',
	                        'Your file has been deleted.',
	                        'success'
	                      );
	                  }else{
	                      swalWithBootstrapButtons.fire(
	                        'Cancelled',
	                        'Your imaginary file is safe :)',
	                        'error'
	                      );
	                  }

	                }
	              });            
	          } else if (
	            /* Read more about handling dismissals below */
	            result.dismiss === Swal.DismissReason.cancel
	          ) {
	            swalWithBootstrapButtons.fire(
	              'Cancelled',
	              'Your imaginary file is safe :)',
	              'error'
	            )
	          }
	        });
      });
		$(document).on("click", "#edit", function(e){
        e.preventDefault();

        var id = $(this).attr("value");
        // alert(id);
        $.ajax({
          url: "<?= base_url('admin/Storage_con/edit'); ?>",
          type: "post",
          dataType: "json",
          data: {
            eid:id
          },
          success: function(data){
          	console.log(data);
            if (data.status == "success") {
                $('#editModal').modal().show();
                $("#esid").val(data.editstorage.sid);
                $("#esname").val(data.editstorage.sname);
                $("#edetail").val(data.editstorage.detail);
              }else{
                toastr["error"](data.msg);
              }
          }
        });

      });

	$(document).on("click", "#update", function(e){
        e.preventDefault();

        var esid = $('#esid').val();
        var esname = $('#esname').val();
		var edetail = $('#edetail').val();
		
		// alert(amount+' '+type+' '+date+' '+detail);
		if(esid == "" || esname == "" && edetail == ""){
			toastr["error"]('All fields are required');
		}else if(esname == ""){
			toastr["error"]('Wallet name field required');
		}else if(edetail == ""){
			toastr["error"]('Wallet detail field required');
		}
        else{
          $.ajax({
            url: "<?= base_url('admin/Storage_con/update'); ?>",
            type: "post",
            dataType: "json",
            data: {
              	sid:esid,
              	sname:esname,
              	detail:edetail
            },
            success: function(data){
            	console.log(data);
	              if (data.status == "success") {
	                toastr["success"](data.msg);
	                window.location.href="<?= base_url('admin/Storage_con');?>";
	                $('#editModal').modal().hide();
	                $(".modal-backdrop").hide();
	                
	                $('#tbl').DataTable().destroy();
	                fetch();
	                
	              }else{
	                toastr["error"](data.msg);
	              }
            }
          });

        }

      });
	$(document).on("click","#tra_inc", function(e){
        e.preventDefault();
        $('#storage_box').hide();
        $('#btn_create').hide();
        $('#tbl_tra').show();
        $('#back').show();
        var id = $(this).attr("value");
        var cnt = 1;
        $.ajax({
          url: "<?= base_url('admin/Storage_con/transaction_data_income'); ?>",
          type: "post",
          dataType: "json",
          data: {
            sid:id
          },
          success: function(data){
          	console.log(data);
          	$('#tbl_tra').DataTable( {
		        "data":data,
		        "columns": [
		            { "render": function(){
		            		return cnt++;
		            	}
		            },
		            { "data": "amount" },
		            { "data": "category" },
		            { "data": "date" },
		    		{ "data": "detail" },
		        ]
		    });	
          }
        });

      });

	$(document).on("click","#tra_exp", function(e){
        e.preventDefault();
        $('#storage_box').hide();
        $('#btn_create').hide();
        $('#tbl_tra').show();
        $('#back').show();
        var id = $(this).attr("value");
        var cnt = 1;
        $.ajax({
          url: "<?= base_url('admin/Storage_con/transaction_data_expense'); ?>",
          type: "post",
          dataType: "json",
          data: {
            sid:id
          },
          success: function(data){
          	console.log(data);
          	$('#tbl_tra').DataTable( {
		        "data":data,
		        "columns": [
		            { "render": function(){
		            		return cnt++;
		            	}
		            },
		            { "data": "amount" },
		            { "data": "category" },
		            { "data": "date" },
		    		{ "data": "detail" },
		        ]
		    });	
          }
        });

      });

	</script>
	<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>
</html>