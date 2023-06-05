

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

<?php
 
 require('mysqli_connect.php');
 include("admin_auth.php");
 
 
 // Check for a valid scholar ID, through GET or POST: 
 if ((isset($_GET['scholar_id'])) && (is_numeric($_GET['scholar_id']))) { 
     $scholar_id = $_GET['scholar_id']; 
 } elseif ((isset($_POST['scholar_id'])) && (is_numeric($_POST['scholar_id']))) { // Form submission. 
     $scholar_id = $_POST['scholar_id']; 
 } else { // No valid ID, kill the script. 
    //  echo '<div class="alert alert-danger" role="alert">This page has been accessed in error.</div>';
     echo '<script>alert("This page has been accessed in error.");</script>'; 
     exit(); 
 }      
 
 // Check if the form has been submitted:
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     if ($_POST['sure'] == 'Yes') { // Delete the record.
         // Prepare the query:
         $q = "DELETE FROM scholar WHERE scholar_id = ?";
         $stmt = mysqli_prepare($dbc, $q);
         mysqli_stmt_bind_param($stmt, "i", $scholar_id);
         mysqli_stmt_execute($stmt);
         if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
             // Show an alert dialog box with the message:
             echo '<script>alert("The scholarship has been deleted.");</script>';
             // Redirect to the view page after the deletion
            echo "<script>window.location.href = 'viewscholar_admin.php';</script>";
         } else { // If the query did not run OK.
            //  echo '<div class="alert alert-danger" role="alert">The scholar could not be deleted due to a system error.</div>'; // Public message.
             echo '<script>alert("The scholarship could not be deleted due to a system error.");</script>';
             echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
         }  
     } else { // No confirmation of deletion.
            echo '<script>alert("The scholarship has NOT been deleted.");</script>';
            // Redirect to the view page after the deletion
            echo "<script>window.location.href = 'viewscholar_admin.php';</script>";
     }

 } else { // Show the form.
     // Retrieve the scholar information:
     $q = "SELECT * FROM scholar WHERE scholar_id = $scholar_id";
     $r = @mysqli_query($dbc, $q);
     if (mysqli_num_rows($r) == 1) { // Valid scholar ID, show the form.
         // Get the scholar information:
         $row = mysqli_fetch_array($r, MYSQLI_ASSOC);

         // Display the record being deleted:
         echo '<div class="form_delete">';
         echo '<h2><b>DELETE SCHOLARSHIP</b></h2>'; 
         echo '<h4>Scholarship: ' . $row['scholar_title'] . '</h4>';
         echo '<p>Are you sure you want to delete this scholarship?</p>';
         // Create the form:
         echo '<form action="deletescholar_admin.php?scholar_id=' . $scholar_id . '" method="post">';
         echo '<div class="form-check">';
         echo '<input class="form-check-input" type="radio" name="sure" value="Yes" id="yes" />';
         echo '<label class="form-check-label" for="yes">Yes</label>';
         echo '</div>';
         echo '<div class="form-check">';
         echo '<input class="form-check-input" type="radio" name="sure" value="No" id="no" checked="checked" />';
         echo '<label class="form-check-label" for="no">No</label>';
         echo '</div>';
         echo '<button type="submit" class="btn btn-danger mt-3">Submit</button>';
         echo '<input type="hidden" name="scholar_id" value="' . $scholar_id . '" />';
         echo '</form>';
         echo '</div>';
	  
	  } else { // Not a valid user ID.
        echo '<script>alert("This page has been accessed in error");</script>';
	  }
  
  } // End of the main submission conditional.
  
mysqli_close($dbc); //Close the database connection.

?> 

<footer class="text-center py-3">
    <p>&copy; 2023 Siti Nor Hasnah, All Rights Reserved</p>
</footer>


