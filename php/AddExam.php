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
    </script>

</head>

<body onload="hideAll();">
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
                    <a class="nav-link " href="login.html ">Login</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="registration.html ">Registration</a>
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
                        <a class="nav-link" href="/EIE4432-Group-Project/php/createExamPage.php">Back</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/EIE4432-Group-Project/html/login.html" onclick="clearCookie();">Log Out</a>
                    </li>
                </ul>
                <hr class="d-sm-none">
            </div>

            <div class="col-sm-8">
                <?php

                echo "<h2>The Question has been added!</h2>";
                echo "<h2>You can click Back on your browser to add another question!</h2>";

                $hostname = "localhost";
                $username = "root";
                $password = "";
                $dbname = "lib";

                $ExamID = $_POST['ExamID'];
                $QuestionID = $_POST['QuestionID'];

                $ExamDate = $_POST['ExamDate'];
                $StartTime = $_POST['StartTime'];
                $EndTime = $_POST['EndTime'];
                $Question = $_POST['Question'];


                $choiceA = @$_POST['choiceA'];
                $choiceB = @$_POST['choiceB'];
                $choiceC = @$_POST['choiceC'];
                $choiceD = @$_POST['choiceD'];

                $Answer = $_POST['Answer'];
                $Score = $_POST['Score'];

                $connect = mysqli_connect($hostname, $username, $password, $dbname);
                $query = "INSERT INTO `question`( `ExamDate`, `StartTime`, `EndTime`, `ExamID`, `QuestionID`, `Question`, `choiceA`, `choiceB`, `choiceC`, `choiceD`, `Answer`, `Score`) 
                VALUES ('$ExamDate', '$StartTime', '$EndTime', '$ExamID', '$QuestionID', '$Question' , '$choiceA',  '$choiceB', '$choiceC', '$choiceD', '$Answer', '$Score')";

                $result = mysqli_query($connect, $query);
                if ($result) {
                    return TRUE;
                    echo 'Data Inserted';
                } else {
                    return FALSE;
                    echo 'Data Not Inserted';
                }

                mysqli_free_result($result);
                mysqli_close($connect);

                ?>

            </div>
        </div>
    </div>

    <div class="jumbotron text-center ">
        <p></p>
    </div>

</body>

</html>