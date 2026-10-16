<?php
    session_start();
    include '../db_connection.php';

    $username = $_POST["username"];
    $password = $_POST["password1"];
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $fatherName = $_POST["fathername"];
    $motherName = $_POST["mothername"];
    $birthdate = $_POST["birthdate"];
    $landline = isset($_POST["telephone"]) ? $_POST["telephone"] : '';
    $mobileNumber = $_POST["phone"];
    $email = $_POST["email"];

    $sql = 
    "INSERT INTO default_user (username, email, password, firstname, lastname, fathername, mothername, birthdate, phone, telephone)
    VALUES ('" . $username . "', '" . $email . "', '" . $password . "', '" . $firstName . "', '" . $lastName . "', '" 
    . $fatherName . "', '" . $motherName . "', '" . $birthdate . "', '" . $mobileNumber . "', '"  . $landline . "')";

    $result = mysqli_query($conn, $sql);

    header("Location: ../login.php");
    exit();
?>
