<?php
include "db_connection.php";

if(isset($_POST['email'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);

   $query = "SELECT count(*) as c FROM default_user WHERE email='" . $email . "'";

   $result = mysqli_query($conn, $query);
   
   $response = 1;
   if(mysqli_num_rows($result)) {
      $row = mysqli_fetch_array($result);
      $count = $row['c'];
      if($count > 0) {
        $response = 0;
      }
   }

   echo $response;
   die;
}

if(isset($_POST['username'])){
   $username = mysqli_real_escape_string($conn, $_POST['username']);

   $query = "SELECT count(*) as c FROM default_user WHERE username='" . $username . "'";

   $result = mysqli_query($conn, $query);
   
   $response = 1;
   if(mysqli_num_rows($result)) {
      $row = mysqli_fetch_array($result);
      $count = $row['c'];
      if($count > 0) {
        $response = 0;
      }
   }

   echo $response;
   die;
}
?>