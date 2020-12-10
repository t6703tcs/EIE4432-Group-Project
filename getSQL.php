    <?php
    include "mysql-connect.php";
    $connect = mysqli_connect($server, $user, $pw, $db);

    if (!$connect) {
        die('Could not connect: ' . mysqli_error($connect));
    }

    $sql = "SELECT empID FROM timesheet";
    $result = mysqli_query($connect, $sql);

    //Create dropdown list
    echo "<option selected disabled hidden></option>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<option>" . $row['empID'] . "</option>";
    }
    mysqli_close($connect);
    ?>
