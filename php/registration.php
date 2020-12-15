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
</head>

<body>

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
                <li class="nav-item">
                    <a class="nav-link" href="#">Exam</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container h-100 mt-3">
        <?php
        //Connect to SQL sever
        include "mysql-connect.php";
        //include "upload.php";
        $connect = mysqli_connect($server, $user, $pw, $db);

        if (!$connect) {
            die('Could not connect: ' . mysqli_error($connect));
        }


        //Get selected inputted values from the HTML page
        $ID = $_POST['UserID'];
        $pw = $_POST['pwd'];
        $nickName = $_POST['nickName'];
        $email = $_POST['email'];
        $role = $_POST['Select_S_T'];

        // $statusMsg = '';

        // // File upload path
        // $targetDir = "uploads/";
        // $fileName = basename($_FILES["fileToUpload"]["name"]);
        // $targetFilePath = $targetDir . $fileName;
        // $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // if (isset($_POST["submit"]) && !empty($_FILES["fileToUpload"]["name"])) {
        //     // Allow certain file formats
        //     $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        //     if (in_array($fileType, $allowTypes)) {
        //         // Upload file to server
        //         if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
        //             // Insert image file name into database
        //             $insert = $connect->query("INSERT into `image` (`ID`, `imageName`, imagePath) VALUES ($ID , '" . $fileName . "' , $targetFilePath)");
        //             if ($insert) {
        //                 $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
        //             } else {
        //                 $statusMsg = "File upload failed, please try again.";
        //             }
        //         } else {
        //             $statusMsg = "Sorry, there was an error uploading your file.";
        //         }
        //     } else {
        //         $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        //     }
        // } else {
        //     $statusMsg = 'Please select a file to upload.';
        // }

        // // Display status message
        // echo $statusMsg;


        //Select inputted values to INSERT record by using SQL
        if ($role == "Teacher") {
            $course = $_POST['course'];

            $sql = "INSERT INTO user (`id`, `name`, `email`, `password`, `image`, `role`, `course`)
            VALUES ($ID, '$nickName', '$email', '$pw', '', '$role', '$course')";
        } else if ($role == "Student") {
            $birthday = $_POST['birthday'];
            $gender = $_POST['gender'];

            $sql = "INSERT INTO user (`id`, `name`, `email`, `password`, `image`, `role`, `gender`, `birthday`)
            VALUES ($ID, '$nickName', '$email', '$pw', '', '$role', '$gender', '$birthday')";
        }

        //Show message when record is added successfully
        if (mysqli_query($connect, $sql)) {
            echo "<h3>A new user record is added successfully!</h3><br>";
            echo "Please upload a profile image:";
            echo '<form class="col-12" action="/EIE4432-Group-Project/php/upload.php" method="post" enctype="multipart/form-data">';
            echo '<div class="form-group">
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
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
                </form>';
        } else {
            $err = "Error: " . $sql . "<br>" . mysqli_error($connect);
            if (strpos($err, "Duplicate") == true) {
                echo "<h3>User ID or email is used already. \nPlease use another email.</h3><br>";
            } else {
                echo $err;
            }
        }
        mysqli_close($connect);
        ?>

    </div>

    <div class="jumbotron text-center">
        <p></p>
    </div>

</body>

</html>