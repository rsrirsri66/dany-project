<!doctype html>
<html lang="en">
<?php   session_start();
include("db/dbConnection.php");
include("url.php");
 include("head.php");?>

<body>
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
				
				

				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
					<div class="col">
					    <a href="#">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Images</p>
										<h4 class="my-1">
										<?php
											$selEmp = "SELECT COUNT(*) as total FROM `images` WHERE status='Active';";
											$resultEmp = $conn->query($selEmp);

											if ($resultEmp) {
												$rowEmp = $resultEmp->fetch_assoc();
												$empCount = $rowEmp['total'];
												echo $empCount;
											} else {
												echo "Error: " . $conn->error;
											}
											?>
										</h4>
										<!-- <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i>$34 from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-id-card"></i>
									</div>
								</div>
							</div>
						</div>
						</a>
					</div>
					
					
					
					
				
					
					
											
					
					
					<div class="col">
					    <a href="#">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Videos</p>
										<h4 class="my-1">
										<?php
											$selEmp = "SELECT COUNT(*) as total FROM `video` WHERE status='Active';";

												
                                              
											$resultEmp = $conn->query($selEmp);

											if ($resultEmp) {
												$rowEmp = $resultEmp->fetch_assoc();
												$empCount = $rowEmp['total'];
                                                echo $empCount;
											} else {
												echo "Error: " . $conn->error;
											}
											?>
										</h4>
										<!-- <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>12.2% from last week</p> -->
									</div>
								<div class="text-warning ms-auto font-35"><i class='bx bxs-folder'></i>
									</div>
								</div>
							</div>
						</div>
						</a>
					</div>
					
				</div>

				
				<!--end row-->
				
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		 <?php include("footer.php"); ?>
	</div>
	<!--end wrapper-->



	<!--start switcher-->
	
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="<?php echo $bootsrapBundle; ?>"></script>
	<!--plugins-->
	<script src="<?php echo $js; ?>"></script>
	<script src="<?php echo $simplebar;?>"></script>
	<script src="<?php echo $mentimenu; ?>"></script>
	<script src="<?php echo $perfectScrolbar;  ?>"></script>
	<script src="<?php echo $charts;  ?>"></script>
	<script src="<?php echo $datatableMin; ?>"></script>
	<script src="<?php echo $datatbaleBootstrap;?>"></script>
	
	<script src="<?php echo $index;?>"></script>
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