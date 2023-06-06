<!DOCTYPE html>
<html>
<head>
    <meta charset="utf=8">
    <title> Student </title>

     <!-- Link fo css file -->
    <link rel="stylesheet" href="student_test.css" /> 

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



<?php

include("student_auth.php");


$rTotal = 0;
$iTotal = 0;
$aTotal = 0;
$sTotal = 0;
$eTotal = 0;
$cTotal = 0;

// Get the values from the form using $_POST
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];
$q5 = $_POST['q5'];
$q6 = $_POST['q6'];
$q7 = $_POST['q7'];
$q8 = $_POST['q8'];
$q9 = $_POST['q9'];
$q10 = $_POST['q10'];
$q11 = $_POST['q11'];
$q12 = $_POST['q12'];
$q13 = $_POST['q13'];
$q14 = $_POST['q14'];
$q15 = $_POST['q15'];
$q16 = $_POST['q16'];
$q17 = $_POST['q17'];
$q18 = $_POST['q18'];
$q19 = $_POST['q19'];
$q20 = $_POST['q20'];
$q21 = $_POST['q21'];
$q22 = $_POST['q22'];
$q23 = $_POST['q23'];
$q24 = $_POST['q24'];
$q25 = $_POST['q25'];
$q26 = $_POST['q26'];
$q27 = $_POST['q27'];
$q28 = $_POST['q28'];
$q29 = $_POST['q29'];
$q30 = $_POST['q30'];
$q31 = $_POST['q31'];
$q32 = $_POST['q32'];
$q33 = $_POST['q33'];
$q34 = $_POST['q34'];
$q35 = $_POST['q35'];
$q36 = $_POST['q36'];
$q37 = $_POST['q37'];
$q38 = $_POST['q38'];
$q39 = $_POST['q39'];
$q40 = $_POST['q40'];
$q41 = $_POST['q41'];
$q42 = $_POST['q42'];

// Assign values to the response options
$agreeValue = 1;
$disagreeValue = 0;

// Calculate the totals for each category
if ($q1 == 'agree') {
    $rTotal += $agreeValue;
} else {
    $rTotal += $disagreeValue;
}

if ($q2 == 'agree') {
    $iTotal += $agreeValue;
} else {
    $iTotal += $disagreeValue;
}

if ($q3 == 'agree') {
    $aTotal += $agreeValue;
} else {
    $aTotal += $disagreeValue;
}

if ($q4 == 'agree') {
    $sTotal += $agreeValue;
} else {
    $sTotal += $disagreeValue;
}

if ($q5 == 'agree') {
    $eTotal += $agreeValue;
} else {
    $eTotal += $disagreeValue;
}

if ($q6 == 'agree') {
    $cTotal += $agreeValue;
} else {
    $cTotal += $disagreeValue;
}

if ($q7 == 'agree') {
    $rTotal += $agreeValue;
} else {
    $rTotal += $disagreeValue;
}

if ($q8 == 'agree') {
    $aTotal += $agreeValue;
} else {
    $aTotal += $disagreeValue;
}

if ($q9 == 'agree') {
    $cTotal += $agreeValue;
} else {
    $cTotal += $disagreeValue;
}

if ($q10 == 'agree') {
    $eTotal += $agreeValue;
} else {
    $eTotal += $disagreeValue;
}

if ($q11 == 'agree') {
    $iTotal += $agreeValue;
} else {
    $iTotal += $disagreeValue;
}

if ($q12 == 'agree') {
    $sTotal += $agreeValue;
} else {
    $sTotal += $disagreeValue;
}

if ($q13 == 'agree') {
    $sTotal += $agreeValue;
} else {
    $sTotal += $disagreeValue;
}

if ($q14 == 'agree') {
    $rTotal += $agreeValue;
} else {
    $rTotal += $disagreeValue;
}

if ($q15 == 'agree') {
    $cTotal += $agreeValue;
} else {
    $cTotal += $disagreeValue;
}

if ($q16 == 'agree') {
    $eTotal += $agreeValue;
} else {
    $eTotal += $disagreeValue;
}

if ($q17 == 'agree') {
    $aTotal += $agreeValue;
} else {
    $aTotal += $disagreeValue;
}

if ($q18 == 'agree') {
    $iTotal += $agreeValue;
} else {
    $iTotal += $disagreeValue;
}

if ($q19 == 'agree') {
    $eTotal += $agreeValue;
} else {
    $eTotal += $disagreeValue;
}

if ($q20 == 'agree') {
    $sTotal += $agreeValue;
} else {
    $sTotal += $disagreeValue;
}

if ($q21 == 'agree') {
    $iTotal += $agreeValue;
} else {
    $iTotal += $disagreeValue;
}

if ($q22 == 'agree') {
    $rTotal += $agreeValue;
} else {
    $rTotal += $disagreeValue;
}

if ($q23 == 'agree') {
    $aTotal += $agreeValue;
} else {
    $aTotal += $disagreeValue;
}

if ($q24 == 'agree') {
    $cTotal += $agreeValue;
} else {
    $cTotal += $disagreeValue;
}

if ($q25 == 'agree') {
    $cTotal += $agreeValue;
} else {
    $cTotal += $disagreeValue;
}

if ($q26 == 'agree') {
    $iTotal += $agreeValue;
} else {
    $iTotal += $disagreeValue;
}

if ($q27 == 'agree') {
    $aTotal += $agreeValue;
} else {
    $aTotal += $disagreeValue;
}

if ($q28 == 'agree') {
    $sTotal += $agreeValue;
} else {
    $sTotal += $disagreeValue;
}

if ($q29 == 'agree') {
    $eTotal += $agreeValue;
} else {
    $eTotal += $disagreeValue;
}

if ($q30 == 'agree') {
    $rTotal += $agreeValue;
} else {
    $rTotal += $disagreeValue;
}

if ($q31 == 'agree') {
    $aTotal += $agreeValue;
} else {
    $aTotal += $disagreeValue;
}

if ($q32 == 'agree') {
    $rTotal += $agreeValue;
} else {
    $rTotal += $disagreeValue;
}

if ($q33 == 'agree') {
    $iTotal += $agreeValue;
} else {
    $iTotal += $disagreeValue;
}

if ($q34 == 'agree') {
    $sTotal += $agreeValue;
} else {
    $sTotal += $disagreeValue;
}

if ($q35 == 'agree') {
    $cTotal += $agreeValue;
} else {
    $cTotal += $disagreeValue;
}

if ($q36 == 'agree') {
    $eTotal += $agreeValue;
} else {
    $eTotal += $disagreeValue;
}

if ($q37 == 'agree') {
    $rTotal += $agreeValue;
} else {
    $rTotal += $disagreeValue;
}

if ($q38 == 'agree') {
    $cTotal += $agreeValue;
} else {
    $cTotal += $disagreeValue;
}

if ($q39 == 'agree') {
    $iTotal += $agreeValue;
} else {
    $iTotal += $disagreeValue;
}

if ($q40 == 'agree') {
    $sTotal += $agreeValue;
} else {
    $sTotal += $disagreeValue;
}

if ($q41 == 'agree') {
    $aTotal += $agreeValue;
} else {
    $aTotal += $disagreeValue;
}

if ($q42 == 'agree') {
    $eTotal += $agreeValue;
} else {
    $eTotal += $disagreeValue;
}


// Initialize the counters for each RIASEC type
$realistic = 0;
$investigative = 0;
$artistic = 0;
$social = 0;
$enterprising = 0;
$conventional = 0;

// Increase the scores for the corresponding RIASEC types
$realistic += $rTotal;
$investigative += $iTotal;
$artistic += $aTotal;
$social += $sTotal;
$enterprising += $eTotal;
$conventional += $cTotal;

// Determine the RIASEC type with the highest score
$maxScore = max($realistic, $investigative, $artistic, $social, $enterprising, $conventional);

// Generate the result message based on the highest score
$result = '';
if ($maxScore == $realistic) {
    echo '<div class="result-container">';
    echo '<h2 class="header"> RIASEC Test Result</h2>';
    echo '<div class="result-message realistic">';
    $result = '<b>R = Realistic</b><br>These people are often good at mechanical or athletic jobs. Good college majors for Realistic people are:<br>• Agriculture<br>• Health Assistant<br>• Computers<br>• Construction<br>• Mechanic/Machinist<br>• Engineering<br>• Food and Hospitality';
    echo $result;
    echo '</div>';
    echo "<br>";

    echo '<div class="recommended-courses">';
    echo '<p class="recommended-courses-title">Courses available in UniKL that you can apply based on the result are:</p>';
    echo '<ul>';
    echo '<li class="recommended-course-item">Foundation in Computer Technology</li>';
    echo '<li class="recommended-course-item">Diploma in Information Technology</li>';
    echo '<li class="recommended-course-item">Diploma of Engineering Technology in Quality Engineering</li>';
    echo '<li class="recommended-course-item">Diploma in Medical Assistant</li>';
    echo '</ul>';
    echo '</div>';
    echo '</div>';
} 

elseif ($maxScore == $investigative) {
    echo '<div class="result-container">';
    echo '<h2 class="header"> RIASEC Test Result</h2>';
    echo '<div class="result-message realistic">';
    $result = '<b>I = Investigative</b><br>These people like to watch, learn, analyze and solve problems. Good college majors for Investigative people are:<br>• Marine Biology<br>• Engineering<br>• Chemistry<br>• Zoology<br>• Medicine/Surgery<br>• Consumer Economics<br>• Psychology';
    echo $result;
    echo '</div>';
    echo "<br>";

    echo '<div class="recommended-courses">';
    echo '<p class="recommended-courses-title">Courses available in UniKL that you can apply based on the result are:</p>';
    echo '<ul>';
    echo '<li class="recommended-course-item"> Diploma in Chemical Engineering Technology</li>';
    echo '<li class="recommended-course-item">Diploma of Engineering Technology in Ship Design</li>';
    echo '<li class="recommended-course-item">Diploma of Engineering Technology in Marine Engineering</li>';
    echo '<li class="recommended-course-item">Foundation in Medical Sciences</li>';
    echo '<li class="recommended-course-item">Foundation in Science and Technology</li>';
    echo '</ul>';
    echo '</div>';
    echo '</div>';
} 

elseif ($maxScore == $artistic) {
    echo '<div class="result-container">';
    echo '<h2 class="header"> RIASEC Test Result</h2>';
    echo '<div class="result-message realistic">';
    $result = '<b>A = Artistic</b><br>These people like to watch, learn, analyze and solve problems. Good college majors for Artistic people are:<br>• Marine Biology<br>• Engineering<br>• Chemistry<br>• Zoology<br>• Medicine/Surgery<br>• Consumer Economics<br>• Psychology';
    echo $result;
    echo '</div>';
    echo "<br>";

    echo '<div class="recommended-courses">';
    echo '<p class="recommended-courses-title">Courses available in UniKL that you can apply based on the result are:</p>';
    echo '<ul>';
    echo '<li class="recommended-course-item"> Foundation in Science and Arts</li>';
    echo '<li class="recommended-course-item">Diploma in Animation</li>';
    echo '<li class="recommended-course-item">Diploma in Multimedia</li>';
    echo '</ul>';
    echo '</div>';
    echo '</div>';
} 

elseif ($maxScore == $social) {
    echo '<div class="result-container">';
    echo '<h2 class="header"> RIASEC Test Result</h2>';
    echo '<div class="result-message realistic">';
    $result = '<b>S = Social</b><br>These people like to watch, learn, analyze and solve problems. Good college majors for Social people are:<br>• Marine Biology<br>• Engineering<br>• Chemistry<br>• Zoology<br>• Medicine/Surgery<br>• Consumer Economics<br>• Psychology';
    echo $result;
    echo '</div>';
    echo "<br>";

    echo '<div class="recommended-courses">';
    echo '<p class="recommended-courses-title">Courses available in UniKL that you can apply based on the result are:</p>';
    echo '<ul>';
    echo '<li class="recommended-course-item"> Diploma in Medical Assistant </li>';
    echo '<li class="recommended-course-item"> Diploma in Nursing </li>';
    echo '<li class="recommended-course-item"> Foundation in Science and Arts </li>';
    echo '</ul>';
    echo '</div>';
    echo '</div>';
} 

elseif ($maxScore == $enterprising) {
    echo '<div class="result-container">';
    echo '<h2 class="header"> RIASEC Test Result</h2>';
    echo '<div class="result-message realistic">';
    $result = '<b>E = Enterprising</b><br>These people like to watch, learn, analyze and solve problems. Good college majors for Enterprising people are:<br>• Marine Biology<br>• Engineering<br>• Chemistry<br>• Zoology<br>• Medicine/Surgery<br>• Consumer Economics<br>• Psychology';
    echo $result;
    echo '</div>';
    echo "<br>";

    echo '<div class="recommended-courses">';
    echo '<p class="recommended-courses-title">Courses available in UniKL that you can apply based on the result are:</p>';
    echo '<ul>';
    echo '<li class="recommended-course-item"> Foundation in Business </li>';
    echo '</ul>';
    echo '</div>';
    echo '</div>';
} 

elseif ($maxScore == $conventional) {
    echo '<div class="result-container">';
    echo '<h2 class="header"> RIASEC Test Result</h2>';
    echo '<div class="result-message realistic">';
    $result = '<b>C = Conventional</b><br>These people like to watch, learn, analyze and solve problems. Good college majors for Conventional people are:<br>• Marine Biology<br>• Engineering<br>• Chemistry<br>• Zoology<br>• Medicine/Surgery<br>• Consumer Economics<br>• Psychology';
    echo $result;
    echo '</div>';
    echo "<br>";

    echo '<div class="recommended-courses">';
    echo '<p class="recommended-courses-title">Courses available in UniKL that you can apply based on the result are:</p>';
    echo '<ul>';
    echo '<li class="recommended-course-item"> Foundation in Business </li>';
    echo '<li class="recommended-course-item"> Foundation in Medical Sciences </li>';
    echo '<li class="recommended-course-item"> Diploma in Environmental Health </li>';
    echo '<li class="recommended-course-item"> Diploma in Pharmacy </li>';
    echo '<li class="recommended-course-item"> Diploma of Electrical Engineering Technology (Telecommunication) </li>';
    echo '</ul>';
    echo '</div>';
    echo '</div>';
} 

else {
    echo "Unable to determine the RIASEC type based on the provided responses.";
}

?>


<footer class="text-center py-3">
    <p>&copy; 2023 Siti Nor Hasnah, All Rights Reserved</p>
</footer>

</body>
</html>