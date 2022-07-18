<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">

    <title>Client</title>
  </head>
  <body>
  	<div class="container">
  	<br><h1>Client</h1><br>
  		<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;
		 	Create
		</button>
		<br><br>
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		        <form action="#" method="post" id="client_form">
				  <div class="mb-3">
				    <label for="exampleInputText1" class="form-label">Name</label>
				    <input type="text" class="form-control" id="name" autocomplete="off">
				  </div>
				  <div class="mb-3">
				    <label for="exampleInputText1" class="form-label">Mobile</label>
				    <input type="number" class="form-control" id="mobile" autocomplete="off">
				  </div>
				  <div class="mb-3">
				    <label for="exampleInputText1" class="form-label">Address</label>
				    <textarea class="form-control" id="address" autocomplete="off"></textarea>
				  </div>
				</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
		        <button type="button" class="btn btn-primary" id="add_user">Submit</button>
		      </div>
		    </div>
		  </div>
		</div>


  			<div class="table-responsive">
  				<table class="table" style="text-align: center;" id="tbl">
					  <thead>
					    <tr>
					      <th scope="col">No</th>
					      <th scope="col">Name</th>
					      <th scope="col">Mobile</th>
					      <th scope="col">Address</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					 </table>
  			</div>
  		</div>
  		    
  	<!--Edit Modal -->
	<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog"  id="mdl1" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Update Client</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <form action="#" method="post" id="client_form">
	          <div class="mb-3">
			    <input type="hidden" class="form-control" id="e_cid">
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputText1" class="form-label">Name</label>
			    <input type="text" class="form-control" id="e_name" autocomplete="off">
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputText1" class="form-label">Mobile</label>
			    <input type="text" class="form-control" id="e_mobile" autocomplete="off">
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputText1" class="form-label">Address</label>
			    <textarea class="form-control" id="e_address" autocomplete="off"></textarea>
			  </div>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="update">Update</button>
	      </div>
	    </div>
	  </div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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
    	$(document).ready(function(){

    		$(document).on("click","#add_user",function(){

    			var name=$("#name").val();
    			var mobile=$("#mobile").val();
    			var address=$("#address").val();

    			if(name == "" && mobile == "" && address == ""){
    				toastr["error"]('All fields are required');
    			}else if(name == ""){
    				toastr["error"]('Name field required');
    			}else if(mobile == ""){
    				toastr["error"]('Mobile field required');
    			}else if(address == ""){
    				toastr["error"]('Address field required');
    			}
    			else{
    				$.ajax({
		    			url : '<?= base_url('admin/Client_con/insert_client')?>',
		    			type : 'post',
		    			dataType : 'json',
		    			data : {
		    				name:name,
		    				mobile:mobile,
		    				address:address,
		    			},
		    			success:function(data)
		    			{
		    				console.log(data);
		    				if(data.status=="success")
		    				{
		    					toastr["success"](data.message);
		    					$("#exampleModal").modal().hide();
		    					$(".modal-backdrop").modal().hide();
		    					$('#tbl').DataTable().destroy();
		    					fetch();
		    					// window.location.href="<?= base_url('admin/Client_con'); ?>";
		    					$('#client_form')[0].reset();
		    				}
		    				else
		    				{
		    					toastr["warning"](data.message);
		    				}
		    			}
		    		});	
    			}
    		});
    		function fetch()
    		{
    			var c=1;
    			$.ajax({
	    			url : '<?= base_url('admin/Client_con/get_client')?>',
	    			type : 'post',
	    			dataType : 'json',
	    			success:function(data)
	    			{
	    				console.log(data);
	    				$('#tbl').DataTable( {
					        "data" : data,
					        "columns": [
					            { "render": function(){
					            	return c++;
					            } },
					            { "data": "name" },
					            { "data": "mobile" },
					            { "data": "address" },
					            { "render": function ( data, type, row, meta ) {
      							return `<a href='#' class='btn btn-success' id='edit' value='${row.cid}'>
			            				<i class="far fa-edit"></i>&nbsp;&nbsp;Edit</a>
			            				<a href='#' class='btn btn-danger' id='del' value='${row.cid}'>
				            			<i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Delete</a>
			            				`;
    							} }
					        ]
					    } );
	    			}
	    		});
    		}
    		fetch();
    		$(document).on("click","#del",function(){
    			var did=$(this).attr('value');
    			// alert(uid);

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
		    			url : '<?= base_url('admin/Client_con/del_client')?>',
		    			type : 'post',
		    			dataType : 'json',
		    			data : {
		    				did:did,
		    			},
		    			success:function(data)
		    			{
		    				console.log(data);
		    				if(data.status=="Success")
		    				{
		    					toastr["success"](data.message);
		    					$('#tbl').DataTable().destroy();
		    					fetch();
		    					swalWithBootstrapButtons.fire(
		                        'Deleted!',
		                        'Your file has been deleted.',
		                        'success'
		                      );
		    				}
		    				else
		    				{
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

    		$(document).on("click","#edit",function(){
    			var eid=$(this).attr('value');

    			$.ajax({
	    			url : '<?= base_url('admin/Client_con/edit_client')?>',
	    			type : 'post',
	    			dataType : 'json',
	    			data : {
	    				eid:eid,
	    			},
	    			success:function(data)
	    			{
	    				console.log(data);
	    				if(data.status=="Success")
	    				{
	    					$("#editModal").modal('show');
	    					$('#e_cid').val(data.client.cid);
                           	$('#e_name').val(data.client.name);
                          	$('#e_mobile').val(data.client.mobile);
                          	$('#e_address').val(data.client.address);
	    				}
	    			}
	    		});

    		});
    		$(document).on("click","#update",function(){

    			var cid=$("#e_cid").val();
    			var name=$("#e_name").val();
    			var mobile=$("#e_mobile").val();
    			var address=$("#e_address").val();


    			if(name == "" && mobile == "" && address == ""){
    				toastr["error"]('All fields are required');
    			}else if(name == ""){
    				toastr["error"]('Name field required');
    			}else if(mobile == ""){
    				toastr["error"]('Mobile field required');
    			}else if(address == ""){
    				toastr["error"]('Address field required');
    			}
    			else{
    				$.ajax({
		    			url : '<?= base_url('admin/Client_con/update_client')?>',
		    			type : 'post',
		    			dataType : 'json',
		    			data : {
		    				cid:cid,
		    				name:name,
		    				mobile:mobile,
		    				address:address,
		    			},
		    			success:function(data)
		    			{
		    				console.log(data);
		    				if(data.status=="Success")
		    				{
		    					toastr["success"](data.message);
		    					// $("#editModal").modal().hide();
		    					$("#editModal").modal('hide');
		    					$(".modal-backdrop").modal().hide();
		    					$('#tbl').DataTable().destroy();
		    					fetch();
		    					// window.location.href="<?= base_url('admin/Client_con'); ?>";
		    					// $('#client_form')[0].reset();
		    				}
		    				else
		    				{
		    					toastr["error"](data.message);
		    				}
		    			}
		    		});	
    			}
    		});

    	});
    	toastr.options = {
		  "closeButton": false,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": false,
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
    </script>
  </body>
</html>