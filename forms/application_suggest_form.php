<?php
    session_start(); 
    include '../db_connection.php';

    $app_id = $_POST["suggest_app_id"];
    $uni = $_POST["suggest_university"];
    $dep = $_POST["suggest_department"];
    $sub = $_POST["suggest_subject"];

    $sql = "INSERT INTO suggested (APPLICATION_ID, UNIVERSITY, DEPARTMENT, SUBJECT) VALUES ('" . $app_id ."', '" . $uni . "', '" . $dep . "', '" . $sub . "')";

    echo $sql;

    $result = mysqli_query($conn, $sql);

    header("Location: ../work_edit_application.php?id=" . $app_id);
    exit();
?>
