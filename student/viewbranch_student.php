

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf=8">
    <title> Student </title>

     <!-- Link fo css file -->
    <link rel="stylesheet" href="student_viewbranch.css" /> 

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

<h2> UniKL Branches </h2>

<p> This page provides detailed information about all 12 branches of UniKL. For further inquiries, please contact the respective UniKL branch directly. </p>

</header>

<?php

require('mysqli_connect.php');
include("student_auth.php");


// Retrieve branches data from the database
$sql = "SELECT * FROM branches";
$result = mysqli_query($dbc, $sql);

?>


<main>
<?php
    while ($row = mysqli_fetch_assoc($result)) {
        $branch_id = $row['branch_id'];
        $image_path = '../upload_branches/' . $row['branch_image'];
    ?>    
    <div class="card">
        <div class="image">
            <img src="<?php echo $image_path; ?>" alt="">
        </div>

        <div class="caption">
            <p class="branch_abbre"> <?php echo $row["branch_abbre"];     ?> </p>
            <p class="branch_fname"> <?php echo $row["branch_fname"];     ?> </p>
            <p class="branch_field"> <?php echo $row["branch_field"];     ?> </p>
            <p class="branch_address"> <?php echo $row["branch_address"]; ?> </p>
            <p class="branch_phone"> <?php echo $row["branch_phone"];     ?> </p>
        </div>

        <a href="viewcourse_student.php?branch_id=<?php echo $branch_id; ?>"><button type="button">View Course</button></a>
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
