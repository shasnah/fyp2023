
<?php 

require('mysqli_connect.php');
include("admin_auth.php");

// Retrieve branch data from the database
$query = "SELECT branch_id, branch_abbre FROM branches";
$result = mysqli_query($dbc, $query);

// Check if the query executed successfully
if ($result) {
    // Create an array to store the branch data
    $branches = array();

    // Fetch the result rows and store the data in the branches array
    while ($row = mysqli_fetch_assoc($result)) {
        $branches[$row['branch_id']] = $row['branch_abbre'];
    }

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the query error
    echo "<script>alert('Error fetching branch data. Please try again.');</script>";
}

// Check for form submission:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$errors = array(); // Initialize an error array.

    // Check for branch full name:
    if (empty($_POST['course_level'])) {
        $errors[] = 'You forgot to enter level of study.';
    } else {
        $course_level = trim($_POST['course_level']);
    }

    // Check for branch abbreviation:
    if (empty($_POST['course_name'])) {
            $errors[] = 'You forgot to enter course name.';
    } else {
         $course_name = trim($_POST['course_name']);
    }

    // Check for field of study:
    if (empty($_POST['course_descript'])) {
        $errors[] = 'You forgot to enter course description.';
    } else {
        $course_descript = trim($_POST['course_descript']);
    }

    // Check for course specialization:
    if (empty($_POST['course_special'])) {
        $errors[] = 'You forgot to enter course specialization.';
    } else {
        $course_special = trim($_POST['course_special']);
    }

    // Check for course entry:
    if (empty($_POST['course_entry'])) {
        $errors[] = 'You forgot to enter course entry requirement.';
    } else {
        $course_entry = trim($_POST['course_entry']);
    }

    $branch_id = $_POST['branch_id'];

    if (empty($errors)) { // If everything's OK.

        // Enter branches data in the database...

        // Make the query:
        $q = "INSERT INTO `courses` (course_level, course_name, course_descript, course_special, course_entry, branch_id) 
              VALUES (?, ?, ?, ?, ?, ?)";    
        $stmt = mysqli_prepare($dbc, $q);
        mysqli_stmt_bind_param($stmt, 'sssssi', $course_level, $course_name, $course_descript, $course_special, $course_entry, $branch_id);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) == 1) { // If it ran OK.

	
			// Display a message in a dialog box:
            echo "<script>alert('Thank you!\\nCOURSE IS SUCCESFULLY INSERT');</script>";
	
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

        // Redirect to the view page after the update
        echo "<script>window.location.href = 'viewcourse_admin.php';</script>";
	  
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
    <h2 class="mb-4">Insert UniKL Courses</h2>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <form name="insertcourse" action="" method="post">
                
            <div class="form-group">
                <label for="branch_id">UniKL Branch:</label>
                <select class="form-control" id="branch_id" name="branch_id">
                    <?php
                        // Populate the dropdown with branch data
                        foreach ($branches as $branch_id => $branch_abbre) {
                            echo "<option value=\"$branch_id\">$branch_abbre</option>";
                        }
                    ?>
                </select>
            </div>

                <br>

                <div class="form-group">
                    <label for="course_level">Level of Study:</label>
                    <input type="text" id="course_level" name="course_level" class="form-control" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="course_name">Course Name:</label>
                    <input type="text" id="course_name" name="course_name" class="form-control" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="course_descript">Course Description:</label>
                    <textarea rows="5" cols="50" name="course_descript" class="form-control" required></textarea>
                </div>

                <br>

                <div class="form-group">
                    <label for="course_special">Specialization:</label>
                    <input type="text" id="course_special" name="course_special" class="form-control" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="course_entry">Entry Requirement:</label>
                    <textarea rows="5" cols="50" name="course_entry" class="form-control" required></textarea>
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