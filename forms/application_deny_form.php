<?php
    session_start(); 
    include '../db_connection.php';

    $app_id = $_POST["denied_app_id"];
    $reason = $_POST["denied_text"];

    $sql = "UPDATE application SET STATE='ΑΠΟΡΡΙΦΘΕΙΣΑ', REASON_OF_DENIAL='" . $reason . "' WHERE APPLICATION_ID=" . $app_id;

    echo $sql;

    $result = mysqli_query($conn, $sql);

    header("Location: ../work_edit_application.php?id=" . $app_id);
    exit();
?>
