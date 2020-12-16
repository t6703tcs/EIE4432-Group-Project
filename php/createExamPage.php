<!DOCTYPE html>

<head>
    <title>Create Exam</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/EIE4432-Group-Project/js/function.js"></script>
    <script src="/EIE4432-Group-Project/js/cookie.js"></script>

    <script>
        function chooseType() {
            var radios = document.getElementsByName("QuestionType");
            var selected = Array.from(radios).find(radio => radio.checked);
            var QuestionText = document.getElementById("Question").value;
            var AddMC = document.getElementById("AddMC");
            var AddTF = document.getElementById("AddTF");
            //If "MC" is checked
            if (selected == MC) {
                var AddMC = document.getElementById("AddMC");
                var AddTF = document.getElementById("AddTF");
                AddMC.style.display = "block";
                AddTF.style.display = "none";
                //If "TF" is checked
            } else if (selected == TF) {
                var AddMC = document.getElementById("AddMC");
                var AddTF = document.getElementById("AddTF");
                AddTF.style.display = "block";
                AddMC.style.display = "none";
            }

        }

        function hideAll() {
            var mc = document.getElementById("AddMC");
            var tf = document.getElementById("AddTF");
            mc.style.display = "none";
            tf.style.display = "none";
        }

        function GenerateID() {
            document.getElementById("AddTime").disabled = true;
            var ExamDate = document.getElementById("ExamDate").value;
            var StartTime = document.getElementById("StartTime").value;
            var EndTime = document.getElementById("EndTime").value;
            var ED = ExamDate.toString();
            var ST = StartTime.toString();
            var ET = EndTime.toString();
            var rawID = ED + ST + ET;

            var ExamID = rawID.replace(/\D/g, "");
            var tag = document.createElement("p");
            var text = document.createTextNode("The Exam will be held on " + ED + " at " + ST + " - " + ET + ". ");
            tag.appendChild(text);
            var element = document.getElementById("TimeChose");
            element.appendChild(tag);
            // alert(ExamID);
        }

        function ResetDate() {
            document.getElementById("AddTime").disabled = false;
            var element = document.getElementById("TimeChose");
            TimeChose.parentNode.removeChild(TimeChose);
        }

        function storeExamInfo() {
            var ExamID = document.getElementById("ExamID").value;
            var ExamDate = document.getElementById("ExamDate").value;
            var StartTime = document.getElementById("StartTime").value;
            var EndTime = document.getElementById("EndTime").value;

            createCookie("ExamID", ExamID, 1);
            createCookie("ExamDate", ExamDate, 1);
            createCookie("StartTime", StartTime, 1);
            createCookie("EndTime", EndTime, 1);

            //document.getElementById("modifyBox").hidden = false;
            window.location.href = "/EIE4432-Group-Project/php/addQuestion.php";
        }
    </script>

</head>

<body onload="">
    <div class="jumbotron text-center " style="margin-bottom:0 ">
        <h1>Online examination system</h1>
        <p id="welcomMsg ">Welcome! </p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
        <a class="navbar-brand " href="# ">Online examination system</a>
        <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#collapsibleNavbar ">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse " id="collapsibleNavbar ">
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link " href="/EIE4432-Group-Project/html/login.html ">Login</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="/EIE4432-Group-Project/html/registration.html ">Registration</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mb-5" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-4">
                <h3>Functions</h3>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/EIE4432-Group-Project/html/login.html">Back</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/EIE4432-Group-Project/html/login.html" onclick="clearCookie();">Log Out</a>
                    </li>
                </ul>
                <hr class="d-sm-none">
            </div>

            <div class="col-sm-8">
                <h1>Schedule Exam Here:</h1>

                <div id="setTime">
                    <form action="" method="POST">
                        <br>
                        <label for="ExamDate">Date of the Exam: </label>
                        <input type="date" id="ExamDate" name="ExamDate" value="YYYY-MM-DD" required>
                        <br><br>
                        <label for="StartTime">Starting Time of the Exam: </label>
                        <input type="time" id="StartTime" name="StartTime" value="--:--" required>
                        <br><br>
                        <label for="EndTime">Ending Time of the Exam: </label>
                        <input type="time" id="EndTime" name="EndTime" value="--:--" required>
                        <br><br> Exam ID:
                        <input type="text" id="ExamID" name="ExamID" required>
                        <br><br>

                        <input type="button" value="Submit" onclick="storeExamInfo();"> <input type="reset" value="Reset All">
                    </form>
                </div>

                <!-- <br><br>
                <p>Question Type: </p>
                <input type="radio" id="MC" name="QuestionType" value="MC"> MC
                <input type="radio" id="TF" name="QuestionType" value="TF"> T/F
                <input type="button" value="Continue..." id="Chose" onclick="chooseType()">


                <br>
                <label for="ExamDate">Date of the Exam: </label>
                <input type="date" id="ExamDate" name="ExamDate" value="YYYY-MM-DD" required>
                <br><br>
                <label for="StartTime">Starting Time of the Exam: </label>
                <input type="time" id="StartTime" name="StartTime" value="--:--" required>
                <br><br>
                <label for="EndTime">Ending Time of the Exam: </label>
                <input type="time" id="EndTime" name="EndTime" value="--:--" required>
                <br><br>

                Exam ID: <input type="text" id="ExamID" name="ExamID" required>
                Question ID: <input type="text" id="QuestionID" name="QuestionID" required>
                <br><br>
                <input type="submit" value="Add Question"> <input type="reset" value="Reset" id="ResetTime" onclick="ResetDate()">

                <br><br>
                <label for="Question">Question: </label>
                <br>
                <textarea id="Question" name="Question" rows="4" cols="50" required>
        </textarea>

                <div id="AddMC">
                    <form action="/EIE4432-Group-Project/php/setExam.php" method="POST">
                        <br>
                        <label for="ExamDate">Date of the Exam: </label>
                        <input type="date" id="ExamDate" name="ExamDate" value="YYYY-MM-DD" required>
                        <br><br>
                        <label for="StartTime">Starting Time of the Exam: </label>
                        <input type="time" id="StartTime" name="StartTime" value="--:--" required>
                        <br><br>
                        <label for="EndTime">Ending Time of the Exam: </label>
                        <input type="time" id="EndTime" name="EndTime" value="--:--" required>
                        <br><br> Exam ID (please stay the same for the same Exam): <input type="text" id="ExamID" name="ExamID" required><br><br> Question ID (please change for each question): <input type="text" id="QuestionID" name="QuestionID" required>
                        <br><br>
                        <label for="Question">Question: </label>
                        <br>
                        <textarea id="Question" name="Question" rows="4" cols="50" required></textarea>

                        <br><br> Choice A: <input type="text" id="choiceA" name="choiceA" required> Choice B: <input type="text" id="choiceB" name="choiceB" required>
                        <br><br> Choice C: <input type="text" id="choiceC" name="choiceC" required> Choice D: <input type="text" id="choiceD" name="choiceD" required>
                        <br><br> Correct Answer:
                        <select id="Answer" name="Answer" required>
                            <option selected hidden value="">Select Correct Ans</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>

                        <br><br><br><br> Score for this question:
                        <input type="number" id="Score" name="Score" min="1" max="100" required>
                        <br><br><br>
                        <input type="submit" value="Add Question"> <input type="reset" value="Reset All">
                    </form>
                </div>

                <div id="AddTF">
                    <br><br>
                    <form action="/EIE4432-Group-Project/php/AddExam.php" method="POST">
                        <label for="ExamDate">Date of the Exam: </label>
                        <input type="date" id="ExamDate" name="ExamDate" value="YYYY-MM-DD" required>
                        <br><br>
                        <label for="StartTime">Starting Time of the Exam: </label>
                        <input type="time" id="StartTime" name="StartTime" value="--:--" required>
                        <br><br>
                        <label for="EndTime">Ending Time of the Exam: </label>
                        <input type="time" id="EndTime" name="EndTime" value="--:--" required>
                        <br><br> Exam ID (please stay the same for the same Exam): <input type="text" id="ExamID" name="ExamID" required><br><br> Question ID (please change for each question): <input type="text" id="QuestionID" name="QuestionID" required>
                        <br><br>
                        <label for="Question">Question: </label>
                        <br>
                        <textarea id="Question" name="Question" rows="4" cols="50" required></textarea>
                        <br><br> Correct Answer:
                        <select id="Answer" name="Answer" required>
                            <option selected hidden value="">Select Correct Ans</option>
                            <option value="T">TRUE</option>
                            <option value="F">FALSE</option>
                        </select>
                        <br><br><br><br> Score for this question:
                        <input type="number" id="Score" name="Score" min="1" max="100" required>
                        <br><br><br> -->
                <!-- <input type="button" onclick="document.getElementById('QuestionID').value = ''" value="Type A New T/F Question"> -->
                <!-- <input type="submit" value="Add Question"> <input type="reset" value="Reset All">
                    </form>
                </div>-->
            </div>
        </div>
    </div>

    <div class="jumbotron text-center ">
        <p></p>
    </div>

</body>

</html>