
<?php 

require('mysqli_connect.php');
// include("admin_auth.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // user is requesting the page with a GET request, initialize form fields
    $scholar_id = $_GET['scholar_id'];
    $scholar_title = '';
    $scholar_descript = '';
    $scholar_deadline = '';
    $scholar_link = '';
    
    // fetch scholar record from database and populate form fields if scholar_id is valid
    if (!empty($scholar_id)) {
        $query = "SELECT * FROM scholar WHERE scholar_id='$scholar_id'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($row) {
            $scholar_title = $row['scholar_title'];
            $scholar_descript = $row['scholar_descript'];
            $scholar_deadline = $row['scholar_deadline'];
            $scholar_link = $row['scholar_link'];
        }
    }
}

	// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $scholar_id = $_POST['scholar_id'];
    $scholar_title = $_POST['scholar_title'];
    $scholar_descript = $_POST['scholar_descript'];
    $scholar_deadline = $_POST['scholar_deadline'];
    $scholar_link = $_POST['scholar_link'];
    $scholar_image = $_FILES['scholar_image']['name'];

    // Check if a new image has been uploaded
    if ($scholar_image != '') {
        // Check if the uploaded file is an image
        $check = getimagesize($_FILES['scholar_image']['tmp_name']);
        if ($check === false) {
            $errors[] = "File is not an image.";
        }

        // Check file size (max 5 MB)
        if ($_FILES['scholar_image']['size'] > 5000000) {
            $errors[] = "File is too large. Maximum size allowed is 5 MB.";
        }

        // Allow only certain file formats
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        $file_ext = pathinfo($scholar_image, PATHINFO_EXTENSION);
        if (!in_array($file_ext, $allowed_types)) {
            $errors[] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        }

        // Move the uploaded file to the scholar_image directory
        $target_dir = "../upload_scholars/";
        $finalImage = $target_dir . $scholar_image;
        move_uploaded_file($_FILES['scholar_image']['tmp_name'], $finalImage);

        // Update the scholar with the new image
        $query = "UPDATE scholar SET scholar_title='$scholar_title', scholar_descript='$scholar_descript', scholar_deadline='$scholar_deadline', scholar_link='$scholar_link', scholar_image='$scholar_image' WHERE scholar_id='$scholar_id'";
    } else {
        // Update the scholar without changing the image
        $query = "UPDATE scholar SET scholar_title='$scholar_title', scholar_descript='$scholar_descript', scholar_deadline='$scholar_deadline', scholar_link='$scholar_link' WHERE scholar_id='$scholar_id'";
    }

    // Execute the query
    $result = mysqli_query($dbc, $query);

    // Check if the update was successful
    if ($result) {
        echo '<script>alert("Scholarship updated successfully.");</script>';
        // Redirect to the view page after the deletion
        echo "<script>window.location.href = 'viewscholar_admin.php';</script>";
    } else {
        echo '<script>alert("Error updating scholarship.");</script>';
        // Redirect to the view page after the deletion
        echo "<script>window.location.href = 'viewscholar_admin.php';</script>";
    }
}

// // Get the scholar_id from the URL parameter
// $scholar_id = $_GET['scholar_id'];

// Fetch the scholar record from the database
$query = "SELECT * FROM scholar WHERE scholar_id='$scholar_id'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

// Get the values from the fetched record
// $scholar_title = $row['scholar_title'];
// $scholar_descript = $row['scholar_descript'];
// $scholar_deadline = $row['scholar$scholar_deadline'];

// Display the edit form
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
    <h2 class="mb-4">Edit Scholarship</h2>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <form name="editscholar" action="editscholar_admin.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="scholar_id" value="<?php echo $scholar_id; ?>" />

                <div class="form-group">
                    <label for="scholar_image">Upload Scholarship:</label>
                    <input type="file" id="scholar_image" name="scholar_image" class="form-control" />
                </div>

                <br>

                <div class="form-group">
                    <label for="scholar_title">Scholarship Title</label>
                    <input type="text" id="scholar_title" name="scholar_title" class="form-control" value="<?php echo $scholar_title; ?>"required />
                </div>

                <br>

                <div class="form-group">
                    <label for="scholar_descript">Scholarship Description</label>
                    <textarea rows="5" cols="50" name="scholar_descript" class="form-control" require> <?php echo $scholar_descript; ?> </textarea>
                </div>

                <br>

                <div class="form-group">
                    <label for="scholar_deadline">Deadline:</label>
                    <input type="date" id="scholar_deadline" name="scholar_deadline" class="form-control" value="<?php echo $scholar_deadline; ?>" required>
                </div>

                <br>

                <div class="form-group">
                    <label for="scholar_link">Scholar Pagelink:</label>
                    <input type="text" id="scholar_link" name="scholar_link" class="form-control" value="<?php echo $scholar_link; ?>" required />
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