<!DOCTYPE html>
<html>
<head>
	<title>close deal</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('./Assets/css/style.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('./Assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/					bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>
<body>
	<br><h1>Close Deals</h1><br>
	<a href="<?= base_url('admin/Loan_con/');?>" class="btn btn-primary col-2">
		<i class="fas fa-arrow-left" style="font-size: 22px;margin-top: 5px;"></i></a>
	<br><br>
	<div class="table-responsive">
		<table class="table" style="text-align: center;" id="tbl">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
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

			function fetch(){
			var cnt = 1;
			$.ajax({
				url:"<?= base_url('admin/Loan_con/get_close_deal'); ?>",
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
				            return `<a href='#' class='btn btn-danger' id='del' value='${row.close_id}'>
				            			&nbsp;<i class="fas fa-trash-alt"></i>&nbsp;Delete</a>
			            				`;
				            	} 
				        	},
				        ]
				    });
				}
			});	
		}
		fetch();
		
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
                url:"<?= base_url('admin/Loan_con/delete_close_deal'); ?>",
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
		});

	</script>

	<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>
</html>