<!DOCTYPE html>
<html>
<head>
	<title>Expense</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('./Assets/css/style.css'); ?>">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/					bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>
<body>	
	<div class="container">
	<br><h1>Expense</h1><br>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
<i class="fas fa-plus"></i>&nbsp;&nbsp;Create</button><br><br>
		
		<!-- add modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" id="mdl1" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add New Expense</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="#" method="post" id="expense_form">
		        	<div class="form-group">
		        		<label>Amount</label>
		        		<input type="number" name="amount" id="amount" class="form-control">
		        	</div>
		        	<div class="form-group">
		        		<label>Type</label>
		        		<select class="form-control" name="category" id="category">
		        			<option>Select category</option>
		        			<?php
		        				foreach($cat as $val){
		        					if($val['status'] == "Active"){
		        						echo "<option>".$val['cname']."</option>";
		        					}
		        				}
		        			?>
		        		</select>
		        	</div>
		        	<div class="form-group">
		        		<label>Date</label>
		        		<input type="date" name="date" id="date" class="form-control">
		        	</div>
		        	<div class="form-group">
		        		<label>Detail</label>
		        		<input type="text" name="detail" id="detail" class="form-control" autocomplete="off">
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
		
		<div class="table-responsive">
			<table class="table" style="text-align: center;" id="tbl">
				<thead>
					<tr>
						<th scope="col">NO</th>
						<th scope="col">Amount</th>
						<th scope="col">Category</th>
						<th scope="col">Date</th>
						<th scope="col">Details</th>
						<th scope="col">Storage</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
			</table>
		</div>

	<!-- edit modal -->
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" id="mdl1" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Update Expense</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="#" method="post" id="expense_form">
	        	<input type="hidden" id="eid" name="eid" value="">
	        	<div class="form-group">
	        		<label>Amount</label>
	        		<input type="number" name="eamount" id="eamount" class="form-control">
	        	</div>
	        	<div class="form-group">
	        		<label>Type</label>
	        		<select class="form-control" name="ecategory" id="ecategory">
	        			<option>Select category</option>
	        			<?php
	        				foreach($cat as $val){
	        					if($val['status'] == "Active"){
	        						echo "<option>".$val['cname']."</option>";
	        					}
	        				}
	        			?>
	        		</select>
	        	</div>
	        	<div class="form-group">
	        		<label>Date</label>
	        		<input type="date" name="edate" id="edate" class="form-control">
	        	</div>
	        	<div class="form-group">
	        		<label>Detail</label>
	        		<input type="text" name="edetail" id="edetail" class="form-control" autocomplete="off">
	        	</div>
	        	<div class="form-group">
	        		<label>Storage</label>
	        		<select class="form-control" name="estorage" id="estorage">
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
	        <button type="button" id="update" class="btn btn-primary">Update</button>
	      </div>
	    </div>
	  </div>
	</div>

</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<script>
		// $(document).on("change","#storage",function(){
		// 	var storage = $("#storage").val();
		// 	var amt = $('#amount').val();
		// 	// alert(storage+' '+amt);
		// 	$.ajax({
		// 		url:"<?= base_url('admin/Expense_con/amount_validation'); ?>",
		// 		type:"post",
		// 		dataType:"json",
		// 		data:{
		// 			sid:storage
		// 		},
		// 		success:function(data){
		// 			console.log(data);
		// 			// alert(amt < data.amount.amount || amt == data.amount.amount);
		// 	if(amt < data.amount.amount || amt == data.amount.amount){
		// 				$(document).on("click","#submit",function(){
		// 				var amount = $('#amount').val();
		// 				var category = $('#category').val();
		// 				var date = $('#date').val();
		// 				var detail = $('#detail').val();
		// 				var storage = $('#storage').val();
		// 				// alert(amount+' '+type+' '+date+' '+detail);
		// 		if(amount == "" && category == "Select category" && date == "" && detail == "" && storage == "Select Storage"){
		// 					toastr["error"]('All fields are required');
		// 				}else if(amount == ""){
		// 					toastr["error"]('Amount field required');
		// 				}else if(category == "Select category"){
		// 					toastr["error"]('Please select category');
		// 				}else if(date == ""){
		// 					toastr["error"]('Date field required');
		// 				}else if(detail == ""){
		// 					toastr["error"]('Detail field required');
		// 				}else if(storage == "Select Storage"){
		// 					toastr["error"]('Storage field required');
		// 				}
		// 				else
		// 				{
		// 					$.ajax({
		// 						url:"<?= base_url('admin/Expense_con/insert_expense'); ?>",
		// 						type:"post",
		// 						dataType:"json",
		// 						data:{
		// 							amount:amount,
		// 							detail:detail,
		// 							date:date,
		// 							category:category,
		// 							storage:storage
		// 						},
		// 						success:function(data){
		// 							console.log(data);
		// 							if(data.status == "success"){
		// 								toastr["success"](data.msg);
		// 								window.location.href="<?= base_url('admin/Expense_con'); ?>";
		// 								$("#exampleModal").modal().hide();
		// 								$(".modal-backdrop").hide();
		// 								$('#tbl').DataTable().destroy();
		// 								fetch();
		// 							}else{
		// 								toastr["error"](data.msg);
		// 							}
		// 						}
		// 					});		
		// 				}
		// 			});
								
		// 				// alert('Amount is Not valid (Check balance)');
		// 			}
		// 		else{
		// 			toastr["warning"]('Amount is Not valid (Check balance)');
		// 			$("#exampleModal").modal().hide();
		// 			$(".modal-backdrop").hide();
		// 			$('#tbl').DataTable().destroy();
		// 			fetch();
		// 		}
		// 		}
		// 	});
		// });

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
				url:"<?= base_url('admin/Expense_con/get_expense'); ?>",
				type:"post",
				dataType:"json",
			
				success:function(data){
					console.log(data);
					$('#tbl').DataTable({
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
				            { "data": "storage_name" },
				            { "render": function(data, type, row, meta){
				            return `<a href='#' class='btn btn-success' id='edit' value='${row.eid}'>
			            				<i class="far fa-edit"></i>&nbsp;&nbsp;Edit</a>
			            				<a href='#' class='btn btn-danger' id='del' value='${row.eid}'>
				            			<i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Delete</a>
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
			var amount = $('#amount').val();
			var category = $('#category').val();
			var date = $('#date').val();
			var detail = $('#detail').val();
			var storage = $('#storage').val();
			// alert(amount+' '+type+' '+date+' '+detail);
	if(amount == "" && category == "Select category" && date == "" && detail == "" && storage == "Select Storage"){
				toastr["error"]('All fields are required');
			}else if(amount == ""){
				toastr["error"]('Amount field required');
			}else if(category == "Select category"){
				toastr["error"]('Please select category');
			}else if(date == ""){
				toastr["error"]('Date field required');
			}else if(detail == ""){
				toastr["error"]('Detail field required');
			}else if(storage == "Select Storage"){
				toastr["error"]('Storage field required');
			}
			else
			{
				$.ajax({
					url:"<?= base_url('admin/Expense_con/insert_expense'); ?>",
					type:"post",
					dataType:"json",
					data:{
						amount:amount,
						detail:detail,
						date:date,
						category:category,
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
							$('#expense_form')[0].reset();
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
                url:"<?= base_url('admin/Expense_con/delete_expense'); ?>",
                type: "post",
                dataType: "json",
                data: {
                  did:id
                },
                success: function(data){
                	console.log(data);
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

	$(document).on("click", "#edit", function(e){
        e.preventDefault();

        var id = $(this).attr("value");

        $.ajax({
          url: "<?= base_url('admin/Expense_con/edit'); ?>",
          type: "post",
          dataType: "json",
          data: {
            eid:id
          },
          success: function(data){
          	console.log(data);
            if (data.status == "success"){
                $('#editModal').modal().show();
                $("#eid").val(data.editexpense.eid);
                $("#eamount").val(data.editexpense.amount);
                $("#ecategory").val(data.editexpense.category);
                $("#edate").val(data.editexpense.date);
                $("#edetail").val(data.editexpense.detail);
                $("#estorage").val(data.editexpense.storage);
              }else{
                toastr["error"](data.msg);
              }
          }
        });
      });

	$(document).on("click", "#update", function(e){
        e.preventDefault();

        var eid = $('#eid').val();
        var eamount = $('#eamount').val();
		var ecategory = $('#ecategory').val();
		var edate = $('#edate').val();
		var edetail = $('#edetail').val();
		var estorage = $('#estorage').val();
		// alert(amount+' '+type+' '+date+' '+detail);
if(eid == "" || eamount == "" && ecategory == "Select category" && edate == "" && edetail == "" && estorage== "Select Storage"){
			toastr["error"]('All fields are required');
		}else if(eamount == ""){
			toastr["error"]('Amount field required');
		}else if(ecategory == "Select category"){
			toastr["error"]('Please select category');
		}else if(edate == ""){
			toastr["error"]('Date field required');
		}else if(edetail == ""){
			toastr["error"]('Detail field required');
		}
		else if(estorage == "Select Storage"){
			toastr["error"]('Storage field required');
		}
        else{
          $.ajax({
            url: "<?= base_url('admin/Expense_con/update'); ?>",
            type: "post",
            dataType: "json",
            data: {
              	eid:eid,
       			amount:eamount,
				detail:edetail,
				date:edate,
				category:ecategory,
				storage:estorage
            },
            success: function(data){
            	// console.log(data);
	              if(data.status == "success") {
					toastr["success"](data.msg);	               
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

	</script>

	<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>
</html>
