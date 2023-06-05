
<?php 

require('mysqli_connect.php');
include("admin_auth.php");

// Check for form submission:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$errors = array(); // Initialize an error array.

    // Check for advisor fname:
    if (empty($_POST['advisor_fname'])) {
        $errors[] = 'You forgot to enter advisor first name.';
    } else {
        $advisor_fname = trim($_POST['advisor_fname']);
    }

    // Check for advisor lname:
    if (empty($_POST['advisor_lname'])) {
        $errors[] = 'You forgot to enter advisor last name.';
    } else {
        $advisor_lname = trim($_POST['advisor_lname']);
    }

    // Check for advisor department:
    if (empty($_POST['advisor_depart'])) {
        $errors[] = 'You forgot to enter advisor department.';
    } else {
        $advisor_depart = trim($_POST['advisor_depart']);
    }

    // Check for advisor email:
    if (empty($_POST['advisor_email'])) {
        $errors[] = 'You forgot to enter advisor email.';
    } else {
        $advisor_email = trim($_POST['advisor_email']);
    }

    if (empty($errors)) { // If everything's OK.

        // Enter news data in the database...

        // Make the query:
        $q = "INSERT INTO `advisor` (advisor_fname, advisor_lname, advisor_depart, advisor_email) 
              VALUES (?, ?, ?, ?)";    
        $stmt = mysqli_prepare($dbc, $q);
        mysqli_stmt_bind_param($stmt, 'ssss', $advisor_fname, $advisor_lname, $advisor_depart, $advisor_email);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) == 1) { // If it ran OK.

	
			// Display a message in a dialog box:
            echo "<script>alert('Thank you!\\nADVISOR IS SUCCESFULLY INSERT');</script>";
            // Redirect to the view page after the deletion
            echo "<script>window.location.href = 'viewadvisor_admin.php';</script>";
	
		  }
	
		} else { // Report the errors.
		  echo $q;
          $error_message = "Error! The following error(s) occurred:\n";
          foreach ($errors as $msg) { // Add each error to the message.
              $error_message .= " - $msg\n";
          }
          $error_message .= "\nPlease try again.";
          echo "<script>window.alert('$error_message');</script>";
			
		  } // End of if (empty($errors)) IF.
		  mysqli_close($dbc); // Close the database connection.
	  
	  } // End of the main Submit conditional
	
	?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf=8">
    <title> Admin </title>

     <!-- Link fo css file -->
    <link rel="stylesheet" href="admin_content.css" /> 
    

    <!-- Link for bootstrap file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

<!-- Link for bootstrap file -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!-- Navigation menu -->
    
<div class="sidebar" id="mySidebar">
    <img class="admin" src="../admin/media/logo.png" alt="Admin Image">
    <h5> Welcome Admin </h5>
	<a href="admin_dashboard.php">Dashboard</a>
	<a href="viewnews_admin.php">News & Events</a>
	<a href="viewbranch_admin.php">UniKL Branches</a>
	<a href="viewcourse_admin.php">UniKL Courses</a>
    <a href="viewscholar_admin.php">Scholarships</a>
    <a href="viewadvisor_admin.php">Academic Advisor</a>
    <a href="admin_logout.php" class="logout" >Logout</a>

	<button class="closebtn" onclick="closeNav()">×</button>
</div>

<button class="openbtn" onclick="openNav()">☰</button>

<script>
	function openNav() {
	  document.getElementById("mySidebar").style.width = "250px";
	}

	function closeNav() {
	  document.getElementById("mySidebar").style.width = "0";
	}
</script>

<!-- End of navigation menu -->

<!-- <header class="header">
<h3> Admin </h3>
</header> -->

<div class="container mt-4">
    <h2 class="mb-4">Insert Academic Advisor</h2>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <form name="insertadvisor" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label for="advisor_fname">First Name:</label>
                    <input type="text" id="advisor_fname" name="advisor_fname" class="form-control" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="advisor_lname">Last Name:</label>
                    <input type="text" id="advisor_lname" name="advisor_lname" class="form-control" required />
                </div>

                <br>
                <div class="form-group">
                    <label for="advisor_depart">Department:</label>
                    <input type="text" id="advisor_depart" name="advisor_depart" class="form-control" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="advisor_email">Email:</label>
                    <input type="email" id="advisor_email" name="advisor_email" class="form-control" required />
                </div>

                <br>

                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<footer class="text-center py-3">
    <p>&copy; 2023 Siti Nor Hasnah, All Rights Reserved</p>
</footer>