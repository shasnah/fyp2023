

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

echo "Form submitted";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the submitted form data
    $course_id = $_POST['course_id'];
    $course_level = trim($_POST['course_level']);
    $course_name = trim($_POST['course_name']);
    $course_descript = trim($_POST['course_descript']);
    $course_special = trim($_POST['course_special']);
    $course_entry = trim($_POST['course_entry']);
    $branch_id = $_POST['branch_id'];

    // Update the course data in the database
    $q = "UPDATE courses SET course_level=?, course_name=?, course_descript=?, course_special=?, course_entry=?, branch_id=? WHERE course_id=?";    $stmt = mysqli_prepare($dbc, $q);
    $stmt = mysqli_prepare($dbc, $q);
    mysqli_stmt_bind_param($stmt, 'ssssssi', $course_level, $course_name, $course_descript, $course_special, $course_entry, $branch_id, $course_id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) == 1) {
        // Display a success message
        echo "<script>alert('Course updated successfully.');</script>";
    } else {
        // Display an error message
        $errorMessage = "Error updating course: " . mysqli_stmt_error($stmt);
        echo "<script>alert('" . $errorMessage . "');</script>";
        echo "<script>console.log('" . $errorMessage . "');</script>";
        echo "<script>window.location.href = 'viewcourse_admin.php';</script>";
        exit; // Stop further execution
    }

    mysqli_stmt_close($stmt);
    mysqli_close($dbc);

    // Redirect to the view page after the update
    echo "<script>window.location.href = 'viewcourse_admin.php';</script>";

} else {
    // Check if the course_id parameter is set in the URL
    if (isset($_GET['course_id'])) {
        // Retrieve the course data based on the course_id
        $course_id = $_GET['course_id'];
        $q = "SELECT * FROM courses WHERE course_id = ?";
        $stmt = mysqli_prepare($dbc, $q);
        mysqli_stmt_bind_param($stmt, 'i', $course_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            // Fetch the course data
            $row = mysqli_fetch_assoc($result);
            $course_level = $row['course_level'];
            $course_name = $row['course_name'];
            $course_descript = $row['course_descript'];
            $course_special = $row['course_special'];
            $course_entry = $row['course_entry'];
            $branch_id = $row['branch_id'];

        } else {
            // Course not found
            echo "<script>alert('Course not found.');</script>";
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
            echo "<script>window.location.href = 'viewcourse_admin.php';</script>";
            exit; // Stop further execution
        }

        mysqli_stmt_close($stmt);
    } else {
        // Invalid course_id parameter
        echo "<script>alert('Invalid course ID.');</script>";
        mysqli_close($dbc);
        echo "<script>window.location.href = 'viewcourse_admin.php';</script>";
        exit; // Stop further execution
    }
}

mysqli_close($dbc);


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
    <h2 class="mb-4">Edit UniKL Courses</h2>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <form name="editcourse" action="editcourse_admin.php" method="post">

            <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                
            <div class="form-group">
                <label for="branch_id">UniKL Branch:</label>
                <select class="form-control" id="branch_id" name="branch_id">
                    <?php
                        // Populate the dropdown with branch data
                        foreach ($branches as $branchId => $branchAbbre) {
                            $selected = ($branchId == $branch_id) ? "selected" : "";
                            echo "<option value=\"$branchId\" $selected>$branchAbbre</option>";                        }
                    ?>
                </select>
            </div>

                <br>

                <div class="form-group">
                    <label for="course_level">Level of Study:</label>
                    <input type="text" id="course_level" name="course_level" class="form-control" value="<?php echo $course_level; ?>" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="course_name">Course Name:</label>
                    <input type="text" id="course_name" name="course_name" class="form-control" value="<?php echo $course_name; ?>" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="course_descript">Course Description:</label>
                    <textarea rows="5" cols="50" name="course_descript" class="form-control" require> <?php echo $course_descript; ?> </textarea>
                </div>

                <br>

                <div class="form-group">
                    <label for="course_special">Specialization:</label>
                    <input type="text" id="course_special" name="course_special" class="form-control" value="<?php echo $course_special; ?>" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="course_entry">Entry Requirement:</label>
                    <textarea rows="5" cols="50" name="course_entry" class="form-control" require> <?php echo $course_entry; ?> </textarea>
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
