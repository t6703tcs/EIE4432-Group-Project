<?php
            //Connect to SQL sever
            include "mysql-connect.php";
            $connect = mysqli_connect($server, $user, $pw, $db);

            if (!$connect) {
                die('Could not connect: ' . mysqli_error($connect));
            }

            //Get selected empID from the HTML page
            $deleteID = $_POST["idDisplay"];

            //Select empID to delete record by using SQL
            $sql = "DELETE FROM user WHERE id = '$deleteID'";

            //Show message when record is removed successfully
            if (mysqli_query($connect, $sql)) {
                echo "<h3>A user record is removed successfully!</h3>";
                header('Location: /EIE4432-Group-Project/php/systemManagement.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connect);
            }

            mysqli_close($connect);
            ?>