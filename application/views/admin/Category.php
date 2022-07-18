<!DOCTYPE html>
<html>
<head>
	<title>Category</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('./Assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('./Assets/css/style.css'); ?>">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>
<body>	
	<div class="container">
	<br><h1>Category</h1><br>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
<i class="fas fa-plus"></i>&nbsp;&nbsp;Create</button>
		
		<!-- add modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" id="mdl1" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Create new category</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="#" method="post" id="category_form">
		        	<div class="form-group">
		        		<label>Category Name</label>
		        		<input type="text" name="cname" id="cname" class="form-control" autocomplete="off">
		        	</div>
		        	<div class="form-group">
		        		<label>Type</label>
		        		<select class="form-control" name="type" id="type">
		        			<option>select category type</option>
		        			<option value="Income">Income</option>
		        			<option value="Expense">Expense</option>
		        		</select>
		        	</div>
		        	<div class="form-group">
		        		<label>Status</label><br>
						<input type="radio" id="status" name="status" value="Active" checked>&nbsp;Active
		   				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		   				<input type="radio" id="status" name="status" value="Inactive">&nbsp;Inactive
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
						<th>NO</th>
						<th>Name</th>
						<th>Type</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>   
				</tbody>
			</table>	
		</div>
</div>
	
	<!-- edit modal -->
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" id="editmdl" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Update category</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="#" method="post" id="frm1">
		        	<input type="hidden" id="eid" name="eid" value="">
		        	<div class="form-group">
		        		<label>Category Name</label>
		        		<input type="text" name="ecname" id="ecname" class="form-control" autocomplete="off">
		        	</div>
		        	<div class="form-group">
		        		<label>Type</label>
		        		<select class="form-control" name="etype" id="etype">
		        			<option>select category type</option>
		        			<option value="Income">Income</option>
		        			<option value="Expense">Expense</option>
		        		</select>
		        	</div>
		        	<div class="form-group">
		        		<label>Status</label><br>
					<input type="radio" id="estatus" name="estatus" class="astatus" value="Active">&nbsp;Active
		   				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		   		<input type="radio" id="estatus" name="estatus" class="istatus" value="Inactive">&nbsp;Inactive
		        	</div>
		        </form>
			      </div>
		      <div class="modal-footer">
		        <button type="button" id="eback" class="btn btn-secondary" data-dismiss="modal">Back</button>
		        <button type="button" id="update" class="btn btn-primary">Update</button>
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
				url:"<?= base_url('admin/Category_con/get_cat'); ?>",
				type:"post",
				dataType:"json",
			
				success:function(data){
					// console.log(data);
					$('#tbl').DataTable( {
				        "data":data,
				        "columns": [
				            { "render": function(){
				            		return cnt++;
				            	}
				            },
				            { "data": "cname" },
				            { "data": "type" },
				            { "data": "status" },
				            { "render": function(data, type, row, meta){
				            	return `<a href='#' class='btn btn-success' id='edit' value='${row.cid}'>
			            				<i class="far fa-edit"></i>&nbsp;&nbsp;Edit</a>
			            				<a href='#' class='btn btn-danger' id='del' value='${row.cid}'>
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
		var cname = $('#cname').val();
		var type = $('#type').val();
		var status = $("input[name='status']:checked").val();

		// alert(status);
		if(cname == "" && type == "select category type"){
			toastr["error"]('Both fields are required');
		}
		else if(cname == ""){
			toastr["error"]('Categoty name field required');
		}
		else if(type == "select category type"){
			toastr["error"]('Categoty type field required');
		}
		else{
			$.ajax({
				url:"<?= base_url('admin/Category_con/insert_cat'); ?>",
				type:"post",
				dataType:"json",
				data:{
						cname:cname,
						type:type,
						status:status
				},
				success:function(data){
					console.log(data);
					if(data.status == "success"){
						toastr["success"](data.msg);
						$("#exampleModal").modal().hide();
						$(".modal-backdrop").hide();
						$('#tbl').DataTable().destroy();
						fetch();
						// window.location.href="<?= base_url('admin/Category_con'); ?>";
						$('#category_form')[0].reset();
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
                url:"<?= base_url('admin/Category_con/delete_cat'); ?>",
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

	$(document).on("click", "#edit", function(e){
        e.preventDefault();

        var id = $(this).attr("value");

        $.ajax({
          url: "<?= base_url('admin/Category_con/edit'); ?>",
          type: "post",
          dataType: "json",
          data: {
            eid:id
          },
          success: function(data){
          	console.log(data);
            if (data.response == "success"){
                $('#editModal').modal().show();
                $("#eid").val(data.editcat.cid);
                $("#ecname").val(data.editcat.cname);
                $("#etype").val(data.editcat.type);
                if(data.editcat.status == "Active"){
                	$('input:radio[name="estatus"]').filter('[value="Active"]').attr('checked', true);
                	// $("input[value='Active']").attr('checked',true);
                }
                else{
                	$('input:radio[name="estatus"]').filter('[value="Inactive"]').attr('checked', true);
                	// $("input[value='Inactive']").attr('checked',true);	
                }
              }else{
                toastr["error"](data.msg);
              }      
          }
        });
      });
	$(document).on("click","#eback",function(){
		$('input:radio[name="estatus"]').filter('[value="Active"]').attr('checked', false);
		$('input:radio[name="estatus"]').filter('[value="Inactive"]').attr('checked', false);
	});
	$(document).on("click", "#update", function(e){
        e.preventDefault();

        var eid = $("#eid").val();
        var ecname = $("#ecname").val();
        var etype = $("#etype").val();
        // var estatus = $("#estatus").val();
        var estatus = $("input[name='estatus']:checked").val();

        if(eid == "" || ecname == "" && etype == "select category type"){
			toastr["error"]('Both fields are required');
		}
		else if(ecname == ""){
			toastr["error"]('Categoty name field required');
		}
		else if(etype == "select category type"){
			toastr["error"]('Categoty type field required');
		}
        else{
          $.ajax({
            url: "<?= base_url('admin/Category_con/update'); ?>",
            type: "post",
            dataType: "json",
            data: {
              	cid:eid,
              	cname:ecname,
              	type:etype,
              	status:estatus
            },
            success: function(data){
            	// console.log(data);
	              if (data.status == "success") {
	                $('#tbl').DataTable().destroy();
	                fetch();
	                $('#editModal').modal().hide();
	                $(".modal-backdrop").hide();
	                toastr["success"](data.msg);
	              	$('#category_form')[0].reset();
	              }else{
	                toastr["error"](data.msg);
	              }
	            $('input:radio[name="estatus"]').filter('[value="Active"]').attr('checked', false);
				$('input:radio[name="estatus"]').filter('[value="Inactive"]').attr('checked', false);
            }
          });

        }

      });

	</script>
	<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>
</html>