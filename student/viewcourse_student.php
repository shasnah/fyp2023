

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf=8">
    <title> Student </title>

     <!-- Link fo css file -->
    <link rel="stylesheet" href="student_viewcourse.css" /> 

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


<header class="header">

<h2> UniKL Courses</h2>

<p> This page offers comprehensive information about the courses offered at each UniKL branch. For any further inquiries, kindly reach out to the respective UniKL branch directly. </p>

</header>

<?php

require('mysqli_connect.php');
include("student_auth.php");

$branch_id = $_GET['branch_id'];

// Retrieve branches data from the database
$sql = "SELECT courses.course_id, courses.course_level, courses.course_name, courses.course_descript, courses.course_special, courses.course_entry, branches.branch_abbre
FROM courses
INNER JOIN branches ON courses.branch_id = branches.branch_id
WHERE courses.branch_id = $branch_id";
$result = mysqli_query($dbc, $sql);

?>

<main>
<?php
    while ($row = mysqli_fetch_assoc($result)) {
        $course_id = $row['course_id'];
    ?>    
    <div class="card">
       

        <div class="caption">
            <p class="branch_abbre"> <?php echo $row["branch_abbre"];     ?> </p>
            <p class="course_level"> <?php echo $row["course_level"];     ?> </p>
            <p class="course_name"> <?php echo $row["course_name"];     ?> </p>
            <p class="course_descript"> <?php echo $row["course_descript"]; ?> </p>
            <p class="course_special"> <?php echo $row["course_special"];     ?> </p>
            <p class="course_entry"> <?php echo $row["course_entry"];     ?> </p>
        </div>

        
    </div>

    <?php
        }
    ?>

</main>


<footer class="text-center py-3">
    <p>&copy; 2023 Siti Nor Hasnah, All Rights Reserved</p>
</footer>

</body>
</html>
