
<?php 
// include this file on all secure pages
include("student_auth.php");
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

<header class="header">

<img src="https://www.msi.unikl.edu.my/images/uniklmsi/news/IMG_0309.jpg" alt="logo" style="width:1350px;height:500px;"> 

<h2> UniKL Course Recommedation System </h2>

<p> This website is provided specially for SPM students to discover diploma and foundation courses provided in UniKL. Students can use their SPM results to know what course suits with their exam result. </p>

</header>

<div class= "cover">
<div class="box">
    <img src="https://media.licdn.com/dms/image/C5612AQF-xPyqmS8ExQ/article-cover_image-shrink_720_1280/0/1635523156416?e=2147483647&v=beta&t=oBh_cqQfEMB5BRVQ5HzBwhdtVrsLSmIEYvsB9yvjEyc">
    <h3> Course Recommendation </h3>
    <p> Use your SPM result and find out course that suits with your result</p>
    <a href="recommendcourse_student.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Click Here</a>
</div>

<div class="box">
    <img src="https://www.transformationmarketing.com/wp-content/uploads/2019/12/TM-Different-Personality-tests-and-how-it-can-help-your-team.jpg">
    <h3> RIASEC Test </h3>
    <p> Find out your career path by answering few questions </p>
    <a href="testcourse_student.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Click Here</a>
</div>
</div>



<footer class="text-center py-3">
    <p>&copy; 2023 Siti Nor Hasnah, All Rights Reserved</p>
</footer>

</body>
</html>



