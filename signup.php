<?php
  session_start();
  include 'db_connection.php';
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
          <li>Εγγραφή</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

  <main id="main">   
    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="row justify-content-center">
        <div class="section-title">
          <br>
          <h3 style="font-weight: bold;">Δημιουργία λογαριασμού</h3><br>
          <h6>Τα πεδία με αστερίσκο (*) είναι υποχρεωτικά.</h6>
        </div>
        <div class="col-lg-10">
          <form action="forms/signup_form.php" method="post" class="php-email-form">
            <div class="section-title" style="text-align: left; font-weight: bold;">
              <h7><u>Στοιχεία Πρόσβασης</u></h7>
            </div>
            <div class="row">

              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0 mb-3">
                  <label for="username">* Όνομα χρήστη</label>
                  <input type="text" class="form-control" name="username" id="username" required>
                  <div>
                    <span style='color: #D53734; display: none;' id="username_unavailable">Αυτό το όνομα χρήστη χρησιμοποιείται ήδη.</span>
                    <span style='color: green; display: none;' id="username_available">Έγκυρο όνομα χρήστη.</span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0 mb-3">
                  <label for="password1">* Κωδικός</label>
                  <small class="w-100 d-flex" style="font-weight: 100;">Πρέπει να αποτελείται από τουλάχιστον 8 χαρακτήρες</small>
                  <input type="password" class="form-control" name="password1" id="password1" minlength="8" required>
                  <span style='color: #D53734; display: none;' id="password1_invalid">Άκυρος κωδικός.</span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0 mb-3">
                  <label for="password2">* Επιβεβαίωση κωδικού</label>
                  <input type="password" class="form-control" name="password2" id="password2" minlength="8" required>
                  <span style='color: #D53734; display: none;' id="password2_invalid">Ο κωδικός επιβεβαίωσης είναι διαφορετικός από τον αρχικό κωδικό.</span>
                </div>
              </div>

              <div class="section-title" style="text-align: left; font-weight: bold;">
                <h7><u>Προσωπικά Στοιχεία</u></h7>
              </div>
              <div class="row">

                <div class="col-md-6 form-group mt-3 mt-md-0 mb-3">
                  <label for="firstname">* Όνομα</label>
                  <input type="text" class="form-control" name="firstname" id="firstname" required>
                </div>

                <div class="col-md-6 form-group mt-3 mt-md-0 mb-3">
                  <label for="lastname">* Επώνυμο</label>
                  <input type="text" class="form-control" name="lastname" id="lastname" required>
                </div>
              </div>

              <div class="row">

                <div class="col-md-6 form-group mt-3 mt-md-0 mb-3">
                  <label for="fathername">* Όνομα Πατέρα</label>
                  <input type="text" class="form-control" name="fathername" id="fathername" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0 mb-3">
                  <label for="mothername">* Όνομα Μητέρας</label>
                  <input type="text" class="form-control" name="mothername" id="mothername" required>
                </div>
              </div>

              <div class="row">

                <div class="col-md-3 form-group mt-3 mt-md-0 mb-3">
                  <label for="birthdate">* Ημερομηνία γέννησης</label>
                  <input type="date" class="form-control" name="birthdate" id="birthdate" max="2004-12-31" required>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0 mb-3" style="margin:auto">
                  <label for="phone">* Κινητό</label>
                  <input type="tel" class="form-control" name="phone" id="phone" required>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0 mb-3">
                  <label for="telephone">Τηλέφωνο</label>
                  <input type="tel" class="form-control" name="telephone" id="telephone">
                </div>
                
              </div>

              <div class="row">

                <div class="col-md-6 form-group mt-3 mt-md-0 mb-3">
                  <label for="email">* Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                  <!-- <div>
                    <span style='color: red; display: none;' id="email_unavailable">Not Available.</span>
                    <span style='color: green; display: none;' id="email_available">Available.</span>
                  </div> -->
                </div>
              </div>
            </div><br>
            <br><br>
            <div class="text-center"><button type="submit" id="submit_button">Υποβολή</button></div>
          </form>
        </div>
      </div>
    </section><!-- End Contact Section -->


  </main><!-- End #main -->

  <?php include "footer.html"; ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" aria-label="up"><i class="bi bi-arrow-up-short"></i></a>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    // check password validity
    function checkPassword2(password1, password2) {
      if (password2 != '') {
        if (password1 != password2) {
          document.getElementById("password2_invalid").style.display = "block";
        } else {
          document.getElementById("password2_invalid").style.display = "none";
        }
      }
    } 

    $(document).ready(function() {
      $("#password1").on('change textInput input', function() {
        var password1 = $(this).val().trim();
        var password2 = document.getElementById("password2").value.trim();

        if (password1 != '') {
          if (password1.length < 8) {
            document.getElementById("password1_invalid").style.display = "block";
          } else {
            document.getElementById("password1_invalid").style.display = "none";
          }
        }

        checkPassword2(password1, password2);
      });
    });

    $(document).ready(function() {
      $("#password2").on('change textInput input', function() {
        var password1 = document.getElementById("password1").value.trim();
        var password2 = $(this).val().trim();

        checkPassword2(password1, password2);
      });
    });

    // check email availability
    $(document).ready(function() {
      $("#email").on('change textInput input', function() {
        var email = $(this).val().trim();
        if (email != '') {
          $.ajax({
            url: 'check_availability.php',
            type: 'post',
            data: {
              email: email
            },
            success: function(response) {
              if (response == 0) {
                document.getElementById("submit_button").disabled = true;
                document.getElementById("email_available").style.display = "none";
                document.getElementById("email_unavailable").style.display = "block";
              } else if (response == 1) {
                document.getElementById("submit_button").disabled = false;
                document.getElementById("email_available").style.display = "block";
                document.getElementById("email_unavailable").style.display = "none";
              }
            }
          });
        }
      });
    });

    // check username availability
    $(document).ready(function() {
      $("#username").on('change textInput input', function() {
        var username = $(this).val().trim();
        if (username != '') {
          $.ajax({
            url: 'check_availability.php',
            type: 'post',
            data: {
              username: username
            },
            success: function(response) {
              if (response == 0) {
                document.getElementById("submit_button").disabled = true;
                document.getElementById("username_available").style.display = "none";
                document.getElementById("username_unavailable").style.display = "block";
              } else if (response == 1) {
                document.getElementById("submit_button").disabled = false;
                document.getElementById("username_available").style.display = "block";
                document.getElementById("username_unavailable").style.display = "none";
              }
            }
          });
        }
      });
    });
  </script>

</body>

</html>