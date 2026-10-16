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
                <li>Προφίλ</li>
            </ol>
        </div>
    </section><!-- End Breadcrumbs -->

    <!-- TAB CONTROLLERS -->
    <input id="panel-1-ctrl" class="panel-radios" type="radio" name="tab-radios" hidden checked>
    <input id="panel-2-ctrl" class="panel-radios" type="radio" name="tab-radios" hidden >

    <!-- TABS LIST -->
    <ul id="tabs-list" style="display: flex; justify-content: center;">    
        <li id="li-for-panel-1">
            <label class="panel-label" for="panel-1-ctrl" style="color: #217B9C;background-color:#FCFCFC;">Τα στοιχεία μου</label>            
        </li>

        <?php 
        if($_SESSION['ADMIN'] == 0) {
            echo
            '
            <li id="li-for-panel-2">
                <label class="panel-label" for="panel-2-ctrl" style="color: #217B9C;background-color:#FCFCFC;">Οι αιτήσεις μου</label>
            </li>
            ';
        } else {
            echo
            '
            <li id="li-for-panel-2">
                <label class="panel-label" for="panel-2-ctrl" style="color: #217B9C;background-color:#FCFCFC;">Διαχείρηση Αιτήσεων</label>
            </li>
            ';
        }
        ?>
    </ul>

    <!-- THE PANELS -->
    <article id="panels">
        <div class="container">
            <section id="panel-1">
                <br>
                <main>
                    <div class="row ">
                        <div class="col-md-9" style="padding-left:20px;">
                            <h5> <i class="bi bi-box-arrow-right" aria-hidden="true"></i> Στοιχεία Πρόσβασης</h5>
                        </div>
                        <hr> <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label style="font-weight:bold;" class="col-lg-5 control-label">Όνομα χρήστη</label>
                                    <div class="col-lg-8">
                                        <?php echo $_SESSION["username"]; ?>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label style="font-weight:bold;" class="col-sm-2 control-label">Κωδικός</label>
                                        <div class="col-md-8">
                                            <a href="#editPasswordModal" id="editPassword" data-toggle="modal" data-backdrop="false">
                                                <button type="button" class="btn btn-secondary"><i class="bi bi-pencil-square"></i> Αλλαγή κωδικού</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="editPasswordModal" class="modal fade contact">
                            <div class="modal-dialog modal-dialog-center modal-lg row justify-content-center">
                                <div class="modal-content">
                                    <form action="forms/update_profile_form.php" method="post" class="php-email-form">
                                        <div class="modal-header">
                                            <h4><i class="bi bi-pencil"></i><b> Αλλαγή κωδικού πρόσβασης</b></h4><br>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <hr>
                                        </div>
                                        <div class="contact modal-body">
                                            <div class="container align-items-center">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="col-md-8">
                                                            <label for="oldpassword" class="col-4 col-form-label">Τωρινός κωδικός</label>
                                                            <div class="form-group">
                                                                <input id="oldpassword" name="oldpassword" class="form-control" type="password">
                                                                <div class="validate"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label for="password1" class="col-4 col-form-label">Νέος κωδικός</label>
                                                            <small class="w-100 d-flex" style="font-weight: 100;">Πρέπει να αποτελείται από τουλάχιστον 8 χαρακτήρες</small>
                                                            <div class="form-group">
                                                                <input id="password1" name="password1" class="form-control" type="password" minlength="8">
                                                                <div class="validate"></div>
                                                                <span style='color: red; display: none;' id="password1_invalid">Άκυρος κωδικός.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label for="password2" class="col-8 col-form-label">Επαλήθευση νέου κωδικού</label>
                                                            <div class="form-group">
                                                                <input id="password2" name="password2" class="form-control" type="password" minlength="8">
                                                                <div class="validate"></div>
                                                                <span style='color: red; display: none;' id="password2_invalid">Ο κωδικός επιβεβαίωσης είναι διαφορετικός από τον αρχικό κωδικό.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container ">
                                                <div class="my-3">
                                                    <div class="loading">Φόρτωση</div>
                                                    <div class="error-message text-center"></div>
                                                    <div class="sent-message">Η ενημέρωση έγινε με επιτυχία</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Ακύρωση</button>
                                            <button value="submit" name="submit" type="submit" style="border-radius:4px;">Αποθήκευση</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <br>

                <?php 
                if($_SESSION['ADMIN'] == 0){
                    include './user_personal_info.php';
                }
                ?>
            </section>
            <section id="panel-2" style="padding-bottom: 0px;">
                <?php 
                if($_SESSION['ADMIN'] == 0){
                    include './user_my_applications.php';
                } else {
                    echo
                    "
                    <main>
                    <div style=\"display: flex; justify-content: center;\">
                    <button type=\"button\" onclick=\"location.href='work_applications.php'\" class=\"btn btn-light\" style=\"color:black;padding: 15px 15px;\"> <b>Μεταφορά στη σελίδα Διαχείρισης Αιτήσεων &nbsp;<i class=\"bi bi-arrow-right\" style=\"font-size:20px;\"></i></b></button>
                    </div><br><br>
                    </main>
                    ";
                }
                ?>
            </section>
        </div>
    </article>

    <?php include "footer.html"; ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center" aria-label="up"><i class="bi bi-arrow-up-short"></i></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $("#editPassword").click(function() {
            $('#editPasswordModal').modal('toggle');
        });
    </script>
    <script type="text/javascript">
        $("#editProfile").click(function() {
            $('#editProfileModal').modal('toggle');
        });
    </script>
    <script type="text/javascript">
        $("#subject").click(function() {
            $('#subjectModal').modal('toggle');
        });
    </script>
    <script type="text/javascript">
        $("#reason").click(function() {
            $('#reasonModal').modal('toggle');
        });
    </script>

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

    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src='https://www.jqueryscript.net/demo/Creating-A-Modern-Multi-Step-Form-with-jQuery-CSS3/js/jquery.easing.min.js'></script>
    <script>
        var current_fs, next_fs, previous_fs;
        var left, opacity, scale;
        var animating;

        $(".next").click(function() {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            next_fs.show();
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now, mx) {
                    scale = 1 - (1 - now) * 0.2;
                    left = (now * 50) + "%";
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')'
                    });
                    next_fs.css({
                        'left': left,
                        'opacity': opacity
                    });
                },
                duration: 10,
                complete: function() {
                    current_fs.hide();
                    animating = false;
                },
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function() {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
            previous_fs.show();
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now, mx) {
                    scale = 0.8 + (1 - now) * 0.2;
                    left = ((1 - now) * 50) + "%";
                    opacity = 1 - now;
                    current_fs.css({
                        'left': left
                    });
                    previous_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'opacity': opacity
                    });
                },
                duration: 10,
                complete: function() {
                    current_fs.hide();
                    animating = false;
                },
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function() {
            return false;
        })
    </script>

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