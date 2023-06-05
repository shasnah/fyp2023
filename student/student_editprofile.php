
<?php 

require('mysqli_connect.php');
include("student_auth.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // initialize form fields if news_id is valid
    if (isset($_GET['student_id'])) {
        $student_id = $_GET['student_id'];
        $query = "SELECT * FROM student WHERE student_id='$student_id'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($row) {
            $f_name = $row['f_name'];
            $l_name = $row['l_name'];
            $email = $row['email'];
            $username = $row['username'];
        }
    }
}

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get the form data
    $student_id = $_POST['student_id'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    // update the student
    $query = "UPDATE student SET f_name='$f_name', l_name='$l_name', email='$email', username='$username' WHERE student_id='$student_id'";
    $result = mysqli_query($dbc, $query);

    // check if the update was successful
    if ($result) {
        echo '<script>alert("Profile updated successfully.");</script>';
        // Redirect to the view page after the deletion
        echo "<script>window.location.href = 'student_viewprofile.php';</script>";
    } else {
        echo '<script>alert("Error updating profile.");</script>';
        // Redirect to the view page after the deletion
        echo "<script>window.location.href = 'student_viewprofile.php';</script>";
    }
}

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
    <h2 class="mb-4">Edit Profile</h2>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <form name="student view profile" action="student_editprofile.php" method="post">

            <img class="student" src="../student/media/student.png" alt="Student Image">

            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>" />

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

                <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
        </div>
    </div>
</div>

<footer class="text-center py-3">
    <p>&copy; 2023 Siti Nor Hasnah, All Rights Reserved</p>
</footer>