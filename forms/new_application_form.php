<?php
    session_start(); 
    include '../db_connection.php';

    $type = $_POST["submit"];

    $app_id = "APPLICATION_ID";
    if (isset($_POST["app_id"])) {
        $app_id = $_POST["app_id"];
    }

    if ($type == "DELETE") {
        if ($app_id != "APPLICATION_ID") {
            $sql = "DELETE FROM application WHERE APPLICATION_ID=" . $app_id;
            echo $sql;
            mysqli_query($conn, $sql);
        }
        header("Location: ../user.php");
        exit();
    }

    $errors = array(); 
    $user_id = $_SESSION["USER_ID"];
    $creation_date = date("Y-m-d");
    $titletype = isset($_POST["title-type"]) && $_POST["title-type"] != '' ? $_POST["title-type"] : "NULL";
    if ($titletype != "NULL") {
        if ($titletype == "Βασικό") {
            $titletype = "'ΒΑΣΙΚΟ'";
        } else if ($titletype == "Μεταπτυχιακό") {
            $titletype = "'ΜΕΤΑΠΤΥΧΙΑΚΟ'";
        } else {
            $titletype = "'ΔΙΔΑΚΤΟΡΙΚΟ'";
        }
    }
    $country    = (isset($_POST["country"])      && $_POST["country"]    != '') ? "'" . $_POST["country"] . "'"       : "NULL";
    $university = (isset($_POST["university"])   && $_POST["university"] != '') ? "'" . $_POST["university"] . "'"    : "NULL"; 
    $department = (isset($_POST["department"])   && $_POST["department"] != '') ? "'" . $_POST["department"] . "'"    : "NULL"; 
    $startdate  = (isset($_POST["start-date"])   && $_POST["start-date"] != '') ? "'" . $_POST["start-date"] . "'"    : "NULL"; 
    $enddate    = (isset($_POST["end-date"])     && $_POST["end-date"]   != '') ? "'" . $_POST["end-date"] . "'"      : "NULL"; 

    $otherCountry = (isset($_POST["other_country"])  && $_POST["other_country"]  != '') ? "'" . $_POST["other_country"] . "'" : "NULL";
    $otherUni     = (isset($_POST["other_uni"])      && $_POST["other_uni"]      != '') ? "'" . $_POST["other_uni"]     . "'" : "NULL";
    $otherDep     = (isset($_POST["other_dep"])      && $_POST["other_dep"]      != '') ? "'" . $_POST["other_dep"]     . "'" : "NULL";

    if ($country == "'other'") {
        $country = $otherCountry; 
    }

    if ($university == "'other'") {
        $university = $otherUni; 
    }

    if ($department == "'other'") {
        $department = $otherDep; 
    }
            
    if ($app_id == "APPLICATION_ID") {
        $insert_action = "INSERT INTO `application`(`USER_ID`, `STATE`, `CREATION_DATE`, `DEGREE`, `COUNTRY`, `UNIVERSITY`, `DEPARTMENT`, `DATE_START`, `DATE_END`)
            VALUES ('$user_id', '$type','$creation_date', $titletype, $country, $university, $department, $startdate, $enddate)";
    } else {
        $insert_action = "UPDATE `application`
            SET STATE='$type', CREATION_DATE='$creation_date', DEGREE=$titletype, COUNTRY=$country, UNIVERSITY=$university, DEPARTMENT=$department, DATE_START=$startdate, DATE_END=$enddate
            WHERE APPLICATION_ID='$app_id'";
    }

    if(!mysqli_query($conn, $insert_action)){
        echo mysqli_errno($conn)."_--".mysqli_error($conn)."<br>";
    } else {
        echo "OK";    
    }

    $query = "SELECT MAX(APPLICATION_ID) as maxv FROM application";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $app_id = $row["maxv"];

    if ($type == "ΕΚΚΡΕΜΗΣ") {
        $target_dir = "../uploads/";
        if(!is_dir($target_dir)) 
            mkdir($target_dir);

        $target_dir = "../uploads/" . $user_id . "/";
        if(!is_dir($target_dir)) 
            mkdir($target_dir);

        $target_dir = "../uploads/" . $user_id . "/" . $app_id . "/";
        if(!is_dir($target_dir)) 
            mkdir($target_dir);

        $count = count($_FILES['file-upload']["name"]);   
        for ($i = 0; $i < $count; $i++) {
            $target_file = $target_dir . basename($_FILES["file-upload"]["name"][$i]);

            // TODO: Check if file already exists in javascript
            // TODO: Check file size in javascript
            // TODO: Allow certain file formats in javascript

            if (move_uploaded_file($_FILES["file-upload"]["tmp_name"][$i], $target_file)) {
                $insert_action = "INSERT INTO `document`(`APPLICATION_ID`, `USER_ID`, `FILENAME`)
                    VALUES ('$app_id', '$user_id','" . $_FILES["file-upload"]["name"][$i] . "')";
                mysqli_query($conn, $insert_action);
            }
        }
    }
     
    header("Location: ../user.php");
?>