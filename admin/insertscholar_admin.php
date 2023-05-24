

<?php 

require('mysqli_connect.php');
// include("admin_auth.php");

// Check for form submission:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$errors = array(); // Initialize an error array.

    // If submit button is clicked ...
if (isset($_POST['submit'])) {

    $name = $_FILES["scholar_image"]["name"];
    $temp = $_FILES["scholar_image"]["tmp_name"];

    // Check if the uploaded file is an image
    $check = getimagesize($temp);
    if ($check === false) {
        $errors[] = "File is not an image.";
    }

    // Check file size (max 5 MB)
    if ($_FILES["scholar_image"]["size"] > 5000000) {
        $errors[] = "File is too large. Maximum size allowed is 5 MB.";
    }

    // Allow only certain file formats
    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
    $file_ext = pathinfo($name, PATHINFO_EXTENSION);
    if (!in_array($file_ext, $allowed_types)) {
        $errors[] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
    }

    // Create a unique name for the uploaded image file based on the current timestamp
    $timestamp = time();
    $image = $timestamp . '_' . $name;

    $target_dir="../upload_scholars/";
    $finalImage=$target_dir.$timestamp . '_' . $name;

    move_uploaded_file($temp, $finalImage);
}

    // Check for scholar title:
    if (empty($_POST['scholar_title'])) {
        $errors[] = 'You forgot to enter scholarship title.';
    } else {
        $scholar_title = trim($_POST['scholar_title']);
    }

    // Check for scholar descript:
    if (empty($_POST['scholar_descript'])) {
        $errors[] = 'You forgot to enter scholarship description.';
    } else {
        $scholar_descript = trim($_POST['scholar_descript']);
    }

    // Check for scholar date:
    if (empty($_POST['scholar_deadline'])) {
        $errors[] = 'You forgot to enter scholarship date.';
    } else {
        $scholar_deadline = trim($_POST['scholar_deadline']);
    }

    // Check for scholar link:
    if (empty($_POST['scholar_link'])) {
        $errors[] = 'You forgot to enter scholarship link.';
    } else {
        $scholar_link = trim($_POST['scholar_link']);
    }    


    if (empty($errors)) { // If everything's OK.

        // Enter scholar data in the database...

        // Make the query:
        $q = "INSERT INTO `scholar` (scholar_image, scholar_title, scholar_descript, scholar_deadline, scholar_link) 
              VALUES (?, ?, ?, ?, ?)";    
        $stmt = mysqli_prepare($dbc, $q);
        mysqli_stmt_bind_param($stmt, 'sssss', $image, $scholar_title, $scholar_descript, $scholar_deadline, $scholar_link);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) == 1) { // If it ran OK.

	
			// Display a message in a dialog box:
            echo "<script>alert('Thank you!\\nSCHOLARSHIP IS SUCCESFULLY INSERT');</script>";
            // Redirect to the view page after the deletion
            echo "<script>window.location.href = 'viewscholar_admin.php';</script>";
	
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
    <h2 class="mb-4">Insert Scholarship</h2>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <form name="insertbranch" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="scholar_image">Upload Scholarship:</label>
                    <input type="file" id="scholar_image" name="scholar_image" class="form-control" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="scholar_title">Scholarship Title</label>
                    <input type="text" id="scholar_title" name="scholar_title" class="form-control" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="scholar_descript">Scholarship Description</label>
                    <textarea rows="5" cols="50" name="scholar_descript" class="form-control" required></textarea>
                </div>

                <br>

                <div class="form-group">
                    <label for="scholar_deadline">Deadline:</label>
                    <input type="date" id="scholar_deadline" name="scholar_deadline" class="form-control" required>
                </div>

                <br>

                <div class="form-group">
                    <label for="scholar_link">Scholar Pagelink:</label>
                    <input type="text" id="scholar_link" name="scholar_link" class="form-control" required />
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