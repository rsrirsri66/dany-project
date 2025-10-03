<?php 
       if(!isset($_SESSION['username']))
    {
        header("Location:loginpage.php");
    } 
   
		
?>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/zenvic.png" type="image/png"/>
	<!--plugins-->
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet"/>
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	 
	
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css"/>
	<link rel="stylesheet" href="assets/css/semi-dark.css"/>
	<link rel="stylesheet" href="assets/css/header-colors.css"/>
	<!-- Include Quill's CSS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href='https://cdn.jsdelivr.net/npm/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<!-- Import Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

	
	<title>Zenview</title>   
	
	<style>

        .metismenu li.active > a {
    background: #0d6efd;   /* Blue background (Bootstrap primary) */
    color: #fff;           /* White text */
    border-radius: 8px;    /* Optional rounded look */
}

.metismenu li.active i {
    color: #fff;           /* Icon color */
}
		.modal-body {
    padding: 1.5rem; /* Increase padding for a better look */
}

.card {
    border: 1px solid #e0e0e0; /* Add a light border */
}

.card-title {
    font-weight: bold;
    color: #007bff; /* Change the title color to Bootstrap's primary */
}

.card-text {
    margin-bottom: 0.5rem; /* Add spacing between text */
}

  /* Custom styles for the modal text */
  #viewEnquireModal .form-text {
            font-size: 1.2rem; /* Adjust this value as needed */
        }
        
        #viewEnquireModal .modal-title {
            font-size: 1.5rem; /* Adjust the title size as needed */
        }

        /* You can also increase the size for the labels if needed */
        #viewEnquireModal .form-label {
            font-size: 1.1rem; /* Adjust this value as needed */
        }
        
        /* Loader overlay to cover the entire screen */
#loader {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    display: none; /* Initially hidden */
    z-index: 9998; /* Ensure loader is above background but behind modal */
}

/* Center the loader spinner */
/*  */

/* Spinner size */
.spinner-border {
    width: 3rem;
    height: 3rem;
}
 /* <!-- Custom CSS --> */
 
        /* Apply Poppins font globally */
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 14px; /* Optional: Set a default font size */
            line-height: 1.6; /* Optional: Improve readability */
        }

        /* Ensure headings and strong text inherit */
        h1, h2, h3, h4, h5, h6, strong {
            font-weight: 600;
        }

        /* Add styling for tables */
        table {
            font-size: 12px; /* Optional: Adjust table text size */
        }
        .custom-input {
    height: 30px !important; /* Reduce height */
    font-size: 14px; /* Adjust font size */
    padding: 2px 6px; /* Adjust padding */
    }
    

    @media (max-width: 768px) {
  table thead {
    display: none;
  }
  table, table tbody, table tr, table td {
    display: block;
    width: 100%;
  }
  table tr {
    margin-bottom: 1rem;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 8px;
    background: #f9f9f9;
  }
  table td {
    text-align: right;
    padding-left: 50%;
    position: relative;
  }
  table td::before {
    content: attr(data-label);
    position: absolute;
    left: 10px;
    text-align: left;
    font-weight: bold;
  }
}
/* Sidebar styles */
.sidebar-wrapper {
    width: 250px;
    height: 100vh;
    background: #1f1f1f;
    color: #fff;
    position: fixed;
    top: 0;
    left: 0;
    transition: all 0.3s ease;
    overflow-y: auto;
    z-index: 1000;
    margin-top: 60px;
}

.sidebar-wrapper.active {
    margin-left: -250px; /* Hide sidebar */
}

.sidebar-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 20px;
    border-bottom: 1px solid #333;
    
}

.sidebar-header .logo-text {
    font-size: 20px;
    font-weight: bold;
}

.sidebar-header .toggle-icon {
    font-size: 24px;
    cursor: pointer;
}

.sidebar-wrapper ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-wrapper ul li {
    padding: 12px 20px;
}

.sidebar-wrapper ul li a {
    color: #fff;
    text-decoration: none;
    display: flex;
    align-items: center;
}

.sidebar-wrapper ul li a:hover {
    background: #333;
    border-radius: 5px;
    padding: 5px;
}

.sidebar-wrapper ul li i {
    margin-right: 10px;
}

/* Page wrapper */
.page-wrapper {
    margin-left: 250px;
    transition: all 0.3s ease;
    padding: 20px;
}

.page-wrapper.sidebar-collapsed {
    margin-left: 0px;
}

/* Topbar */
.topbar {
    height: 60px;
    background: #fff;
    display: flex;
    align-items: center;
    padding: 0 20px;
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 999;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.topbar .mobile-toggle-menu {
    font-size: 24px;
    cursor: pointer;
}


/* Responsive */
@media (max-width: 768px) {
    .sidebar-wrapper {
        margin-left: -250px;
    }
    .sidebar-wrapper.active {
        margin-left: 0;
    }
    .page-wrapper {
        margin-left: 0;
    }
  
}
/* Active menu item */
.sidebar-wrapper ul li.active a {
    background-color: #0d6efd;  /* Bootstrap primary blue */
    color: #fff;
    font-weight: 600;
    border-radius: 8px;
    padding: 5px;
}

/* Change icon color as well */
.sidebar-wrapper ul li.active a i {
    color: #fff;
}

	</style>

</head>