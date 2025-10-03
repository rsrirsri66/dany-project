<?php
session_start();

include("url.php");   


    
?>
<!doctype html>
<html lang="en">

<?php include("head.php");?>

<body>
<style>
        .error-message {
            color: red;
            display: none;
        }
        .error {
            border-color: red;
        }
    </style>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
			<?php include("left.php");?>
		<!--end sidebar wrapper -->
		<!--start header -->
			<?php include("top.php");?>
		<!--end header -->
		<!--start page wrapper -->
   
		
		<div class="page-wrapper">
			<div class="page-content">
                
				
            <div class="page-title-box">
                
                <div class="page-title-right">
                    <h3 class="page-title">Quotation List</h3>
                   

                </div>
                   
            </div>

				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                           
                        <table id="customerTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>email</th>
                                    <th>Address</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
						</div>
					</div>
				</div>



                <!-- View Bill Modal -->
<div class="modal fade" id="viewBillModal" tabindex="-1" aria-labelledby="viewBillModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewBillModalLabel">Bill Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Customer Details -->
                <div class="mb-3">
                    <h6>Customer Information</h6>
                    <table class="table table-bordered">
                        <tr><th>Name</th><td id="cust_name"></td></tr>
                        <tr><th>Mobile</th><td id="cust_mobile"></td></tr>
                        <tr><th>Gst NO</th><td id="cust_balance"></td></tr>
                        <tr><th>Address</th><td id="cust_address"></td></tr>
                        <tr><th>Quotation No</th><td id="quotation_no"></td></tr>
                        <tr><th>Date</th><td id="date"></td></tr>
                        <tr><th>Valid Until Date</th><td id="valid_until_date"></td></tr>
                        <tr><th>Sub Total Amount</th><td id="sub_total_amount"></td></tr>
                        <tr><th>GST Amount</th><td id="gst_amount"></td></tr>
                        <tr><th>Transport</th><td id="transport"></td></tr>
                        <tr><th>Class  Extra</th><td id="class_extra"></td></tr>
                        <tr><th>Total amount</th><td id="total_amount"></td></tr>
                        
                    </table>
                </div>

                <!-- Product Details Table -->
                <h6>Product Details</h6>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Model Name</th>
                            <th>Design</th>
                            <th>Width 1</th>
                            <th>Width 2</th>
                            <th>Height 1</th>
                            <th>Height 2</th>
                            <th>Width FT</th>
                            <th>Height FT</th>
                            <th>Square FT</th>
                            <th>Quantity</th>
                            <th>Total Square FT</th>
                            <th>Amount</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody id="productDetailsTable"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

			</div><!--end page-content-->
		</div>
			
		<!--end page wrapper -->
		<!--start overlay-->
		 <?php include("footer.php"); ?>
	</div>
	<!--end wrapper-->


	



	<!--start switcher-->

	<!--end switcher-->
	<!-- Bootstrap JS -->
	<!-- Bootstrap JS -->

	<script src="<?php echo $bootsrapBundle; ?>"></script>
	<!--plugins-->
	<script src="<?php echo $js; ?>"></script>
	<script src="<?php echo $simplebar;?>"></script>
	<script src="<?php echo $mentimenu; ?>"></script>
	<script src="<?php echo $perfectScrolbar;  ?>"></script>
	<script src="<?php echo $datatableMin; ?>"></script>
	<script src="<?php echo $datatbaleBootstrap;?>"></script>
     <!-- Include Bootstrap JS (with Popper) -->
    <script src="<?php echo $popper;?>"></script>
    <script src="<?php echo $bootStackPath;?>"></script>
	<script src="<?php echo $sweetalert; ?>"></script>
    <!-- Include the function.js -->
     <script src="../assets/js/function.js"></script>

     <script>
$(document).ready(function() {
    $('#customerTable').DataTable({
        "processing": true,  // Show loading indicator
        "serverSide": true,  // Enable server-side processing
        "ajax": {
            "url": "action/contact/fetch_contact",  // Server script
            "type": "POST"
        },
        "pageLength": 10,  // Default records per page
        "lengthMenu": [10, 25, 50, 100], // Page size options
        "searching": true, // Enable search
        "ordering": true, // Enable sorting
        "columns": [
            { "data": "serial_no" },
            { "data": "name" },
            { "data": "mobile" },
            { "data": "email" },
            { "data": "address" },
            { "data": "message" },
            { "data": "action", "orderable": false, "searchable": false } // No sorting for actions
        ]
    });
});

</script>
<script>
    // <!-- Initialize tooltips -->
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
    


      <script>
        function goEdit(id) {
    $.ajax({
        url: 'action/customer/get_customer',
        method: 'POST',
        data: {
            empId: id
        },
        dataType: 'json', // Specify the expected data type as JSON
        beforeSend: function () {
                $("#loader").removeClass("d-none");
            },
        success: function(response) {
            $("#loader").addClass("d-none");
             
          $('#edit_id').val(response.id);
          $('#edit_fname').val(response.name);
          $('#edit_mobile').val(response.mobile);
          $('#edit_address').val(response.address);
          $('#edit_balance').val(response.balance);
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}


// Update customer details
$("#editEmployeeForm").on("submit", function (e) {
        e.preventDefault();

        if (!this.checkValidity()) {
            e.stopPropagation();
            $(this).addClass("was-validated");
            return;
        }

        $.ajax({
            url: "action/customer/update_customer",
            type: "POST",
            data: $("#editEmployeeForm").serialize(),
            beforeSend: function () {
                $(".btn-primary").prop("disabled", true).text("Updating...");
            },
            success: function (response) {
                $(".btn-primary").prop("disabled", false).text("Update Customer");

                var data = JSON.parse(response);
                if (data.status === "success") {
                    if (data.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: response.message,
                        timer: 2000
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
                    $("#editEmployeeModal").modal("hide");
                    $('#customerTable').DataTable().ajax.reload(null, false);
                } else {
                    alert("Error: " + data.message);
                }
            }
        });
    });



    function goDeleteEmployee(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'action/contact/delete_contact',
                method: 'POST',
                data: { deleteId: id },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: response.message,
                            timer: 2000
                        }).then(() => {
                            $('#customerTable').DataTable().ajax.reload(null, false);
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'AJAX Error!',
                        text: "Something went wrong: " + error
                    });
                }
            });
        }
    });
}

//Data Table script 
    </script>
	


	<!--app JS-->
	<script src="<?php echo $app; ?>"></script>
    <script>
$(document).ready(function(){
    // Topbar toggle button
    $('.mobile-toggle-menu').click(function(){
        $('.sidebar-wrapper').toggleClass('active');
        $('.page-wrapper').toggleClass('sidebar-collapsed');
    });

    // Sidebar header toggle button
    $('.sidebar-wrapper .toggle-icon').click(function(){
        $('.sidebar-wrapper').toggleClass('active');
        $('.page-wrapper').toggleClass('sidebar-collapsed');
    });
});
</script>
</body>

</html>