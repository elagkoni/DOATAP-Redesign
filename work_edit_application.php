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
        <li><a href="user.php">Προφίλ</a></li>
        <li><a href="work_applications.php">Διαχείριση Αιτήσεων</a></li>
        <li>Επεξεργασία Αίτησης</li>
      </ol>
    </div>
  </section><!-- End Breadcrumbs -->

  <main id="main">

    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
          <form>
            <button type="button" class="btn btn-light" onclick="history.back()"><i class="bi bi-arrow-left"></i>&nbsp;Επιστροφή</button>
          </form>
        </div>
        <br>
        <div class="row">
          <?php
          echo "<h2>Αίτηση #" . $_GET['id'] . "</h2>";
          ?>
        </div>
        <br>

        <?php
        $sql = "SELECT * FROM application, default_user WHERE APPLICATION_ID =" . $_GET['id'] . " AND application.USER_ID = default_user.USER_ID";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="row justify-content-center">
          <div class="col justify-content-center" style="text-align: start;">
            
            <?php

            if ($row["STATE"] == "ΕΚΚΡΕΜΗΣ") {
              echo '<h4><u>Κατάσταση:</u>&nbsp;<b style="color: #826803">' .$row['STATE'] . '</b></h4>';
              $sql2 = "SELECT s.* FROM application a, suggested s WHERE a.APPLICATION_ID =" . $_GET['id'] . " AND a.APPLICATION_ID = s.APPLICATION_ID";
              $result2 = mysqli_query($conn, $sql2);
              echo '<ul>';
              while ($row2 = mysqli_fetch_assoc($result2)) {
                echo "<li>Έχει προταθεί το μάθημα <i>" . $row2['SUBJECT'] . "</i> από το " . $row2['DEPARTMENT'] . " του " . $row2['UNIVERSITY'] . ".</li>";
              }
              echo '</ul>';
            } else if ($row["STATE"] == "ΕΓΚΕΚΡΙΜΕΝΗ") {
              echo '<h4><u>Κατάσταση:</u>&nbsp;<b style="color: #388038">' .$row['STATE'] . '</b></h4>';
              $sql2 = "SELECT s.* FROM application a, approved s WHERE a.APPLICATION_ID =" . $_GET['id'] . " AND a.APPLICATION_ID = s.APPLICATION_ID";
              $result2 = mysqli_query($conn, $sql2);
              echo '<ul>';
              while ($row2 = mysqli_fetch_assoc($result2)) {
                echo "<li>Έχει αναγνωριστεί ως ισότιμο με το " . $row2['DEPARTMENT'] . " του " . $row2['UNIVERSITY'] . ".</li>";
              }
              echo '</ul>';
            } else if ($row["STATE"] == "ΑΠΟΡΡΙΦΘΕΙΣΑ") {
              echo '<h4><u>Κατάσταση:</u>&nbsp;<b style="color: #D53734">' .$row['STATE'] . '</b></h4>';
              echo 'Η αίτηση έχει απορριφθεί για τους ακόλουθους λόγους:<p>' . $row['REASON_OF_DENIAL'] . '</p>'; 
            }

            ?>
          </div>
        </div><br>

        <div class="row justify-content-start">
          <div class="col justify-content-center" style="text-align: start;max-width: 40%;">
            <h4><u>Προσωπικά Στοιχεία</u></h4>
            <?php
            echo
            '
          <div>
            <label for="firstname" style="display:block;font-size: 20px;">Όνομα</label>
            <input class="form-control" type="text" id="firstname" name="name" value="' . $row["firstname"] . '" readonly><br>
          </div>
          <div>
            <label for="lastname" style="display:block;font-size: 20px;">Επώνυμο</label>
            <input class="form-control" type="text" id="lastname" name="name" value="' . $row["lastname"] . '" readonly><br>
          </div>
          <div>
            <label for="fathername" style="display:block;font-size: 20px;">Όνομα Πατρός</label>
            <input class="form-control" type="text" id="fathername" name="name" value="' . $row["fathername"] . '" readonly><br>
          </div>
          <div>
            <label for="mothername" style="display:block;font-size: 20px;">Όνομα Μητρός</label>
            <input class="form-control"type="text" id="mothername" name="name" value="' . $row["mothername"] . '" readonly><br>
          </div>
          <div>
            <label for="birthdate" style="display:block;font-size: 20px;">Ημερομηνία Γέννησης</label>
            <input class="form-control" type="text" id="birthdate" name="name" value="' . $row["birthdate"] . '" readonly><br>
          </div>
          <div>
            <label for="phone" style="display:block;font-size: 20px;">Τηλέφωνο</label>
            <input class="form-control" type="text" id="phone" name="name" value="' . $row["phone"] . '" readonly><br>
          </div>
          ';
            ?>
          </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          <div class="col justify-content-center" style="text-align: start;max-width: 40%;">
            <h4><u>Στοιχεία Αίτησης</u></h4>
            <?php
            echo
            '
          <div>
            <label for="CREATION_DATE" style="display:block;font-size: 20px;">Ημερομηνία Δημιουργίας Αίτησης</label>
            <input class="form-control" type="text" id="CREATION_DATE" name="name" value="' . $row["CREATION_DATE"] . '" readonly><br>
          </div>
          <div>
            <label for="DEGREE" style="display:block;font-size: 20px;">Είδος Πτυχίου</label>
            <input class="form-control" type="text" id="DEGREE" name="name" value="' . $row["DEGREE"]  . '" readonly><br>
          </div>
          <div>
            <label for="COUNTRY" style="display:block;font-size: 20px;">Χώρα Σπουδών</label>
            <input class="form-control" type="text" id="COUNTRY" name="name" value="' . $row["COUNTRY"] . '" readonly><br>
          </div>
          <div>
            <label for="UNIVERSITY" style="display:block;font-size: 20px;">Πανεπιστήμιο</label>
            <input class="form-control" type="text" id="UNIVERSITY" name="name" value="' . $row["UNIVERSITY"]  . '" readonly><br>
          </div>
          <div>
            <label for="DEPARTMENT" style="display:block;font-size: 20px;">Τμήμα</label>
            <input class="form-control" type="text" id="DEPARTMENT" name="name" value="' . $row["DEPARTMENT"]  . '" readonly><br>
          </div>
          <div>
            <label for="DATE_START" style="display:block;font-size: 20px;">Ημερομηνία Εγγραφής</label>
            <input class="form-control" type="text" id="DATE_START" name="name" value="' . $row["DATE_START"] . '" readonly><br>
          </div>
          <div>
            <label for="DATE_END" style="display:block;font-size: 20px;">Ημερομηνία Αποφοίτησης</label>
            <input class="form-control" type="text" id="DATE_END" name="name" value="' . $row["DATE_END"] . '" readonly><br>
          </div>
          ';
            ?>
          </div>
        </div><br>

        <div class="row">
          <div class="col" style="text-align: start;">
            <h4><u>Δικαιολογητικά</u></h4>
            <?php
            // get document entries
            $sql2 = "SELECT d.* FROM application a, document d WHERE a.APPLICATION_ID =" . $_GET['id'] . " AND a.APPLICATION_ID = d.APPLICATION_ID";
            $result2 = mysqli_query($conn, $sql2);
            while ($row2 = mysqli_fetch_assoc($result2)) {
              echo
              '
            <a href="uploads/' . $row2["USER_ID"] . '/' . $row2["APPLICATION_ID"] . '/' . $row2["FILENAME"] . '" download>
              ' . $row2["FILENAME"] . '
            </a>
            <br>
            ';
            }
            ?>
          </div>
        </div><br>

        <hr><br>

        <div class="row justify-content-start">

          <?php if ($row['STATE'] == "ΕΚΚΡΕΜΗΣ")
          echo
          '
          <div class="col justify-content-center" style="text-align: start;">
            <br><h4><u>Απόρριψη της Αίτησης</u></h4>
            <form action="forms/application_deny_form.php" method="post" id="deny_form" class="php-email-form" style="box-shadow:0 0;">
              <label for="denied_text" style="font-size:20px;">Λόγοι απόρριψης:</label>
              <br>
              <textarea type="text" id="denied_text" name="denied_text" form="deny_form" style="min-height:100px; min-width:400px;" required></textarea>
              <br><br>
              <input type="hidden" id="denied_app_id" name="denied_app_id" form="deny_form" value="' . $_GET["id"] . '">

              <div style="display: flex; justify-content: end;">
                <button type="submit" id="deny_submit" form="deny_form" style="background-color: #d9534f;color:black;" onclick="return confirm("Επιβεβαίωση ΑΠΟΡΡΙΨΗΣ της παρούσας αίτησης.")>Απόρριψη</button>
              </div>
            </form>
          </div>
          '
          ?>&nbsp;

          <?php if ($row['STATE'] == "ΕΚΚΡΕΜΗΣ")
          echo
          '
          <div class="col justify-content-center" style="text-align: start;border-style:none none none dotted;">
            <br><h4><u>Πρόταση Μαθήματος</u></h4>
            <form action="forms/application_suggest_form.php" method="post" id="suggest_form" class="php-email-form" style="box-shadow:0 0;">
              <label for="suggest_university" style="font-size: 20px;">Πανεπιστήμιο:</label>
              <br>

              <div class="col" style="text-align: start;">
                <select id="suggest_university" name="suggest_university" form="suggest_form" class="form-select d-inline-block">
                  <option>Επιλέξτε Πανεπιστήμιο</option>
                  <option>Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών</option>
                  <option>Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης</option>
                </select>
              </div>

              <label for="suggest_department" style="font-size: 20px;">Τμήμα:</label>
              <br>

              <div class="col" style="text-align: start;">
                <select id="suggest_department" name="suggest_department" form="suggest_form" class="form-select d-inline-block">
                  <option>Επιλέξτε Τμήμα</option>
                </select>
              </div>

              <label for="suggest_subject" style="font-size: 20px;">Μάθημα:</label>
              <br>

              <div class="col" style="text-align: start;">
                <select id="suggest_subject" name="suggest_subject" form="suggest_form" class="form-select d-inline-block">
                  <option>Επιλέξτε Μάθημα</option>
                </select>
              </div>
              <br>

              <input type="hidden" id="suggest_app_id" name="suggest_app_id" form="suggest_form" value="' . $_GET["id"] . '">

              <div style="display: flex; justify-content: end;">
                <button type="submit" id="suggest_submit" form="suggest_form" style="background-color: rgb(226, 226, 226); color:black;" onclick="return confirm("Επιβεβαίωση ΠΡΟΤΑΣΗΣ στην παρούσα αίτηση.")">Πρόταση</button>
              </div>
            </form>
          </div>
          '
          ?>&nbsp;&nbsp;

          <?php if ($row['STATE'] == "ΕΚΚΡΕΜΗΣ") 
          echo
          '
          <div class="col justify-content-center" style="text-align: start;border-style:none none none dotted;border: width 1px;">
            <br><h4><u>Έγκριση της Αίτησης</u></h4>

            <form action="forms/application_approve_form.php" method="post" id="approve_form" class="php-email-form" style="box-shadow:0 0;">
              <label for="approve_university" style="font-size: 20px;">Πανεπιστήμιο:</label>
              <br>

              <div class="col" style="text-align: start;">
                <select id="approve_university" name="approve_university" form="approve_form" class="form-select d-inline-block">
                  <option>Επιλέξτε Πανεπιστήμιο</option>
                  <option>Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών</option>
                  <option>Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης</option>
                </select>
              </div>

              <label for="approve_department" style="font-size: 20px;">Τμήμα:</label>
              <br>

              <div class="col" style="text-align: start;">
                <select id="approve_department" name="approve_department" form="approve_form" class="form-select d-inline-block">
                  <option>Επιλέξτε Τμήμα</option>
                </select>
              </div>
              <br>
              <input type="hidden" id="approved_app_id" name="approved_app_id" form="approve_form" value="' . $_GET["id"] . '">

              <div style="display: flex; justify-content: end;">
                <button type="submit" id="approve_submit" form="approve_form" style="background-color: #5cb85c;color: black;" onclick="return confirm("Επιβεβαίωση ΕΓΚΡΙΣΗΣ της παρούσας αίτησης.")"> Έγκριση</button>
              </div>
            </form>
          </div>
          '
          ?>

        </div>
      </div>

      <br><br>
    </section>

  </main><!-- End #main -->

  <?php include "footer.html"; ?>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" aria-label="up"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    $(document).ready(function() {
      $("#approve_university").change(function() {
        var val = $(this).val();
        if (val == "Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών") {
          $("#approve_department").html("<option>Επιλέξτε Τμήμα</option><option>Τμήμα Πληροφορικής και Τηλεπικοινωνιών</option><option>Τμήμα Οδοντριατρικής</option>");
        } else if (val == "Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης") {
          $("#approve_department").html("<option>Επιλέξτε Τμήμα</option><option>Τμήμα Κτηνιατρικής</option><option>Τμήμα Νομικής</option>");
        }
      });
    });

    $('#approve_university').trigger('change');

    $(document).ready(function() {
      $("#suggest_university").change(function() {
        var val = $(this).val();
        if (val == "Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών") {
          $("#suggest_department").html("<option>Επιλέξτε Τμήμα</option><option>Τμήμα Πληροφορικής και Τηλεπικοινωνιών</option><option>Τμήμα Οδοντριατρικής</option>");
        } else if (val == "Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης") {
          $("#suggest_department").html("<option>Επιλέξτε Τμήμα</option><option>Τμήμα Κτηνιατρικής</option><option>Τμήμα Νομικής</option>");
        }
      });
    });

    $(document).ready(function() {
      $("#suggest_department").change(function() {
        var val = $(this).val();
        var val2 = document.getElementById("suggest_university").value;
        if (val2 == "Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών") {
          if (val == "Τμήμα Πληροφορικής και Τηλεπικοινωνιών") {
            $("#suggest_subject").html("<option>Επιλέξτε Μάθημα</option><option>Λειτουργικά Συστήματα</option><option>Μεταγλωττιστές</option>");
          } else if (val == "Τμήμα Οδοντριατρικής") {
            $("#suggest_subject").html("<option>Επιλέξτε Μάθημα</option><option>Δόντια 1</option><option>Γναθοχειρουργική</option>");
          }
        } else if (val2 == "Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης") {
          if (val == "Τμήμα Κτηνιατρικής") {
            $("#suggest_subject").html("<option>Επιλέξτε Μάθημα</option><option>Ανατομία των Σκύλων</option><option>Πυρηνική Ιατρική</option>");
          } else if (val == "Τμήμα Νομικής") {
            $("#suggest_subject").html("<option>Επιλέξτε Μάθημα</option><option>Διεθνές Δίκαιο</option><option>Συνταγματικό Δίκαιο</option>");
          }
        }
      });
    });
  </script>

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
