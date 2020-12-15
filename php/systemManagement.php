<!DOCTYPE html>

<head>
    <title>User Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/EIE4432-Group-Project/js/function.js"></script>
    <script src="/EIE4432-Group-Project/js/cookie.js"></script>

    <script>
        function showID() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "getSQL.php", true);
            xmlhttp.send();
            xmlhttp.onload = function() {
                document.getElementById("idDisplay").innerHTML = this.responseText;
            }
        }
    </script>

</head>

<body onload="showID();">

    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Online examination system</h1>
        <p id="welcomMsg">Welcome! </p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Online examination system</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/EIE4432-Group-Project/html/login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/EIE4432-Group-Project/html/registration.html">Registration</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container" style="margin-top:30px">
        <!-- Delete alert box -->
        <div class="alert alert-dark" id="deleteBox" hidden>
            <strong>Delete:</strong>
            <form action="delete.php" method="post">
                <p>Choose one user to delete:
                    <select class="form-control" id="idDisplay" name="idDisplay">
                    </select>
                    <div class="text-center"><input class="btn btn-dark" type="submit" value="Submit to Delete"></p></div>
                    
            </form>
        </div>
        <!-- Insert alert box -->
        <div class="alert alert-dark" id="insertBox" hidden>
            <strong>Insert:</strong>
            <div class="alert alert-danger alert-dismissible fade show" id="warningBox" hidden>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Warning!</strong> Please input all required information.
        </div>

        <div class="alert alert-info alert-dismissible fade show" id="roleBox" hidden>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Warning!</strong> Please select your role. (Student/ Teacher)
        </div>

        <div class="alert alert-warning alert-dismissible fade show" id="inputBox" hidden>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Warning!</strong> The format of information is wrong. <br>User ID should be digits and Email address should contain "@"
        </div>

        <div class="row h-100 justify-content-center align-items-center">
            <form class="col-12" method="post" action="/EIE4432-Group-Project/php/registration.php" id="form_content" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="text">Student/ Teacher:</label>
                    <select class="form-control" id="Select_S_T" name="Select_S_T" onchange="checkRoles()">
                        <option value="" selected disabled>Select Student/ Teacher</option>
                        <option>Student</option>
                        <option>Teacher</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">User ID:</label>
                    <input type="text" class="form-control" placeholder="Enter User ID" id="UserID" name="UserID">
                </div>
                <div class="form-group">
                    <label for="text">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter Password" id="pwd" name="pwd">
                </div>
                <div class="form-group">
                    <label for="text">Nick Name:</label>
                    <input type="text" class="form-control" placeholder="Enter Nick Name" id="nickName" name="nickName">
                </div>
                <div class="form-group" id="gender_hide_show">
                    <label for="text">Gender:</label>
                    <select class="form-control" id="gender" name="gender" disabled>
                        <option value="" selected disabled></option>
                        <option>M</option>
                        <option>F</option>
                    </select>
                </div>
                <div class="form-group" id="course_hide_show">
                    <label for="text">Course:</label>
                    <select class="form-control" id="course" name="course" disabled>
                        <option value="" selected disabled></option>
                        <option>EIE3333_20201_A: Data and Computer Communications</option>
                        <option>EIE4435_20201_A: Image and Audio Processing</option>
                        <option>EIE3109_20201_A: Mobile Systems and Application Development</option>
                        <option>EIE3320_20201_A: Object-oriented Design and Programming</option>
                        <option>EIE4432_20201_A: Web Systems and Technologies</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">Email address:</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                </div>
                <div class="form-group" id="birthday_hide_show">
                    <label for="text">Birthday:</label>
                    <input type="date" class="form-control" placeholder="Enter birthday" id="birthday" name="birthday" disabled>
                </div>
                <div class="form-group">
                    <label for="ProfileImage">Profile image:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="button" class="btn btn-dark mt-3" onclick="checkInfo()" id="btnSubmit">Submit</button>
                </div>
            </form>
        </div>
        </div>



        <div class="row">
            <div class="col-sm-4">
                <h2>System Management</h2>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="enableDelete();">Delete</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="enableInsert();">Insert</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/EIE4432-Group-Project/html/changePassword.html">Change password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/EIE4432-Group-Project/html/login.html" onclick="clearCookie();">Log Out</a>
                    </li>
                </ul>
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-8">
                <h2>Show all records</h2>
                <?php
                //Connect to SQL sever
                include "mysql-connect.php";
                $connect = mysqli_connect($server, $user, $pw, $db);

                if (!$connect) {
                    die('Could not connect: ' . mysqli_error($connect));
                }

                //Get selected inputted values from the HTML page
                //$ID = strval($_POST['UserID']);

                //Select all record to display by using SQL
                $userQuery = strval("SELECT * FROM `user`");
                //$sql = strval($userQuery+intval($ID));

                $result = mysqli_query($connect, $userQuery);
                $count = mysqli_num_rows($result);

                if (!$result) {
                    die("Could not successfully run query.");
                }
                if (mysqli_num_rows($result) == 0) {
                    print "No records were found with query $userQuery";
                } else {
                    $i = 0;
                    print "<p>There are <a id='idCount'>" . $count . "</a> users as follows: </p>";
                    print "<table class='table table-hover text-center'><form>";
                    print "<tr><th> ID </th><th> Name </th><th> Password </th><th> Role </th><th> Gender </th><th> Birthday </th><th> Course </th><th>  </th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $selectedID = $row['id'];
                        print "<tr><td id='Id_$i'>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['password'] . "</td><td>" . $row['role'] . "</td><td>" . $row['gender'] . "</td><td>" . $row['birthday'] . "</td><td>" .
                            $row['course'] . "</td><td>  <button type='button' class='btn btn-info' value='$selectedID' onclick=". "editInfo('".$selectedID ."')" .">Edit</button> </td></tr>";
                        $i++;
                    }
                    print "</form></table>";
                }
                mysqli_close($connect);

                ?>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center">
    </div>

</body>

</html>