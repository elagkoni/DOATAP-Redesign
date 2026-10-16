<?php
    session_start();
    include '../db_connection.php';

    $errors = array(); 
    $changed_fields = 0;

    if(isset($_POST['firstname']) && $_POST['firstname'] !== '' && $_SESSION['login_user'] === true ) {
        $firstname = $_POST['firstname'] = mysqli_real_escape_string($conn, $_POST['firstname']);
        $changed_fields++;
    } else {
        $firstname = $_SESSION['firstname'];
    }

    if(isset($_POST['lastname']) && $_POST['lastname'] !== '' && $_SESSION['login_user'] === true ) {
        $lastname = $_POST['lastname'] = mysqli_real_escape_string($conn, $_POST['lastname']);
        $changed_fields++;
    } else {
        $lastname = $_SESSION['lastname'];
    }

    if(isset($_POST['birthdate']) && $_POST['birthdate'] !== '' && $_SESSION['login_user'] === true ) {
        $birthdate = $_POST['birthdate'] = mysqli_real_escape_string($conn, $_POST['birthdate']);
        $changed_fields++;
    } else {
        $birthdate = $_SESSION['birthdate'];
    }

    if(isset($_POST['fathername']) && $_POST['fathername'] !== '' && $_SESSION['login_user'] === true ) {
        $fathername = $_POST['fathername'] = mysqli_real_escape_string($conn, $_POST['fathername']);
        $changed_fields++;
    } else {
        $fathername = $_SESSION['fathername'];
    }

    if(isset($_POST['mothername']) && $_POST['mothername'] !== '' && $_SESSION['login_user'] === true ) {
        $mothername = $_POST['mothername'] = mysqli_real_escape_string($conn, $_POST['mothername']);
        $changed_fields++;
    } else {
        $mothername = $_SESSION['mothername'];
    }

    if(isset($_POST['email']) && $_POST['email'] !== '' && $_SESSION['login_user'] === true ) {
        $email = $_POST['email'] = mysqli_real_escape_string($conn, $_POST['email']);
        $changed_fields++;
    } else {
        $email = $_SESSION['email'];
    }

    if(isset($_POST['telephone']) && $_POST['telephone'] !== '' && $_SESSION['login_user'] === true ) {
        $telephone = $_POST['telephone'] = mysqli_real_escape_string($conn, $_POST['telephone']);
        $changed_fields++;    
    } else {
        $telephone = $_SESSION['telephone'];
    }

    if(isset($_POST['phone']) && $_POST['phone'] !== '' && $_SESSION['login_user'] === true ) {
        $phone = $_POST['phone'] = mysqli_real_escape_string($conn, $_POST['phone']);
        $changed_fields++;    
    } else {
        $phone = $_SESSION['phone'];
    }

    if(isset($_POST['oldpassword'])  && $_POST['oldpassword'] !== '' && $_SESSION['login_user'] === true ) {

        if ($_POST['oldpassword'] !== $_SESSION['password']) {
            echo "Μη έγκυρος κωδικός<br>";
            array_push($errors, "Μη έγκυρος κωδικός");
        } 

        if(isset($_POST['password1'])  && $_POST['password1'] !== '' && $_SESSION['login_user'] === true ) {
            if(isset($_POST['password2']) && $_POST['password2'] !== '' && $_SESSION['login_user'] === true ) {            
                if ($_POST['password1'] !== $_POST['password2']) {
                    echo "Οι κωδικοί που εισάγατε δεν ταιριάζουν<br>";
                    array_push($errors, "Οι κωδικοί που εισάγατε δεν ταιριάζουν");
                }
                $password = $_POST['password1'];
                $changed_fields++;                    
            } else {
                echo "Πρέπει να συμπληρώσετε όλα τα πεδία";
                array_push($errors,"Πρέπει να συμπληρώσετε όλα τα πεδία");
            }
        } 
    } else {
        $password = $_SESSION['password'];
    }

    if (count($errors) == 0 && $changed_fields > 0) {

        $id = $_SESSION["USER_ID"];
        $query = "UPDATE default_user 
                    SET  password = '$password', firstname = '$firstname', lastname ='$lastname', birthdate ='$birthdate', fathername = '$fathername', mothername ='$mothername', email = '$email', telephone = '$telephone', phone = '$phone'
                    WHERE USER_ID = '$id'";

        if (mysqli_query($conn, $query)){
            
            $_SESSION["password"] = $password;
            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            $_SESSION["birthdate"] = $birthdate;
            $_SESSION["fathername"] = $fathername;
            $_SESSION["mothername"] = $mothername;
            $_SESSION["email"] = $email;
            $_SESSION["telephone"] = $telephone;
            $_SESSION["phone"] = $phone;     
                             
            echo 'OK';
        } else {
            array_push($errors, "Αποτυχία ενημέρωσης");
            echo 'Αποτυχία ενημέρωσης προφίλ<br>';
        } 
    } else {
        if($changed_fields === 0){
            echo 'Κανένα ενημερώμενο πεδίο<br>';
        } else {
            echo 'Αποτυχία ενημέρωσης προφίλ<br>';
        }
    }
      
?>
