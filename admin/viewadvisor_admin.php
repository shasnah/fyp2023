
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

<div class="head_view">
		
		<h2>View Academic Advisor</h2>

		<br>

		<a href="insertadvisor_admin.php" class="btn btn-primary">Add New</a>

		<br><br>

</div>

<?php

require('mysqli_connect.php');
// include("admin_auth.php");
      
//Retrieve data based on advisor
$q = "SELECT advisor.advisor_id, advisor.advisor_fname, advisor.advisor_lname, advisor.advisor_depart, advisor.advisor_email FROM advisor";

// Run the query
$r = @mysqli_query ($dbc, $q);

// Count the number of returned rows:
$num = mysqli_num_rows($r);

// If it ran OK, display the records.
if ($num > 0) { 

    // Table header:
    echo '<div class="table_view">';
    echo '<div class="table-responsive">
        <table class="table table-striped table-hover" style="width: 75%; margin: 0 auto;">
            <thead class="table-head-dark">
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>';

    // Fetch and print all the records:
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $advisor_id = $row['advisor_id'];
        // $image_path = '../upload_news/' . $row['news_image'];

        echo '<tr>
            <td>' . $row['advisor_fname'] . '</td>
            <td>' . $row['advisor_lname'] . '</td>
            <td>' . $row['advisor_depart'] . '</td>
            <td>' . $row['advisor_email'] . '</td>
            <td><a href="editadvisor_admin.php?advisor_id=' . $advisor_id . '"><button type="button" class="btn btn-success">Edit</button></a></td>
            <td><a href="deleteadvisor_admin.php?advisor_id=' . $advisor_id . '"><button type="button" class="btn btn-danger">Delete</button></a></td>
        </tr>';
    }

    echo '</tbody>
        </table>
    </div>';
   echo '</div>';

    mysqli_free_result($r);	

    // Show entries dropdown menu
    echo '<div class="d-flex justify-content-end">
        <div class="form-inline">
            <label class="mr-2">Show</label>
            <select id="show-entries" class="form-control form-control-sm mr-2">';
            for ($i = 10; $i <= 50; $i += 10) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            echo '</select>
            <label>entries</label>
        </div>
    </div>';

} else { // If no records were returned.

    // Display a message in a dialog box:
    echo "<script>alert('There are currently no data');</script>";
}

mysqli_close($dbc);

?>

<footer class="text-center py-3">
    <p>&copy; 2023 Siti Nor Hasnah, All Rights Reserved</p>
</footer>


</body>
</html>