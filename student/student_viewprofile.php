
<?php
require('mysqli_connect.php');
include("student_auth.php");

$id = $_SESSION['username']; 
    
$query = "SELECT * FROM student WHERE username = '$id'";
$row = mysqli_query($dbc, $query);
$show = mysqli_fetch_assoc($row);
$student_id = $show["student_id"]; // Get the student ID

if ($row) {
    // Assign the values to variables
    $f_name = $show['f_name'];
    $l_name = $show['l_name'];
    $email = $show['email'];
    $username = $show['username'];

    // Free the result set
    mysqli_free_result($row);
} else {
    // Display an error message or handle the error in an appropriate way:
    echo "Error executing the query: " . mysqli_error($dbc);
}

mysqli_close($dbc);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf=8">
    <title> Student </title>

     <!-- Link fo css file -->
    <link rel="stylesheet" href="student_content.css" /> 

    <!-- Link for bootstrap file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

<!-- Link for bootstrap file -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!-- Navigation menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8e/UniKL_seal.svg/800px-UniKL_seal.svg.png" alt="logo" style="width:60px;height:80px;"> &nbsp;
            <h3>UniKL Course </h3> &nbsp; &nbsp; &nbsp;
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="student_homepage.php">Home</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="student_viewprofile.php">Profile</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="viewnews_student.php">News & Events</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="viewbranch_student.php">UniKL Branches</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="viewscholar_student.php">Scholarship</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="viewadvisor_student.php">Academic Advisor</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="student_logout.php">Logout</a>
                        </li>
                    </ul>

                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
        </div>
    </nav>
<!-- End of navigation menu -->


<div class="container mt-4">
    <h2 class="mb-4">Student Profile</h2>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <form name="student view profile" action="" method="post">

            <img class="student" src="../student/media/student.png" alt="Student Image">


            <div class="form-group">
                    <label for="f_name">First Name:</label>
                    <input type="text" id="f_name" name="f_name" class="form-control" value="<?php echo $f_name; ?>" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="l_name">Last Name:</label>
                    <input type="text" id="l_name" name="l_name" class="form-control" value="<?php echo $l_name; ?>" required />
                </div>

                <br>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>" required />
                </div>

                <br>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" value="<?php echo $username; ?>" required />
                </div>

                <br>

                <a href="student_editprofile.php?student_id=<?php echo $student_id; ?>"><button type="button" name="submit" class="btn btn-primary">Edit Profile</button></a>
        </div>
    </div>
</div>

<footer class="text-center py-3">
    <p>&copy; 2023 Siti Nor Hasnah, All Rights Reserved</p>
</footer>