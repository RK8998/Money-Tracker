<!DOCTYPE html>
<html>
<head>
	<title>Loan</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('./Assets/css/style.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('./Assets/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

	<style type="text/css">
		#Result{
			/*position: absolute;*/
			width: 100%;
			max-width: 700px;
			cursor: pointer;
			overflow-y: auto;
			max-height: 400px;
			box-sizing: border-box;
			z-index: 1001;
		}
		.link-class{
			background-color: #f1f1f1;
		}
		.link-class:hover{
			background-color: white;
		}
	</style>

</head>
<body>
	<br><h1>Loan</h1><br>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
<i class="fas fa-plus"></i>&nbsp;&nbsp;Create</button>
	&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= base_url('admin/Loan_con/close_deal_view');?>" class="btn btn-success">View Close Deals</a>
	<!-- add modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" id="mdl1" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Create new client</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="#" method="post" id="loan_form">
	        	<div class="form-group">
	        		<label>Client Name</label>
	        		<input type="text" name="name" autocomplete="off" id="name" class="form-control">
	        		<ul class="list-group" id="Result"></ul>
	        	</div>
	        	<div class="form-group">
	        		<label>Amount</label>
	        		<input type="number" name="amount" id="amount" class="form-control">
	        	</div>
	        	<div class="form-group">
	        		<label>Date</label>
	        		<input type="date" name="date" id="date" class="form-control">
	        	</div>
	        	<div class="form-group">
	        		<label>Interest</label>
	        		<input type="number" name="int_per" id="int_per">&nbsp; %
	        		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        		<input type="radio" name="duration" value="monthly" checked>&nbsp;Monthly
	        		&nbsp;&nbsp;&nbsp;&nbsp;
	        		<input type="radio" name="duration" value="yearly">&nbsp;Yearly
	        	</div>
	        	<div class="form-group">
	        		<!-- <label>Interest Type</label> -->
	        		<select class="form-control" name="int_type" id="int_type">
	        			<option>Select Interest Type</option>
	        			<option value="Simple">Simple</option>
	        			<option value="Compound">Compound</option>
	        		</select>
	        	</div>
	        	<div class="form-group">
	        		<label>Close Date</label>
	        		<input type="date" name="return_date" id="return_date" class="form-control">
	        	</div>
	        	<div class="form-group">
	        		<label>Storage</label>
	        		<select class="form-control" name="storage" id="storage">
	        			<option>Select Storage</option>
	        			<?php
	        				foreach($storage as $val){
	        					if($val['amount'] != 0){
		        					echo "<option value='".$val['sid']."'>".$val['sname']."</option>";
		        				}
	        				}
	        			?>
	        		</select>
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
	  
		<div class="table-responsive">
			<table class="table" style="text-align: center;" id="tbl">
				<thead>
					<tr>
						<th>No</th>
						<th>User</th>
						<th>Amount</th>
						<th>Date</th>
						<th>Interest(%)</th>
						<th>Duration</th>
						<th>Interest Type</th>
						<th>Close Date</th>
						<th>Close Amount</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	
	
	<!-- close modal -->
	<div class="modal fade" id="closeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" id="closeModal" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Close deal</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="#" method="post" id="loan_form">
	        	<input type="hidden" id="clid" name="clid" value="">
	        	<input type="hidden" id="ccid" name="ccid" value="">
	        	<div class="form-group">
	        		<label>Client Name</label>
	        		<input type="text" name="cname" id="cname" class="form-control" disabled="true">
	        	</div>
	        	<div class="form-group">
	        		<label>Amount</label>
	        		<input type="number" name="camount" id="camount" class="form-control" disabled="true">
	        	</div>
	        	<div class="form-group">
	        		<label>Date</label>
	        		<input type="date" name="cdate" id="cdate" class="form-control" disabled="true">
	        	</div>
	        	<div class="form-group">
	        		<label>Interest</label>
	        		<input type="number" name="cint_per" id="cint_per" disabled="true">&nbsp;%&nbsp;
	        		<input type="text" name="cduration" id="cduration" disabled="true">
	        	</div>
	        	<div class="form-group">
	        		<label>Interest Type</label>
	        		<select class="form-control" name="cint_type" id="cint_type" disabled="true">
	        			<option>Select Interest Type</option>
	        			<option value="Simple">Simple</option>
	        			<option value="Compound">Compound</option>
	        		</select>
	        	</div>
	        	<div class="form-group">
	        		<label>Close Date</label>
	        		<input type="date" name="creturn_date" id="creturn_date" class="form-control" disabled="true">
	        	</div>
	        	<div class="form-group">
	        		<label>Storage</label>
	        		<select class="form-control" name="cstorage" id="cstorage" disabled="true">
	        			<option>Select Storage</option>
	        			<?php
	        				foreach($storage as $val){
	        					if($val['amount'] != 0){
		        					echo "<option value='".$val['sid']."'>".$val['sname']."</option>";
		        				}
	        				}
	        			?>
	        		</select>
	        	</div>
	        </form>
		      </div>

	      <div class="modal-footer">
			<input type="text" name="cclose_amount" id="cclose_amount" disabled="true">
	        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
	        <button type="button" id="close_deal" class="btn btn-primary">Close</button>
	      </div>
	    </div>
	  </div>
	 </div>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<script>
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
		});

		function fetch(){
			var cnt = 1;
			$.ajax({
				url:"<?= base_url('admin/Loan_con/get_loan'); ?>",
				type:"post",
				dataType:"json",
			
				success:function(data){
					console.log(data);
					$('#tbl').DataTable( {
				        "data":data,
				        "columns": [
				            { "render": function(){
				            		return cnt++;
				            	}
				            },
				            { "data": "name" },
				            { "data": "amount" },
				            { "data": "date" },
				            { "data": "int_per" },
				            { "data": "duration" },
				            { "data": "int_type" },
				            { "data": "return_date"},
				            { "data": "close_amount"},
				            { "render": function(data, type, row, meta){
				            return `<a href='#' class='btn btn-secondary' id='close' value='${row.lid}'>
			            				&nbsp;<i class="fas fa-times"></i>&nbsp;</a>
			            			<a href='#' class='btn btn-danger' id='del' value='${row.lid}'>
				            			&nbsp;<i class="fas fa-trash-alt"></i>&nbsp;</a>
			            				`;
				            	} 
				        	},
				        ]
				    });
				}
			});	
		}
		fetch();

		$(document).on("click","#submit",function(){
			var name = $('#name').val();
			var amount = $('#amount').val();
			var date = $('#date').val();
			var int_per = $('#int_per').val();
			var duration = $("input[name='duration']:checked").val();
			var int_type = $('#int_type').val();
			var return_date = $('#return_date').val();
 			var storage = $('#storage').val();

			if(name == ""&&amount == ""&&date == ""&&int_per == ""&&int_type == "Select Interest Type"&&return_date == "" && storage == "Select Storage"){
				toastr["error"]('All fields are required');
			}else if(name == ""){
				toastr["error"]('User field required');
			}else if(amount == ""){
				toastr["error"]('Amount field required');
			}else if(date == ""){
				toastr["error"]('Date field required');
			}else if(int_per == ""){
				toastr["error"]('Interest percentage required');
			}else if(int_type == "Select Interest Type"){
				toastr["error"]('Interest type required');
			}else if(return_date == ""){
				toastr["error"]('Close date field required');
			}else if(storage == "Select Storage"){
				toastr["error"]('Storage field required');
			}
			else{
				$.ajax({
					url:"<?= base_url('admin/Loan_con/insert_loan'); ?>",
					type:"post",
					dataType:"json",
					data:{
							name:name,
							amount:amount,
							date:date,
							int_per:int_per,
							duration:duration,
							int_type:int_type,
							return_date:return_date,
							storage:storage
					},
					success:function(data){
						console.log(data);
						if(data.status == "success"){
							toastr["success"](data.msg);
							
							$("#exampleModal").modal().hide();
							$(".modal-backdrop").hide();
							$('#tbl').DataTable().destroy();
							fetch();
							// window.location.href="<?= base_url('admin/Loan_con'); ?>";
							$('#loan_form')[0].reset();
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
                url:"<?= base_url('admin/Loan_con/delete_loan'); ?>",
                type: "post",
                dataType: "json",
                data: {
                  did:id
                },
                success: function(data){
                  if (data.status == "success") {
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

		$(document).on("click", "#close", function(e){
        e.preventDefault();

        var id = $(this).attr("value");

        $.ajax({
          url: "<?= base_url('admin/Loan_con/close'); ?>",
          type: "post",
          dataType: "json",
          data: {
            cid:id
          },
          success: function(data){
          	console.log(data);
            if (data.status == "success"){
                $('#closeModal').modal().show();
                $('#clid').val(data.close.lid);
                $('#ccid').val(data.close.cid);
                $('#cname').val(data.close.name);
                $('#camount').val(data.close.amount);
                $('#cdate').val(data.close.date);
                $('#cint_per').val(data.close.int_per);
                $('#cduration').val(data.close.duration);
                $('#cint_type').val(data.close.int_type);
                $('#creturn_date').val(data.close.return_date);
                $('#cstorage').val(data.close.storage);
                $('#cclose_amount').val(data.close.close_amount);
              }else{
                toastr["error"](data.msg);
              }      
          }
        });
      });

	$(document).on("click", "#close_deal", function(e){
        e.preventDefault();

        var clid = $('#clid').val();
        var ccid = $('#ccid').val();
        var cname = $('#cname').val();
        var camount = $('#camount').val();
        var cdate = $('#cdate').val();
        var cint_per = $('#cint_per').val();
        var cduration = $('#cduration').val();
        var cint_type = $('#cint_type').val();
        var creturn_date = $('#creturn_date').val();
        var cstorage = $('#cstorage').val();
        var cclose_amount = $('#cclose_amount').val();

	      $.ajax({
	        url: "<?= base_url('admin/Loan_con/close_deal'); ?>",
	        type: "post",
	        dataType: "json",
	        data: {
	          	lid:clid,
	          	cid:ccid,
	          	name:cname,
	          	amount:camount,
	          	date:cdate,
	          	int_per:cint_per,
	          	duration:cduration,
	          	int_type:cint_type,
	          	return_date:creturn_date,
	          	storage:cstorage,
	          	close_amount:cclose_amount
	        },
	        success: function(data){
	        	console.log(data);
	              if (data.status == "success") {
	                toastr["success"](data.msg);
	                $('#tbl').DataTable().destroy();
	                fetch();
	                $('#closeModal').modal().hide();
	                $(".modal-backdrop").hide();
	              	
	              }else{
	                toastr["error"](data.msg);
	              }
	        }
	      });
	  });
	  $(document).on("keyup","#name",function(){
	  	 var name = $('#name').val();
	  	 
	  	 $.ajax({
	  	 	url:"<?= base_url('admin/Loan_con/match_user'); ?>",
	  	 	type: "post",
	        dataType: "json",
	        data: {
	          	name:name,
	        },
	        success: function(data){
	        	console.log(data);
            	$('#Result').html("");
            	
	            if(data.length > 0){
	            	for(var i=0; i<data.length; i++){
	            		var name = data[i].name;
	            		$('#Result').append("<li class='list-group-item link-class'>"+name+"</li>");
	            	}
	            }else{
	             	$('#Result').append("<li class='list-group-item link-class' style='color:red;'>NO DATA FOUND</li>"); 
	            }
           }
	  	 });
	  });
	  $('#Result').on("click","li",function(){
	  	var click_text = $(this).text();
	  	$('#name').val(click_text);
	  	$('#Result').html('');
	  });

	</script>

	<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>
</html>