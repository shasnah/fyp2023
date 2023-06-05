
<?php 

require('mysqli_connect.php');
include("admin_auth.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // user is requesting the page with a GET request, initialize form fields
    $branch_id = $_GET['branch_id'];
    $branch_fname = '';
    $branch_abbre = '';
    $branch_field = '';
    $branch_address = '';
    $branch_phone= '';
    
    // fetch branches record from database and populate form fields if branch_id is valid
    if (!empty($branch_id)) {
        $query = "SELECT * FROM branches WHERE branch_id='$branch_id'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($row) {
            $branch_fname = $row['branch_fname'];
            $branch_abbre = $row['branch_abbre'];
            $branch_field = $row['branch_field'];
            $branch_address = $row['branch_address'];
            $branch_phone = $row['branch_phone'];
        }
    }
}

	// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $branch_id = $_POST['branch_id'];
    $branch_fname = $_POST['branch_fname'];
    $branch_abbre = $_POST['branch_abbre'];
    $branch_field = $_POST['branch_field'];
    $branch_address = $_POST['branch_address'];
    $branch_phone = $_POST['branch_phone'];
    $branch_image = $_FILES['branch_image']['name'];

    // Check if a branch image has been uploaded
    if ($branch_image != '') {
        // Check if the uploaded file is an image
        $check = getimagesize($_FILES['branch_image']['tmp_name']);
        if ($check === false) {
            $errors[] = "File is not an image.";
        }

        // Check file size (max 5 MB)
        if ($_FILES['branch_image']['size'] > 5000000) {
            $errors[] = "File is too large. Maximum size allowed is 5 MB.";
        }

        // Allow only certain file formats
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        $file_ext = pathinfo($branch_image, PATHINFO_EXTENSION);
        if (!in_array($file_ext, $allowed_types)) {
            $errors[] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        }

        // Move the uploaded file to the branch_image directory
        $target_dir = "../upload_branches/";
        $finalImage = $target_dir . $branch_image;
        move_uploaded_file($_FILES['branch_image']['tmp_name'], $finalImage);

        // Update the branches with the branch image
        $query = "UPDATE branches SET branch_fname='$branch_fname', branch_abbre='$branch_abbre', branch_field='$branch_field', branch_address='$branch_address', branch_phone='$branch_phone', branch_image='$branch_image' WHERE branch_id='$branch_id'";
    } else {
        // Update the branch without changing the image
        $query = "UPDATE branches SET branch_fname='$branch_fname', branch_abbre='$branch_abbre', branch_field='$branch_field', branch_address='$branch_address', branch_phone='$branch_phone' WHERE branch_id='$branch_id'";

    }

    // Execute the query
    $result = mysqli_query($dbc, $query);

    // Check if the update was successful
    if ($result) {
        echo '<script>alert("UniKL branches updated successfully.");</script>';
        // Redirect to the view page after the deletion
        echo "<script>window.location.href = 'viewbranch_admin.php';</script>";
    } else {
        echo '<script>alert("Error updating branches.");</script>';
    }
}

// // Get the branch_id from the URL parameter
// $branch_id = $_GET['branch_id'];

// Fetch the branches record from the database
$query = "SELECT * FROM branches WHERE branch_id='$branch_id'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

// Get the values from the fetched record
// $news_title = $row['news_title'];
// $news_descript = $row['news_descript'];
// $news_date = $row['news_date'];

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
    <h2 class="mb-4">Edit UniKL Branches</h2>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <form name="editbranch" action="" method="post" enctype="multipart/form-data">

            <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" />

                <div class="form-group">
                    <label for="branch_image">Upload UniKL Branch:</label>
                    <input type="file" id="branch_image" name="branch_image" class="form-control" />
                </div>

                <br>

                <div class="form-group">
                    <label for="branch_fname">UniKL Full Name:</label>
                    <input type="text" id="branch_fname" name="branch_fname" class="form-control" value="<?php echo $branch_fname; ?>" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="branch_abbre">UniKL Abbreviation:</label>
                    <input type="text" id="branch_abbre" name="branch_abbre" class="form-control" value="<?php echo $branch_abbre; ?>" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="branch_field">Field of Study:</label>
                    <textarea rows="5" cols="50" name="branch_field" class="form-control" require><?php echo $branch_field; ?></textarea>
                </div>

                <br>

                <div class="form-group">
                    <label for="branch_address">Address:</label>
                    <textarea rows="5" cols="50" name="branch_address" class="form-control" require><?php echo $branch_address; ?></textarea>
                </div>

                <br>

                <div class="form-group">
                    <label for="branch_phone">Phone Number:</label>
                    <input type="text" id="branch_phone" name="branch_phone" class="form-control" value="<?php echo $branch_phone; ?>" required />
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