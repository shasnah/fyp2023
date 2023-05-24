
<?php 

require('mysqli_connect.php');
// include("admin_auth.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // user is requesting the page with a GET request, initialize form fields
    $news_id = $_GET['news_id'];
    $news_title = '';
    $news_descript = '';
    $news_date = '';
    
    // fetch news record from database and populate form fields if news_id is valid
    if (!empty($news_id)) {
        $query = "SELECT * FROM news WHERE news_id='$news_id'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($row) {
            $news_title = $row['news_title'];
            $news_descript = $row['news_descript'];
            $news_date = $row['news_date'];
        }
    }
}

	// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $news_id = $_POST['news_id'];
    $news_title = $_POST['news_title'];
    $news_descript = $_POST['news_descript'];
    $news_date = $_POST['news_date'];
    $news_image = $_FILES['news_image']['name'];

    // Check if a new image has been uploaded
    if ($news_image != '') {
        // Check if the uploaded file is an image
        $check = getimagesize($_FILES['news_image']['tmp_name']);
        if ($check === false) {
            $errors[] = "File is not an image.";
        }

        // Check file size (max 5 MB)
        if ($_FILES['news_image']['size'] > 5000000) {
            $errors[] = "File is too large. Maximum size allowed is 5 MB.";
        }

        // Allow only certain file formats
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        $file_ext = pathinfo($news_image, PATHINFO_EXTENSION);
        if (!in_array($file_ext, $allowed_types)) {
            $errors[] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        }

        // Move the uploaded file to the news_image directory
        $target_dir = "../upload_news/";
        $finalImage = $target_dir . $news_image;
        move_uploaded_file($_FILES['news_image']['tmp_name'], $finalImage);

        // Update the news with the new image
        $query = "UPDATE news SET news_title='$news_title', news_descript='$news_descript', news_date='$news_date', news_image='$news_image' WHERE news_id='$news_id'";
    } else {
        // Update the news without changing the image
        $query = "UPDATE news SET news_title='$news_title', news_descript='$news_descript', news_date='$news_date' WHERE news_id='$news_id'";
    }

    // Execute the query
    $result = mysqli_query($dbc, $query);

    // Check if the update was successful
    if ($result) {
        echo '<script>alert("News updated successfully.");</script>';

         // Redirect to the view page after the update
         echo "<script>window.location.href = 'viewnews_admin.php';</script>";
	  
    } else {
        echo '<script>alert("Error updating news.");</script>';

         // Redirect to the view page after the update
         echo "<script>window.location.href = 'viewnews_admin.php';</script>";
	  
    }
}

// // Get the news_id from the URL parameter
// $news_id = $_GET['news_id'];

// Fetch the news record from the database
$query = "SELECT * FROM news WHERE news_id='$news_id'";
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
    <h2 class="mb-4">Edit News & Events</h2>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <form name="editnews" action="editnews_admin.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="news_id" value="<?php echo $news_id; ?>" />

                <div class="form-group">
                    <label for="news_image">Upload News:</label>
                    <input type="file" id="news_image" name="news_image" class="form-control" />
                </div>

                <br>

                <div class="form-group">
                    <label for="news_title">Title:</label>
                    <input type="text" id="news_title" name="news_title" class="form-control" value="<?php echo $news_title; ?>" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="news_descript">Description:</label>
                    <textarea rows="5" cols="50" name="news_descript" class="form-control" require><?php echo $news_descript; ?></textarea>
                </div>

                <br>

                <div class="form-group">
                    <label for="news_date">Date Post:</label>
                    <input type="date" id="news_date" name="news_date" class="form-control" value="<?php echo $news_date; ?>" required>
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