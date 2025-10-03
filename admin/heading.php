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
        <?php include("form_heading.php");?>
		
		<div class="page-wrapper">
			<div class="page-content">
                
				
            <div class="page-title-box">
                
                <div class="page-title-right">
                    <h3 class="page-title">Heading List</h3>
                    <div class="position-relative" style="height: 80px;"> <!-- Adjust height as needed -->
                    <button type="button"  class="btn btn-primary position-absolute top-0 end-0" data-bs-toggle="modal" data-bs-target="#addFoodModal"><i class="lni lni-plus"></i>New Heading</button>
                    </div>

                </div>
                   
            </div>

				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                           
                        <table id="productTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>Name</th>
                                    <!-- <th>Food Type</th> -->
                                    <!-- <th>Category </th>
                                    <th>Price</th>
                                    <th>Image</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
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
        // Declare table as a global variable
var table;

$(document).ready(function() {
     table = $('#productTable').DataTable({
        "processing": true,  // Show loading indicator
        "serverSide": true,  // Enable server-side processing
        "ajax": {
            "url": "action/heading/fetch_heading",  // Server script
            "type": "POST"
        },
        "pageLength": 10,  // Default records per page
        "lengthMenu": [10, 25, 50, 100], // Page size options
        "searching": true, // Enable search
        "ordering": true, // Enable sorting
        "columns": [
            { "data": "serial_no" },
            { "data": "name" },
            // { "data": "food_type" },
            // { "data": "category" },
            // { "data": "price" },
            // { 
            //     "data": "name",
            //     "orderable": false, // Disable sorting for images
            //     "searchable": false
            // },
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

   

    $(document).ready(function () {
    $('#addFoodForm').on('submit', function (e) {
        e.preventDefault();

        // Bootstrap validation
        if (!this.checkValidity()) {
            e.stopPropagation();
            $(this).addClass('was-validated');
            return;
        }

        // Form data
        var formData = new FormData(this);

        $.ajax({
            url: 'action/heading/insert_heading',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('.btn-primary').prop('disabled', true).text('Processing...');
            },
            success: function (response) {
                $('.btn-primary').prop('disabled', false).text('Add Heading');
                var data = JSON.parse(response);

                if (data.status === 'success') {
                      // Show SweetAlert based on the response
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
                $("#addFoodModal").modal("hide");
                    $('#addFoodForm')[0].reset();
                    $('#addFoodForm').removeClass('was-validated');
                    table.ajax.reload(null, false); // Reload DataTable
                } else {
                    alert('Error: ' + data.message);
                }
            },
            error: function () {
                alert('Unexpected error occurred.');
                $('.btn-primary').prop('disabled', false).text('Add Heading');
            }
        });
    });
    });

    </script>

      <script>
        function goEdit(id) {
    $.ajax({
        url: 'action/heading/get_heading',
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
             
          $('#edit_food_id').val(response.id);
          $('#edit_name').val(response.heading);
        //   $('#edit_food_type').val(response.food_type);
        //   $('#edit_category').val(response.category);
        //   $('#edit_price').val(response.price);
           // Display existing image
        //    if (response.food_image) {
        //         $("#edit_food_preview").attr("src", response.food_image).removeClass("d-none");
        //     } else {
        //         $("#edit_food_preview").addClass("d-none"); // Hide preview if no image
        //     }
       
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}


$("#editFoodForm").on("submit", function (e) {
    e.preventDefault();

    if (!this.checkValidity()) {
        e.stopPropagation();
        $(this).addClass("was-validated");
        return;
    }

    let formData = new FormData(this); // Use FormData for file upload

    $.ajax({
        url: "action/heading/update_heading",
        type: "POST",
        data: formData,
        processData: false, // Important for file upload
        contentType: false, // Important for file upload
        beforeSend: function () {
            $(".btn-primary").prop("disabled", true).text("Updating...");
        },
        success: function (response) {
            $(".btn-primary").prop("disabled", false).text("Update Heading");
            let data = JSON.parse(response);

            if (data.status === "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: data.message,
                    timer: 2000
                });

                $("#editFoodModal").modal("hide");
                $("#editFoodForm")[0].reset(); // Reset form after success
                $("#editFoodForm").removeClass("was-validated");
                table.ajax.reload(null, false); // Reload DataTable
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message
                });
            }
        },
        error: function () {
            $(".btn-primary").prop("disabled", false).text("Update Heading");
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "Unexpected error occurred. Please try again later."
            });
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
                url: 'action/heading/delete_heading',
                method: 'POST',
                data: { deleteId: id },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            // text: response.message,
                            timer: 2000
                        }).then(() => {
                            table.ajax.reload(null, false); // Reload DataTable

                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            // text: response.message
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