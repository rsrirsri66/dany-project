<?php
session_start();

include("url.php");  
include("db/dbConnection.php");  
  
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
        <?php include("form_video.php");?>
		
		<div class="page-wrapper">
			<div class="page-content">
                
				
            <div class="page-title-box">
                
                <div class="page-title-right">
                    <h3 class="page-title">Video List</h3>
                    <div class="position-relative" style="height: 80px;"> <!-- Adjust height as needed -->
                    <button type="button"  class="btn btn-primary position-absolute top-0 end-0" data-bs-toggle="modal" data-bs-target="#addFoodModal"><i class="lni lni-plus"></i>New Video</button>
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
                                    <th>Heading</th>
                                    <th>Video</th>
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
            "url": "action/video/fetch_video",  // Server script
            "type": "POST"
        },
        "pageLength": 10,  // Default records per page
        "lengthMenu": [10, 25, 50, 100], // Page size options
        "searching": true, // Enable search
        "ordering": true, // Enable sorting
        "columns": [
            { "data": "serial_no" },
            { "data": "heading" },
                 { 
                "data": "video",
                "orderable": false,
                "searchable": false,
                "render": function(data, type, row) {
                    if (data) {
                        return '<video class="video-preview" width="200" height="120" src="' + data + '" controls></video>';
                    } else {
                        return '<span class="text-muted">No video</span>';
                    }
                }
            },
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
            url: 'action/video/insert_video',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('.btn-primary').prop('disabled', true).text('Processing...');
            },
            success: function (response) {
                $('.btn-primary').prop('disabled', false).text('Add video');
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
                $('.btn-primary').prop('disabled', false).text('Add video');
            }
        });
    });
    });

    </script>

      <script>
        function goEdit(id) {
    $.ajax({
        url: 'action/video/get_video',
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
          $('#edit_product').val(response.heading);

        $('#old_video').attr('src',  response.video);
       
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
        url: "action/video/update_video",
        type: "POST",
        data: formData,
        processData: false, // Important for file upload
        contentType: false, // Important for file upload
        beforeSend: function () {
            $(".btn-primary").prop("disabled", true).text("Updating...");
        },
        success: function (response) {
            $(".btn-primary").prop("disabled", false).text("Update video");
            let data = JSON.parse(response);

            if (data.status === "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: data.message,
                    timer: 1500
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
            $(".btn-primary").prop("disabled", false).text("Update video");
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
                url: 'action/video/delete_video',
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


function toggleStatus(id, currentStatus) {
    let newStatus = (currentStatus === 'Active') ? 'Inactive' : 'Active';
    if (confirm("Do you want to change status to " + newStatus + "?")) {
        $.ajax({
            url: "action/video/toggle_status.php",
            type: "POST",
            data: { id: id, status: newStatus },
            success: function (response) {
                let res = JSON.parse(response);
                if (res.status === "success") {
                    alert("Status changed to " + newStatus);
                    $('#productTable').DataTable().ajax.reload(null, false); // reload table without reset page
                } else {
                    alert(res.message);
                }
            }
        });
    }
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