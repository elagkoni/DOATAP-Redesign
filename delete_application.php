<?php
    session_start(); 
    include './db_connection.php';

    if (isset($_GET["id"]) && $_GET["id"] != '') {
        $check = TRUE;
        $app_id = $_GET["id"];
        $sql = "SELECT * FROM application a WHERE USER_ID=" . $_SESSION["USER_ID"] . " AND APPLICATION_ID=" . $app_id;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $state = $row["STATE"];
            if ($state == "ΠΡΟΧΕΙΡΗ") {
                $sql = "DELETE FROM application WHERE APPLICATION_ID=" . $app_id;
                mysqli_query($conn, $sql);
            }
        }
    }
     
    header("Location: ../user.php");
?>