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

  <link href="css/site.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Eterna - v4.7.0
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?php include "./header.php"; ?>

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="index.php">Αρχική</a></li>
        <li>Σύνδεση</li>
      </ol>
    </div>
  </section><!-- End Breadcrumbs -->

  <main id="main">

    <section id="contact" class="contact">
      <div class="row justify-content-center ">
        <div class="col-lg-4 ">
          <form action="forms/login_form.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="section-title">
                <h3 style="font-weight: bold;">Είσοδος στο Σύστημα</h3>
              </div>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center">
              <div class="form-group col-md-10">
                <label for="username"><i class="bi bi-person-fill" style="font-size:16px">&nbsp</i>Όνομα χρήστη</label>
                <input type="text" class="form-control" name="username" id="username" required />
                <div class="validate"></div>
              </div><br>
              <div class="form-group col-md-10">
                <label for="password"><i class="bi bi-lock-fill" style="font-size:16px">&nbsp</i>Κωδικός</label>
                <input type="password" class="form-control" name="password" id="password" minlength="8" required />
                <div class="validate"></div>
              </div>
            </div>
            <hr>
            <div class="row justify-content-center">
              Δεν έχετε λογαριασμό; <a href="./signup.php" style="text-align:center;">Δημιουργία λογαριασμού</a>
            </div><br>
            <div class="my-3">
              <div class="loading">Φόρτωση</div>
              <div class="error-message"></div>
              <div class="sent-message">Επιτυχής σύνδεση!</div>
            </div>
            <div class="text-center">
              <button value="submit" name="submit" type="submit">Σύνδεση</button>
            </div>
          </form>
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
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
