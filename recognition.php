<?php session_start(); ?>

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
                <li>Αναγνώριση Πτυχίου</li>
            </ol>
        </div>
    </section><!-- End Breadcrumbs -->

    <main id="main">

        <section id="services" class="services">
            <div class="section-title">
                <h2>Αναγνώριση Πτυχίου</h2>
            </div>
            <div class="container">
                <div class="row">
                    <?php
                    if (isset(($_SESSION['login_user'])) && ($_SESSION['login_user']) == true) {
                        echo '<div class="col-lg-4 col-md-8 align-items mt-4 mt-md-0">
                                <div class="icon-box">
                                    <a href="./new_application.php" aria-label="up">
                                        <div class="icon"><i class="bx bx-pencil"></i></div>
                                    </a>
                                    <h4><a href="./new_application.php">Νέα Αίτηση</a></h4>
                                    <p>Για να υποβάλλετε νέα αίτηση πρέπει να συνδεθείτε</p>
                                </div>
                            </div>';
                    } else {
                        echo '<div class="col-lg-4 col-md-8 align-items mt-4 mt-md-0">
                                <div class="icon-box">
                                    <a href="./login.php" aria-label="up">
                                        <div class="icon"><i class="bx bx-pencil"></i></div>
                                    </a>
                                    <h4><a href="./login.php">Νέα Αίτηση</a></h4>
                                    <p>Για να υποβάλλετε νέα αίτηση πρέπει να συνδεθείτε</p>
                                </div>
                            </div>';
                    }
                    ?>

                    <div class="info" style="width: 65%;">Για την υποβολή αίτησης αναγνώρισης τίτλου σπουδών (<b>βασικού, μεταπτυχιακού</b> ή <b>διδακτορικού</b>) είναι απαραίτητα τα εξής έγγραφα:

                        <ol class="text-justify-center">
                            <br>
                            <li>
                                <b>Αντίγραφο ταυτότητας ή διαβατηρίου:</b>&nbsp;Ταυτότητα ή διαβατήριο σε ευκρινές φωτοαντίγραφο.
                            </li><br>
                            <li>
                                <b>Αντίγραφο τίτλου σπουδών:</b>&nbsp;Τίτλος σπουδών (πτυχίο) του οποίου ζητείται η αναγνώριση, σε ευκρινές φωτοαντίγραφο.
                            </li><br>
                            <li>
                                <b>Παράβολο:</b>&nbsp;Αποδεικτικό κατάθεσης παραβόλου για τον αντίστοιχο τίτλο σπουδών, σε ευκρινές φωτοαντίγραφο. <a href="./coming_soon.php">Αναλυτικές πληροφορίες για τις τιμές παραβόλου.</a>
                            </li><br>
                            <li>
                                <b>Υπεύθυνη δήλωση Ν.1599/1986:</b>&nbsp;<a href="files/Υπεύθυνη Δήλωση.pdf" download="Υπεύθυνη Δήλωση">Υπεύθυνη Δήλωση</a> του άρθρου 8 του Ν. 1599/86 η οποία υπογράφεται από τον ενδιαφερόμενο.
                            </li><br>
                            <li>
                                <b>Έντυπο Συγκατάθεσης:</b>&nbsp;<a href="files/Έντυπο Συγκατάθεσης.pdf" download="Έντυπο Συγκατάθεσης">Έντυπο</a> με το οποίο εξουσιοδοτείται ο Δ.Ο.Α.Τ.Α.Π. να ζητά από τα Ιδρύματα διευκρινιστικά / συμπληρωματικά στοιχεία που αφορούν τον τίτλο σπουδών του ενδιαφερόμενου.
                                Συμπληρώνεται και υπογράφεται από τον ενδιαφερόμενο.
                            </li><br>
                        </ol>
                    </div>


                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                        <div class="icon-box">
                            <a href="./coming_soon.php" aria-label="up">
                                <div class="icon"><i class="bx bx-file"></i></div>
                            </a>
                            <h4><a href="./coming_soon.php">Χρήσιμα Έγγραφα</a></h4>
                            <p>Απαραίτητα έγγραφα για την υποβολή νέας αίτησης</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                        <a href="./coming_soon.php" aria-label="up">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-card-checklist"></i></div>
                        </a>
                        <h4><a href="./coming_soon.php">Λίστα Αναγνωρισμένων Ιδρυμάτων</a></h4>
                        <p>Όλα τα αναγνωρισμένα εκπαιδευτικά ιδρύματα</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                    <a href="./coming_soon.php" aria-label="up">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-currency-euro"></i></div>
                    </a>
                    <h4><a href="./coming_soon.php">Τιμές Παραβόλων</a></h4>
                    <p>Αναλυτικές πληροφορίες για τις τιμές παραβόλου</p>
                </div>
            </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <a href="./coming_soon.php" aria-label="up">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-question-mark"></i></div>
                    </a>
                    <h4><a href="./coming_soon.php">Συχνές Ερωτήσεις</a></h4>
                    <p>Επιπλέον πληροφορίες για την διαδικασία αναγνώρισης</p>
                </div>
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
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>