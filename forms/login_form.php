<?php
    session_start();
    include '../db_connection.php';

    $errors = array(); 

    $username = $_POST['username'] = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'] = mysqli_real_escape_string($conn, $_POST['password']);


    $user_check_query = "SELECT * FROM default_user WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists

        $user_check_query_with_psw = "SELECT * FROM default_user WHERE username='$username' AND password='$password' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query_with_psw);
        $validated_user = mysqli_fetch_assoc($result);
        if ( !$validated_user ) {
            echo 'Λάθος κωδικός πρόσβασης.<br>Προσπαθήστε ξανά<br>'; 
            array_push($errors, "Λάθος κωδικός πρόσβασης");
        }

    } else {
        echo "Το όνομα χρήστη " . $username . " δεν υπάρχει.<br>Προσπαθήστε ξανά<br>"; 
        array_push($errors, "Το όνομα χρήστη δεν υπάρχει");
    }


    // Finally, register user if there are no errors in the form
    if (count($errors) == 0 && $validated_user) {

            
        $_SESSION['submit'] = true;
        $_SESSION['login_user'] = true;
        
        $_SESSION["USER_ID"] = $validated_user['USER_ID'];
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["firstname"] = $validated_user['firstname'];
        $_SESSION["lastname"] = $validated_user['lastname'];
        $_SESSION["fathername"] = $validated_user['fathername'];
        $_SESSION["mothername"] = $validated_user['mothername'];
        $_SESSION["email"] = $validated_user['email'];
        $_SESSION["birthdate"] = $validated_user['birthdate'];
        $_SESSION["phone"] = $validated_user['phone'];       
        $_SESSION["telephone"] = $validated_user['telephone'];  

        $_SESSION["ADMIN"] = $validated_user['ADMIN'];

        echo 'OK';
    } else {
        echo '<br>Αποτυχία σύνδεσης<br>';
    }
?>