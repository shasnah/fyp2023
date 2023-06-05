
<?php 

require('mysqli_connect.php');
include("admin_auth.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // initialize form fields if news_id is valid
    if (isset($_GET['advisor_id'])) {
        $advisor_id = $_GET['advisor_id'];
        $query = "SELECT * FROM advisor WHERE advisor_id='$advisor_id'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($row) {
            $advisor_fname = $row['advisor_fname'];
            $advisor_lname = $row['advisor_lname'];
            $advisor_depart = $row['advisor_depart'];
            $advisor_email = $row['advisor_email'];
        }
    }
}

// check if the form has been submitted
if (isset($_POST['submit'])) {
    // get the form data
    $advisor_id = $_POST['advisor_id'];
    $advisor_fname = $_POST['advisor_fname'];
    $advisor_lname = $_POST['advisor_lname'];
    $advisor_depart = $_POST['advisor_depart'];
    $advisor_email = $_POST['advisor_email'];

    // update the advisor
    $query = "UPDATE advisor SET advisor_fname='$advisor_fname', advisor_lname='$advisor_lname', advisor_depart='$advisor_depart', advisor_email='$advisor_email' WHERE advisor_id='$advisor_id'";
    $result = mysqli_query($dbc, $query);

    // check if the update was successful
    if ($result) {
        echo '<script>alert("Academic advisor updated successfully.");</script>';
        // Redirect to the view page after the deletion
        echo "<script>window.location.href = 'viewadvisor_admin.php';</script>";
    } else {
        echo '<script>alert("Error updating academic advisor.");</script>';
        // Redirect to the view page after the deletion
        echo "<script>window.location.href = 'viewadvisor_admin.php';</script>";
    }
}

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
    <h2 class="mb-4">Edit Academic Advisor</h2>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <form name="editadvisor" action="editadvisor_admin.php" method="post">

            <input type="hidden" name="advisor_id" value="<?php echo $advisor_id; ?>" />

            <div class="form-group">
                    <label for="advisor_fname">First Name:</label>
                    <input type="text" id="advisor_fname" name="advisor_fname" class="form-control" value="<?php echo $advisor_fname; ?>" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="advisor_lname">Last Name:</label>
                    <input type="text" id="advisor_lname" name="advisor_lname" class="form-control" value="<?php echo $advisor_lname; ?>" required />
                </div>

                <br>
                <div class="form-group">
                    <label for="advisor_depart">Department:</label>
                    <input type="text" id="advisor_depart" name="advisor_depart" class="form-control" value="<?php echo $advisor_depart; ?>" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="advisor_email">Email:</label>
                    <input type="email" id="advisor_email" name="advisor_email" class="form-control" value="<?php echo $advisor_email; ?>" required />
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