<?php
include 'db_connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="shortcut icon" type="image/png" href="pictures/favicon.png" />

  <title>ΔΟΑΤΑΠ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link href="./css/site.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Eterna - v4.7.0
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- Only allow admins -->
  <?php
  if($_SESSION['ADMIN'] != 1){
    // isn't admin, redirect them
    header("Location: index.php");
  }
  ?>

  <?php include "./header.php"; ?>

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="index.php">Αρχική</a></li>
        <li>Διαχείριση Αιτήσεων</li>
      </ol>
    </div>
  </section><!-- End Breadcrumbs -->

  <main id="main">

    <div class="container row">
      <form>
        <button type="button" class="btn btn-light" onclick="history.back()"><i class="bi bi-arrow-left"></i>&nbsp;Επιστροφή</button>
      </form>
    </div>
    <br>

    <?php
    if (isset($_GET["app_id"]) && $_GET["app_id"] != '') {
      $app_id = $_GET["app_id"];
    } else {
      $app_id = "APPLICATION_ID";
    }

    if (isset($_GET["user_id"]) && $_GET["user_id"] != '') {
      $user_id = $_GET["user_id"];
    } else {
      $user_id = "USER_ID";
    }

    if (!isset($_GET["year"]) || $_GET["year"] == '') {
      $year = "CREATION_DATE = CREATION_DATE";
    } else {
      if ($_GET["year"] == "old") {
        $year = "YEAR(CREATION_DATE)<=2017";
      } else {
        $year = "YEAR(CREATION_DATE)='" . $_GET["year"] . "'";
      }
    }

    if (isset($_GET["state"]) && $_GET["state"] != '') {
      $state = "'" . $_GET["state"] . "'";
    } else {
      $state = "STATE";
    }

    if (isset($_GET["degree"]) && $_GET["degree"] != '') {
      $degree = "'" . $_GET["degree"] . "'";
    } else {
      $degree = "DEGREE";
    }
    ?>
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">

          <div class="col-lg-3">
            <div class="sidebar" style="background: #eaeaea; text-align: center; padding:20px 10px;">

              <h3 class="sidebar-title">Φίλτρα</h3>

              <form action="work_applications.php" method="get" id="filter_form" role="form" class="php-email-form" style="box-shadow:0 0;">

                <div class="sidebar-item search-form">
                  <label for="app_id" class="col-form-label">
                    <h5>Κωδικός αίτησης</h5>
                  </label>
                  <input id="app_id" name="app_id" type="text" form="filter_form" class="form-control" <?php if ($app_id != "APPLICATION_ID") echo 'value="' . $app_id . '"' ?>>
                </div>

                <br>

                <div class="sidebar-item search-form">
                  <label for="user_id" class="col-form-label">
                    <h5>Κωδικός χρήστη</h5>
                  </label>
                  <input id="user_id" name="user_id" type="text" form="filter_form" class="form-control" <?php if ($user_id != "USER_ID") echo 'value="' . $user_id . '"' ?>>
                </div>

                <p>
                <h5 class="sidebar-title">Έτος</h5>
                <div class="sidebar-item" style="display:inline-block; max-width:90%;">
                  <select name="year" class="form-select" form="filter_form">
                    <option value="" <?php if ($year == "CREATION_DATE = CREATION_DATE") echo "selected"; ?>>Όλα</option>
                    <option <?php if ($year == "YEAR(CREATION_DATE)='2022'")    echo "selected"; ?>>2022</option>
                    <option <?php if ($year == "YEAR(CREATION_DATE)='2021'")    echo "selected"; ?>>2021</option>
                    <option <?php if ($year == "YEAR(CREATION_DATE)='2020'")    echo "selected"; ?>>2020</option>
                    <option <?php if ($year == "YEAR(CREATION_DATE)='2019'")    echo "selected"; ?>>2019</option>
                    <option <?php if ($year == "YEAR(CREATION_DATE)='2018'")    echo "selected"; ?>>2018</option>
                    <option value="old" <?php if ($year == "YEAR(CREATION_DATE)<=2017")     echo "selected"; ?>>Προηγούμενα έτη</option>
                  </select>
                </div>
                </p>

                <p>
                <h5 class="sidebar-title">Στάδιο</h5>
                <div class="sidebar-item" style="display:inline-block; max-width:90%;">
                  <select name="state" class="form-select" form="filter_form">
                    <option value="" <?php if ($state == "STATE")      echo "selected"; ?>>Όλα</option>
                    <option value="ΑΠΟΡΡΙΦΘΕΙΣΑ" <?php if ($state == "'ΑΠΟΡΡΙΦΘΕΙΣΑ'")   echo "selected"; ?>>ΑΠΟΡΡΙΦΘΕΙΣΑ</option>
                    <option value="ΕΓΚΕΚΡΙΜΕΝΗ" <?php if ($state == "'ΕΓΚΕΚΡΙΜΕΝΗ'") echo "selected"; ?>>ΕΓΚΕΚΡΙΜΕΝΗ</option>
                    <option value="ΕΚΚΡΕΜΗΣ" <?php if ($state == "'ΕΚΚΡΕΜΗΣ'")  echo "selected"; ?>>ΕΚΚΡΕΜΗΣ</option>
                  </select>
                </div>
                </p>

                <p>
                <h5 class="sidebar-title">Είδος πτυχίου</h5>
                <div class="sidebar-item" style="display:inline-block; max-width:90%;">
                  <select name="degree" class="form-select" form="filter_form">
                    <option value="" <?php if ($degree == "DEGREE")      echo "selected"; ?>>Όλα</option>
                    <option value="ΒΑΣΙΚΟ" <?php if ($degree == "'ΒΑΣΙΚΟ'") echo "selected"; ?>>Βασικό Πτυχίο</option>
                    <option value="ΜΕΤΑΠΤΥΧΙΑΚΟ" <?php if ($degree == "'ΜΕΤΑΠΤΥΧΙΑΚΟ'")  echo "selected"; ?>>Μεταπτυχιακό</option>
                    <option value="ΔΙΔΑΚΤΟΡΙΚΟ" <?php if ($degree == "'ΔΙΔΑΚΤΟΡΙΚΟ'") echo "selected"; ?>>Διδακτορικό</option>
                  </select>
                </div><!-- End sidebar categories-->
                </p><br>

                <div class="text-center">
                  <button type="submit" id="submit_button" form="filter_form">Υποβολή</button>
                </div>

              </form>
            </div><!-- End sidebar -->
          </div>


          <!-- Application table -->

          <div class="col-lg-9">
            <div class="sidebar">
              <table id="myTable" class="table">
                <tr class="header">
                  <th>Κωδικός</th>
                  <th>Στάδιο</th>
                  <th>Ημερομηνία Δημιουργίας</th>
                  <th>Πτυχίο</th>
                  <th>Ενέργειες</th>
                </tr>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM application a WHERE APPLICATION_ID=" . $app_id . " AND USER_ID=" . $user_id . " AND STATE=" . $state . " AND STATE!=\"ΠΡΟΧΕΙΡΗ\" AND DEGREE=" . $degree . " AND " . $year;
                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {

                      if ($row["STATE"] == "ΑΠΟΡΡΙΦΘΕΙΣΑ") {
                        $class = "table-danger";
                      } else if ($row["STATE"] == "ΕΓΚΕΚΡΙΜΕΝΗ") {
                        $class = "table-success";
                      } else if ($row["STATE"] == "ΕΚΚΡΕΜΗΣ") {
                        $class = "table-warning";
                      } 

                      echo "
                      <tr class='$class'>
                        <td>" . $row["APPLICATION_ID"] . "</td>
                        <td>" . $row["STATE"] . "</td>
                        <td>" . $row["CREATION_DATE"] . "</td>
                        <td>" . $row["DEGREE"] . "</td>
                        <td style=\"text-align: center;\">
                        ";
                      if ($row["STATE"] == "ΑΠΟΡΡΙΦΘΕΙΣΑ") {
                        echo "
                                <button type=\"button\" onclick=\"location.href='work_edit_application.php?id=" . $row["APPLICATION_ID"] . "'\" class=\"btn btn-outline-danger\" style=\"color:black\"> <i class=\"bi bi-eye\"></i> Προβολή</button </td>
                              ";
                      } else if ($row["STATE"] == "ΕΓΚΕΚΡΙΜΕΝΗ") {
                        echo "
                                <button type=\"button\" onclick=\"location.href='work_edit_application.php?id=" . $row["APPLICATION_ID"] . "'\" class=\"btn btn-outline-success\" style=\"color:black\"> <i class=\"bi bi-eye\"></i> Προβολή</button </td>
                              ";
                      } else if ($row["STATE"] == "ΕΚΚΡΕΜΗΣ") {
                        echo "
                               <button type=\"button\" onclick=\"location.href='work_edit_application.php?id=" . $row["APPLICATION_ID"] . "'\" class=\"btn btn-outline-warning\" style=\"color:black\"> <i class=\"bi bi-pencil-square\"></i> Επεξεργασία</button> </td>
                              ";
                      }
                    }
                  } else {
                    echo "Δεν βρέθηκαν αποτελέσματα";
                  }
                  ?>
                </tbody>
              </table>
            </div><!-- End sidebar -->
          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <?php include "footer.html"; ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" aria-label="up"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>