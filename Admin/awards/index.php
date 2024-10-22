<?php 
require_once __DIR__ . '/../../lib/csv_read_function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Hiric</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="bootstrap 5, premium, marketing, multipurpose" />
    <meta content="Themesbrand" name="author" />
    <!-- favicon -->
    <link rel="shortcut icon" href="../../images/favicon.ico" />

    <!-- css -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- icon -->
    <link href="../../css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/pe-icon-7-stroke.css" />

    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/colors/cyan.css" id="color-opt">
    
    <style>
        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 70px; /* Height of the navbar */
            left: 0;
            width: 200px; /* Width of the sidebar */
            height: calc(100% - 70px); /* Full height minus the navbar */
            background-color: #f8f9fa; /* Light background */
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
        }
    </style>
</head>

<body data-bs-theme="light">

    <!-- START NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-white navbar-custom sticky sticky-white" role="navigation"
        id="navbar">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo text-uppercase" href="index.php">
                <i class="mdi mdi-alien"></i>Hiric
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu text-dark"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav navbar-center" id="navbar-navlist">
                    <li class="nav-item">
                        <a data-scroll href="../../index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="../../Admin.php" class="nav-link">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->

    <!-- START SIDEBAR -->
    <div class="sidebar">
        <h5>Admin Edit Awards</h5>
		<a href="../../Admin.php">Admin Home</a>
		<a href="../pages/index.php">Pages</a>
        <a href="../team/index.php">Team</a>
        <a href="../awards/index.php">Awards</a>
        <a href="../products/index.php">Products</a>
        <a href="../contacts/index.php">Contacts</a>
    </div>
    <!-- END SIDEBAR -->
    
    <!-- START MAIN CONTENT -->
    <div class="container" style="margin-left: 220px; margin-top: 150px;">
		<div class="text-end mb-4">
			<a href="create.php" class="btn btn-primary create-btn">Create</a> 
		</div>
		<h1> Awards </h1>
		<?php
			$CSVFile = 'Awards.csv';
			$awards = readCSVFile($CSVFile);
		?>
		<table class="table table-bordered">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Award name</th>
        			<th>Action</th>
        		</tr>
        	</thead>
            <tbody>
            <?php foreach ($awards as $index => $award) { ?>
            	<tr>
            		<td><?php echo $index + 1; ?></td>
            		<td><a href="detail.php?index=<?php echo $index ?>"><?= htmlspecialchars($award['Award']); ?></a></td>
            		<td><a href="detail.php?index=<?php echo $index ?>" class="btn btn-warning">Detail</a></td>
            	</tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- END MAIN CONTENT -->
    
    <!-- javascript -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/smooth-scroll.polyfills.min.js"></script>
    <script src="js/gumshoe.polyfills.min.js"></script>
    <!-- Main Js -->
    <script src="js/app.js"></script>
	
</body>

</html>