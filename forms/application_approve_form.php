<?php
    session_start(); 
    include '../db_connection.php';

    $app_id = $_POST["approved_app_id"];
    $uni = $_POST["approve_university"];
    $dep = $_POST["approve_department"];

    $sql = "INSERT INTO approved (APPLICATION_ID, UNIVERSITY, DEPARTMENT) VALUES ('" . $app_id ."', '" . $uni . "', '" . $dep . "')";
    $result = mysqli_query($conn, $sql);
    echo $sql;

    $sql = "UPDATE application SET STATE='ΕΓΚΕΚΡΙΜΕΝΗ' WHERE APPLICATION_ID=" . $app_id;
    $result = mysqli_query($conn, $sql);
    echo $sql;

    header("Location: ../work_edit_application.php?id=" . $app_id);
    exit();
?>
