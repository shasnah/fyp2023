

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

<?php

require('mysqli_connect.php');

  $totalBranches = 0;
  $totalCourses = 0;
  $totalScholarships = 0;
  $totalAdvisors = 0;

  // Retrieve the counts from the database
  $sql = "SELECT COUNT(*) AS totalBranches FROM branches";
  $result = mysqli_query($dbc, $sql);
  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $totalBranches = $row['totalBranches'];
  }

  $sql = "SELECT COUNT(*) AS totalCourses FROM courses";
  $result = mysqli_query($dbc, $sql);
  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $totalCourses = $row['totalCourses'];
  }

  $sql = "SELECT COUNT(*) AS totalScholarships FROM scholar";
  $result = mysqli_query($dbc, $sql);
  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $totalScholarships = $row['totalScholarships'];
  }

  $sql = "SELECT COUNT(*) AS totalAdvisors FROM advisor";
  $result = mysqli_query($dbc, $sql);
  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $totalAdvisors = $row['totalAdvisors'];
  }
?>

<div class="head_view">
		
		<h2>Admin Dashboard</h2>

		<br>

</div>

<div class="container1">
  <div class="row">
    <div class="col-md-3">
      <div class="card card-branches">
        <div class="card-body">
          <h5 class="card-title">Total Branches</h5>
          <p class="card-text"><?php echo $totalBranches; ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card card-courses">
        <div class="card-body">
          <h5 class="card-title">Total Courses</h5>
          <p class="card-text"><?php echo $totalCourses; ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card card-scholarships">
        <div class="card-body">
          <h5 class="card-title">Total Scholarships</h5>
          <p class="card-text"><?php echo $totalScholarships; ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card card-advisors">
        <div class="card-body">
          <h5 class="card-title">Total Academic Advisors</h5>
          <p class="card-text"><?php echo $totalAdvisors; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>


<footer class="text-center py-3">
    <p>&copy; 2023 Siti Nor Hasnah, All Rights Reserved</p>
</footer>

</body>
</html>