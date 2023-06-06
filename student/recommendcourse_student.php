
<?php
  include("student_auth.php");
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf=8">
    <title> Welcome </title>

     <!-- Link fo css file -->
    <link rel="stylesheet" href="student_recommend.css" /> 

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

<h2> Course Recommedation </h2>

<p>This website aims to assist students in finding courses at UniKL that align with their SPM results. Please fill in all the required fields to ensure accurate calculations.</p>
<p>The recommended course is determined based on the latest entry requirements set by UniKL. For more information, please contact the respective UniKL branch.</p>


<div class="container">
  <div class="form-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <table class="table">
        <?php for ($i = 1; $i <= 12; $i++) { ?>
        <tr>
          <td><label for="subject<?php echo $i; ?>">Subject <?php echo $i; ?>:</label></td>
          <td>
          <input type="text" name="grade<?php echo $i; ?>" id="grade<?php echo $i; ?>" class="form-control">
          </td>
          <td><label for="grade<?php echo $i; ?>">Grade obtained:</label></td>
          <td>
            <select name="grade<?php echo $i; ?>" id="grade<?php echo $i; ?>" class="form-control">
              <option value="">Select Grade</option>
              <option value="A+">A+</option>
              <option value="A">A</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B">B</option>
              <option value="C+">C+</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
              <option value="F">G</option>
            </select>
          </td>
        </tr>
        <?php } ?>
      </table>
      
      <input type="submit" value="Submit" class="btn btn-primary">
    </form>
  </div>
</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $grades = [];
  $numSubjects = 0; // Variable to store the number of subjects

  for ($i = 1; $i <= 12; $i++) {
    $gradeKey = "grade" . $i;
    if (isset($_POST[$gradeKey])) {
      $grades[] = $_POST[$gradeKey];
      $numSubjects++; // Increment the number of subjects
    }
  }

  // Check if the number of subjects is less than 7
  if ($numSubjects < 7) {
    echo "Please enter grades for at least 7 subjects.";
    // You can redirect or display an error message here as per your requirement
    // Example: header("Location: form.php?error=subjects");
    // Note: Make sure to handle the error case appropriately in the form
    exit; // Stop further execution of the code
  }

  $grademathematics = $grades[0];
  $gradescience = $grades[1];
  $grade = $grades[2];
  $gradeenglish = $grades[3];
  $gradebiology = $grades[4];
  $gradechemistry = $grades[5];
  $gradephysics = $grades[6];
  $gradeaddmath = $grades[7];
  $gradeBM = $grades[8];

  if ($numSubjects >= 7 && ($grademathematics >= 'C' || $grademathematics >= 'C+') && ($gradescience >= 'C' || $gradescience >= 'C+')) {
    // Recommended course for when Mathematics and Science have at least 'C' grade
    // Add the corresponding courses here
    $recommendedCourse = [
        "Diploma of Engineering Technology in Air Conditioning and Refrigeration",
        "Diploma of Engineering Technology in Automotive Maintenance",
        "Diploma of Engineering Technology in Welding",
        "Diploma of Electrical and Electronics Engineering Technology",
        "Diploma of Electrical Engineering Technology (Telecommunication)",
        "Diploma of Engineering Technology in Aeroplane Maintenance",
        "Diploma of Engineering Technology in Helicopter Maintenance",
        "Diploma of Engineering Technology in Mechanical Design and Development",
        "Diploma of Engineering Technology in Production",
        "Diploma in Chemical Engineering Technology",
        "Diploma of Engineering Technology in Ship Design",
        "Diploma of Engineering Technology (Railway System)",
        "Diploma of Engineering Technology in Quality Engineering",
        "Foundation in Science and Arts"
    ];
  } elseif ($numSubjects >= 7 && $grade >= 'C' && count(array_unique(array_slice($grades, 2, 5))) === 1) {
    // Recommended course for when any 5 subjects have the same grade
    $recommendedCourse = [
        "Foundation in Computer Technology",
        "Foundation in Science",
        "Foundation in Science and Technology",
        "Foundation in Business"
    ];
  } elseif ($numSubjects >= 7 && $grade >= 'C' && count(array_unique(array_slice($grades, 2, 3))) === 1) {
    // Recommended course for when any 3 subjects have the same grade
    $recommendedCourse = [
        "Diploma in Information Technology",
        "Diploma in Animation",
        "Diploma in Multimedia",
        "Diploma in Industrial Logistics"
    ];
  } elseif ($numSubjects >= 7 && ($gradeenglish >= 'D') && count(array_unique(array_slice($grades, 2, 5))) === 1) {
    // Recommended course for when English and any 4 subjects have the same grade
    $recommendedCourse = [
        "Diploma of Engineering Technology in Marine Engineering"
    ];
  } elseif ($numSubjects >= 7 && ($grademathematics >= 'B' || $grademathematics >= 'B+' || $grademathematics >= 'A-' || $grademathematics >= 'A' || $grademathematics >= 'A+') && ($gradebiology >= 'B' || $gradebiology >= 'B+' || $gradebiology >= 'A-' || $gradebiology >= 'A' || $gradebiology >= 'A+') && ($gradechemistry >= 'B' || $gradechemistry >= 'B+' || $gradechemistry >= 'A-' || $gradechemistry >= 'A' || $gradechemistry >= 'A+') && ($gradephysics >= 'B' || $gradephysics >= 'B+' || $gradephysics >= 'A-' || $gradephysics >= 'A' || $gradephysics >= 'A+') && ($gradeaddmath >= 'B' || $gradeaddmath >= 'B+' || $gradeaddmath >= 'A-' || $gradeaddmath >= 'A' || $gradeaddmath >= 'A+')) {
    // Recommended course for when Mathematics, Biology, Chemistry, Physics, and Additional Mathematics have at least 'B' grade
    $recommendedCourse = [
        "Foundation in Medical Sciences",
        "Diploma in Nursing",
        "Diploma in Pharmacy"
    ];
  } elseif ($numSubjects >= 7 && ($gradeBM >= 'C' || $gradeBM >= 'C+' || $gradeBM >= 'B') && ($grademathematics >= 'C' || $grademathematics >= 'C+' || $grademathematics >= 'B') && ($gradeenglish >= 'C' || $gradeenglish >= 'C+' || $gradeenglish >= 'B') && count(array_unique(array_slice($grades, 2, 2))) === 1) {
    // Recommended course for when Bahasa Malaysia, Mathematics, and English have at least 'C' grade
    $recommendedCourse = [
        "Diploma in Medical Assistant",
        "Diploma in Environmental Health"
    ];
  } else {
    $recommendedCourse = ["Please contact UniKL for more information"];
  }

  echo '<div class="recommendation-container">';
  echo '<p class="recommendation-title">Based on your grades, the recommended course(s) for you is/are:</p>';
  foreach ($recommendedCourse as $course) {
    echo '<p class="recommended-course">- ' . $course . '</p>';
  }
  echo '</div>';
}

?>

<footer class="text-center py-3">
    <p>&copy; 2023 Siti Nor Hasnah, All Rights Reserved</p>
</footer>

</body>
</html>
