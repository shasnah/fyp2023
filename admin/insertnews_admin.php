

<?php 

require('mysqli_connect.php');
include("admin_auth.php");

// Check for form submission:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$errors = array(); // Initialize an error array.

    // If submit button is clicked ...
if (isset($_POST['submit'])) {

    $name = $_FILES["news_image"]["name"];
    $temp = $_FILES["news_image"]["tmp_name"];

    // Check if the uploaded file is an image
    $check = getimagesize($temp);
    if ($check === false) {
        $errors[] = "File is not an image.";
    }

    // Check file size (max 5 MB)
    if ($_FILES["news_image"]["size"] > 5000000) {
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

    $target_dir="../upload_news/";
    $finalImage=$target_dir.$timestamp . '_' . $name;

    move_uploaded_file($temp, $finalImage);
}

    // Check for news title:
    if (empty($_POST['news_title'])) {
        $errors[] = 'You forgot to enter news title.';
    } else {
        $news_title = trim($_POST['news_title']);
    }

    // Check for news descript:
    if (empty($_POST['news_descript'])) {
        $errors[] = 'You forgot to enter news description.';
    } else {
        $news_descript = trim($_POST['news_descript']);
    }

    // Check for news date:
    if (empty($_POST['news_date'])) {
        $errors[] = 'You forgot to enter news date.';
    } else {
        $news_date = trim($_POST['news_date']);
    }


    if (empty($errors)) { // If everything's OK.

        // Enter news data in the database...

        // Make the query:
        $q = "INSERT INTO `news` (news_image, news_title, news_descript, news_date) 
              VALUES (?, ?, ?, ?)";    
        $stmt = mysqli_prepare($dbc, $q);
        mysqli_stmt_bind_param($stmt, 'ssss', $image, $news_title, $news_descript, $news_date);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) == 1) { // If it ran OK.

	
			// Display a message in a dialog box:
            echo "<script>alert('Thank you!\\nNEWS IS SUCCESFULLY INSERT');</script>";
            // Redirect to the view page after the deletion
            echo "<script>window.location.href = 'viewnews_admin.php';</script>";
	
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
    <h2 class="mb-4">Insert News & Events</h2>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <form name="insertnews" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="news_image">Upload News:</label>
                    <input type="file" id="news_image" name="news_image" class="form-control" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="news_title">Title:</label>
                    <input type="text" id="news_title" name="news_title" class="form-control" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="news_descript">Description:</label>
                    <textarea rows="5" cols="50" name="news_descript" class="form-control" required></textarea>
                </div>

                <br>

                <div class="form-group">
                    <label for="news_date">Date Post:</label>
                    <input type="date" id="news_date" name="news_date" class="form-control" required>
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

</body>
</html>