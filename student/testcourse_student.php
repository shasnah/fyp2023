
<?php

    include("student_auth.php");
    
?>


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

<div class="container">
    <h2>RIASEC Test</h2>
    <p>The Holland Occupational Themes theory is centered around career and vocational choices, categorizing individuals into six distinct occupational categories based on their suitability. This classification is commonly referred to as RIASEC, representing the initial letters of each category.</p>
    <p>This test is intended for educational and entertainment purposes only. It should not be considered as psychological advice, and it does not provide any guarantee of accuracy or suitability for any specific purpose.</p>
    <form action="testresult_student.php" method="post" onsubmit="return validateForm()">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Agree</th>
                        <th>Disagree</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1. I like to work on cars</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q1" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q1" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2. I like to do puzzles</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q2" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q2" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3. I am good at working independently</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q3" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q3" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4. I like to work in teams</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q4" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q4" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5. I am an ambitious person, I set goals for myself</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q5" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q5" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>6. I like to organize things, (files, desks/offices)</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q6" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q6" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>7. I like to build things</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>8. I like to read about art and music</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q8" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q8" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>9. I like to have clear instructions to follow</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>10. I like to try to influence or persuade people</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11. I like to do experiments</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q11" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q11" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>12. I like to teach or train people</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q12" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q12" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>13. I like trying to help people solve their problems</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q13" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q13" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <td>14. I like to take care of animals</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q14" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q14" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>15.  I wouldn't mind working 8 hours per day in an office</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q15" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q15" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>16. I like selling things</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q16" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q16" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>17.  I enjoy creative writing</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q17" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q17" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>18. I enjoy science</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q18" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q18" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>19. I am quick to take on new responsibilities</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q19" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q19" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>20. I am interested in healing people</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q20" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q20" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>21. I enjoy trying to figure out how things work</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q21" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q21" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>22. I like putting things together or assembling things</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q22" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q22" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>23. I am a creative person</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q23" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q23" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>24. I pay attention to details</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q24" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q24" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>25. I like to do filing or typing</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q25" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q25" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>26. I like to analyze things (problems/situations)</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q26" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q26" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>27. I like to play instruments or sing</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q27" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q27" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>28. I enjoy learning about other cultures</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q28" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q28" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>29. I would like to start my own business</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q29" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q29" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>30. I like to cook</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q30" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q30" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>31. I like acting in plays</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q31" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q31" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>32. I am a practical person</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q32" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q32" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>33. I like working with numbers or charts</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q33" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q33" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>34. I like to get into discussions about issues</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q34" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q34" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>35.  I am good at keeping records of my work</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q35" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q35" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>36. I like to lead</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q36" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q36" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>37. I like working outdoors</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q37" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q37" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>38. I would like to work in an office</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q38" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q38" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>39.  I'm good at math</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q39" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q39" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>40. I like helping people</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q40" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q40" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>41. I like to draw</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q41" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q41" value="disagree">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>42. I like to give speeches</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q42" value="agree">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q42" value="disagree">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<footer class="text-center py-3">
    <p>&copy; 2023 Siti Nor Hasnah, All Rights Reserved</p>
</footer>

<script>
    function validateForm() {
        var radioButtons = document.querySelectorAll('input[type="radio"]');
        var answeredAllQuestions = true;

        // Check if at least one radio button is checked for each question
        for (var i = 1; i <= 42; i++) {
            var questionName = 'q' + i;
            var questionRadios = document.querySelectorAll('input[name="' + questionName + '"]');
            var answeredQuestion = false;

            for (var j = 0; j < questionRadios.length; j++) {
                if (questionRadios[j].checked) {
                    answeredQuestion = true;
                    break;
                }
            }

            if (!answeredQuestion) {
                answeredAllQuestions = false;
                break;
            }
        }

        if (!answeredAllQuestions) {
            alert("Please answer all the questions.");
            return false;
        }

        return true;
    }
</script>

</body>
</html>

