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
<?php
      if (isset($_GET["id"]) && $_GET["id"] != '') {
        $check = TRUE;
        $app_id = $_GET["id"];
        $sql = "SELECT * FROM application a WHERE USER_ID=" . $_SESSION["USER_ID"] . " AND APPLICATION_ID=" . $app_id;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $state = $row["STATE"];
            $degree = $row["DEGREE"];
            if ($row["COUNTRY"] == "NULL") {
                $county = '';
            } else {
                $country = $row["COUNTRY"];
            }
            if ($row["UNIVERSITY"] == "NULL") {
                $university = '';
            } else {
                $university = $row["UNIVERSITY"];
            }
            if ($row["DEPARTMENT"] == "NULL") {
                $department = '';
            } else {
                $department = $row["DEPARTMENT"];
            }
            $startDate = $row["DATE_START"];
            $endDate = $row["DATE_END"];

            $matchedCountry = false;
            $matchedUni = false;
            $matchedDep = false;
        } else {
            // FIXME
            echo "You are not supposed to be here :-)";
            exit();
        }
      } else {
        $check = FALSE;
        $app_id = "APPLICATION_ID";
      }
    ?>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol><li><a href="index.php">Αρχική</a></li>
                <?php
                if($check && $state != "ΠΡΟΧΕΙΡΗ") {
                echo
                '
                <li><a href="user.php">Προφίλ</a></li>
                <li>Προεπισκόπηση Αίτησης</li>
                ';
                } else if ($check && $state == "ΠΡΟΧΕΙΡΗ") {
                    echo
                    '
                    <li><a href="user.php">Προφίλ</a></li>
                    <li>Επεξεργασία Αίτησης</li>
                    ';
                } else {
                    echo
                    '
                    <li><a href="recognition.php">Αναγνώριση Πτυχίου</a></li>
                    <li>Νέα Αίτηση</li>
                    ';
                }
                ?>                
            </ol>
        </div>
    </section><!-- End Breadcrumbs -->

    

    <div class="container">
        <section id="panel-3" style="padding-bottom: 0px;">
            <main style="padding-top: 0px;">                
                <?php
                if($check && $state != "ΠΡΟΧΕΙΡΗ") {
                echo
                '
                <h1>Προεπισκόπηση Αίτησης</h1><br>
                ';
                } else if ($check && $state == "ΠΡΟΧΕΙΡΗ") {
                    echo
                    '
                    <h1>Επεξεργασία Αίτησης</h1><br>
                    ';
                } else {
                    echo
                    '
                    <h1>Νέα Αίτηση</h1><br>
                    ';
                }
                ?> 
                <!-- MultiStep Form -->
                <div class="form_holder">
                    <form id="msform" action="forms/new_application_form.php" method="post" enctype="multipart/form-data">
                        <ul id="progressbar">
                            <li class="active">1. Προσωπικά Στοιχεία</li>
                            <li>2. Στοιχεία Τίτλου</li>
                            <li>3. Δικαιολογητικά</li>
                        </ul>
                        <fieldset>
                            <h3 class="fs-subtitle" style="font-weight: bold; text-align: center">Έλεγχος Προσωπικών Στοιχείων</h3>
                            <h6 class="fs-subtitle" style="text-align: center">Αν τα παρακάτω στοιχεία είναι λανθασμένα παρακαλείστε να τα αλλάξετε στο <a href="./user.php">Προφίλ</a> σας πριν πραγματοποιήσετε νέα αίτηση.</h6><br>
                            <div class="row">
                                <div class="col-md-6 form-group mt-3 mt-md-0 mb-3">
                                    <label for="firstname">Όνομα</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $_SESSION["firstname"]; ?>" disabled>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0 mb-3">
                                    <label for="lastname">Επώνυμο</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $_SESSION["lastname"]; ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group mt-3 mt-md-0 mb-3">
                                    <label for="fathername">Όνομα Πατέρα</label>
                                    <input type="text" class="form-control" name="fathername" id="fathername" value="<?php echo $_SESSION["fathername"]; ?>" disabled>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0 mb-3">
                                    <label for="mothername">Όνομα Μητέρας</label>
                                    <input type="text" class="form-control" name="mothername" id="mothername" value="<?php echo $_SESSION["mothername"]; ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group mt-3 mt-md-0 mb-3">
                                    <label for="birthdate">Ημ/νία γέννησης</label>
                                    <input type="date" class="form-control" name="birthdate" id="birthdate" value="<?php echo $_SESSION["birthdate"]; ?>" disabled>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0 mb-3" style="margin:auto">
                                    <label for="phone">Κινητό</label>
                                    <input type="tel" class="form-control" name="phone" id="phone" value="<?php echo $_SESSION["phone"]; ?>" disabled>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0 mb-3">
                                    <label for="telephone">Τηλέφωνο</label>
                                    <input type="tel" class="form-control" name="telephone" id="telephone" value="<?php echo $_SESSION["telephone"]; ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 form-group mt-3 mt-md-0 mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION["email"]; ?>" disabled>
                                </div>
                            </div>
                            <button type="button" name="next" class="next action-button" style="text-align: center;width:45px;margin: 0 auto;display: flex;justify-content: center;font-size: 0;background-color:#217B9C">v<i class="bi bi-arrow-right" style='font-size:17px;'></i></button>
                            <br>
                            <div class="my-3">
                                <div class="loading"></div>
                                <div class="error-message"></div>
                                <div class="sent-message"></div>
                            </div>
                            <div class="text-center">
                                <button value="DELETE" type="submit" name="submit" class="btn btn-outline-danger" style="border-radius: 20px;margin-left:0px" <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?> formnovalidate>Διαγραφή Αίτησης</button>
                                <button value="ΠΡΟΧΕΙΡΗ" type="submit" name="submit" class="btn btn-outline-warning" style="border-radius: 20px;margin-left:400px;color:black" <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?> formnovalidate>Προσωρινή Αποθήκευση</button>&nbsp;&nbsp;&nbsp;
                                <button value="ΕΚΚΡΕΜΗΣ" type="submit" name="submit" class="btn btn-outline-success" style="border-radius: 20px;text-align: start;" <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?>>Οριστική Υποβολή</button>
                            </div>
                        </fieldset>
                        <fieldset>
                            <?php
                            echo '<input type="hidden" id="app_id" name="app_id" value=' . $app_id . '>';
                            ?>
                            <h3 class="fs-subtitle" style="font-weight: bold; text-align: center">Συμπληρώστε τα Στοιχεία του Τίτλου που θέλετε να αναγνωρίσετε</h3>
                            <h6 class="fs-subtitle" style="text-align: center">Τα πεδία με αστερίσκο (*) είναι υποχρεωτικά.</h6><br>
                            <div class="form-group row">
                                <label for="title-type" class="col-sm-2 col-form-label">* Είδος Πτυχίου</label>
                                <div class="col-sm-10">
                                    <select id="title-type" name="title-type" class="form-select d-inline-block" style="max-width:30%;" required <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?>>
                                        <option value=''>--Επιλέξτε είδος--</option>
                                        <option <?php if ($check && $degree == "ΒΑΣΙΚΟ") echo "selected"?>>Βασικό</option>
                                        <option <?php if ($check && $degree == "ΜΕΤΑΠΤΥΧΙΑΚΟ")  echo "selected"?>>Μεταπτυχιακό</option>
                                        <option <?php if ($check && $degree == "ΔΙΔΑΚΤΟΡΙΚΟ") echo "selected"?>>Διδακτορικό</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="country" class="col-sm-2 col-form-label">* Χώρα σπουδών</label>
                                <div class="col">
                                    <select id="country" name="country" class="form-select d-inline-block" style="max-width:60%;" required <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?>>
                                        <option value=''                <?php if ($check && $country == "")                 { echo "selected"; $matchedCountry = true; }?>>--Επιλέξτε χώρα--</option>
                                        <option value="Γερμανία"        <?php if ($check && $country == "Γερμανία")         { echo "selected"; $matchedCountry = true; }?>>Γερμανία</option>
                                        <option value="ΗΠΑ"             <?php if ($check && $country == "ΗΠΑ")              { echo "selected"; $matchedCountry = true; }?>>ΗΠΑ</option>
                                        <option value="Ηνωμένο Βασίλειο"<?php if ($check && $country == "Ηνωμένο Βασίλειο") { echo "selected"; $matchedCountry = true; }?>>Ηνωμένο Βασίλειο</option>
                                        <option value='other'           <?php if ($check && $matchedCountry == false)       { echo "selected"; }?>>Άλλη</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="other_country" class="col-sm-2 col-form-label" hidden>* Χώρα</label>
                                    <input type="text" name="other_country" id="other_country" 
                                    <?php 
                                        if ($check && $matchedCountry == true) {
                                            echo "style=display:none";
                                        } else if ($check && $matchedCountry == false) {
                                            echo "value='$country'";
                                        }
                                    ?> <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?>>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="university" class="col-sm-2 col-form-label">* Πανεπιστήμιο</label>
                                <div class="col">
                                    <select id="university" name="university" class="form-select d-inline-block" style="max-width:60%;" required>
                                        <option value=''>--Επιλέξτε πανεπιστήμιο--</option>
                                        <option value='other'>Άλλo</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="other_uni" class="col-sm-2 col-form-label" hidden>* Πανεπιστήμιο</label>
                                    <input type="text" name="other_uni" id="other_uni"
                                    <?php 
                                        if ($check && $matchedUni == true) {
                                            echo "style=display:none";
                                        } else if ($check && $matchedUni == false) {
                                            echo "value='$university'";
                                        }
                                    ?> <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?>>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="department" class="col-sm-2 col-form-label">* Τμήμα</label>
                                <div class="col">
                                    <select id="department" name="department" class="form-select d-inline-block" style="max-width:60%;" required <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?>>
                                        <option value=''>--Επιλέξτε τμήμα--</option>
                                        <option value='other'>Άλλo</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="other_dep" class="col-sm-2 col-form-label" hidden>* Τμήμα</label>
                                    <input type="text" name="other_dep" id="other_dep"
                                    <?php 
                                        if ($check && $matchedDep == true) {
                                            echo "style=display:none";
                                        } else if ($check && $matchedDep == false) {
                                            echo "value='$department'";
                                        }
                                    ?> <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?>>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="start-date">* Ημερομηνία εγγραφής</label>
                                    <input type="date" class="form-control" name="start-date" id="start-date" style="max-width:85%;"
                                    <?php if ($check) echo "value=".$startDate?> 
                                    required <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?>>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="end-date">* Ημερομηνία αποφοίτησης</label>
                                    <input type="date" class="form-control" name="end-date" id="end-date" style="max-width:85%;" 
                                    <?php if ($check) echo "value=".$endDate?> 
                                    required <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?>>
                                </div>
                            </div>
                            <br>
                            <button type="button" name="previous" class="previous action-button" style="text-align: center;width:45px;justify-content: center;display:flex;display:inline-block;margin-left:400px;font-size: 0;background-color:#217B9C">v<i class="bi bi-arrow-left" style='font-size:17px;'></i></button>
                            <button type="button" name="next" class="next action-button" style="text-align: center;width:45px;display:flex;display:inline-block;justify-content: center;font-size: 0;background-color:#217B9C">v<i class="bi bi-arrow-right" style='font-size:17px;'></i></button>                            <br>
                            <div class="my-3">
                                <div class="loading"></div>
                                <div class="error-message"></div>
                                <div class="sent-message"></div>
                            </div>
                            <div class="text-center">
                                <button value="DELETE" type="submit" name="submit" class="btn btn-outline-danger" style="border-radius: 20px;margin-left:0px" <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?> formnovalidate>Διαγραφή Αίτησης</button>
                                <button value="ΠΡΟΧΕΙΡΗ" type="submit" name="submit" class="btn btn-outline-warning" style="border-radius: 20px;margin-left:400px;color:black" <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?> formnovalidate>Προσωρινή Αποθήκευση</button>&nbsp;&nbsp;&nbsp;
                                <button value="ΕΚΚΡΕΜΗΣ" type="submit" name="submit" class="btn btn-outline-success" style="border-radius: 20px;text-align: start;" <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?>>Οριστική Υποβολή</button>
                        </fieldset>
                        <fieldset>
                            <h3 class="fs-subtitle" style="font-weight: bold; text-align: center">Επιλέξτε τα δικαιολογητικά που θέλετε να υποβάλετε</h3>
                            <h6 class="fs-subtitle" style="text-align: center"> Πρέπει να επισυνάψετε: Αντίγραφο ταυτότητας ή διαβατηρίου, Αντίγραφο τίτλου σπουδών, Παράβολο, Υπεύθυνη δήλωση Ν.1599/1986 και Έντυπο Συγκατάθεσης</h6><br>
                            <div id="uploaded_files" name="uploaded_files">
                                <!-- display uploaded files -->
                                <?php 
                                    if ($check && $state != "ΠΡΟΧΕΙΡΗ") {
                                        $sql2 = "SELECT d.* FROM application a, document d WHERE a.APPLICATION_ID =" . $app_id . " AND a.APPLICATION_ID = d.APPLICATION_ID";
                                        $result2 = mysqli_query($conn, $sql2);
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            echo
                                            '
                                            <a href="uploads/' . $row2["USER_ID"] . '/' . $row2["FILENAME"] . '" download>
                                            ' . $row2["FILENAME"] . '
                                            </a>
                                            <br>
                                            ';
                                        }
                                    }
                                ?>
                            </div>
                            
                            <label for="file-upload" class="col-sm-2 col-form-label" hidden>* File</label>
                            <input type="file" id="file-upload" name="file-upload[]" multiple <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "hidden"?>>

                            <br>
                            <button type="button" name="previous" class="previous action-button" style="text-align: center;width:45px;justify-content: center;display:flex;display:inline-block;margin-left:400px;font-size: 0;background-color:#217B9C">v<i class="bi bi-arrow-left" style='font-size:17px;'></i></button>
                            <br>

                            <div class="my-3">
                                <div class="loading"></div>
                                <div class="error-message"></div>
                                <div class="sent-message"></div>
                            </div>
                            <div class="text-center">
                                <button value="DELETE" type="submit" name="submit" class="btn btn-outline-danger" style="border-radius: 20px;margin-left:0px" <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?> formnovalidate>Διαγραφή Αίτησης</button>
                                <button value="ΠΡΟΧΕΙΡΗ" type="submit" name="submit" class="btn btn-outline-warning" style="border-radius: 20px;margin-left:400px;color:black" <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?> formnovalidate>Προσωρινή Αποθήκευση</button>&nbsp;&nbsp;&nbsp;
                                <button value="ΕΚΚΡΕΜΗΣ" type="submit" name="submit" class="btn btn-outline-success" style="border-radius: 20px;text-align: start;" <?php if ($check && $state != "ΠΡΟΧΕΙΡΗ") echo "disabled"?>>Οριστική Υποβολή</button>
                        </fieldset>
                        <br>
                    </form>
                </div><!-- /.MultiStep Form -->
            </main>
        </section>
    </div>

    <?php include "footer.html"; ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center" aria-label="up"><i class="bi bi-arrow-up-short"></i></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <script>
        const dt = new DataTransfer()

        function printFiles() {
            $("#uploaded_files").html("");
            for (var i = 0; i < dt.files.length; i++) {
                $("#uploaded_files").append(
                "<div class='row'>"
                +
                "<div class='col'>"
                +
                dt.files[i].name
                +
                "</div>"
                +
                "<div class='col'>"
                +
                "<button type='button' onclick='removeFileFromFileList("+i+")'>Διαγραφή</button> "
                +
                "</div>"
                +
                "</div>");
            }
        }

        function addFiles() {
            for (var i = 0; i < this.files.length; i++) {
                dt.items.add(this.files[i])
            }

            printFiles();

            console.log(dt.items.length);

            this.value = [];

            // this.files = dt.files;
        }

        function removeFileFromFileList(index) {
            dt.items.remove(index);

            printFiles();
        }

        document.getElementById("file-upload").addEventListener("change", addFiles, false);

        $('#msform').submit(function() {
            document.getElementById("file-upload").files = dt.files;
            return true; // return false to cancel form action
        });

    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            countrySelect = document.getElementById("country");
            uniSelect = document.getElementById("university");
            depSelect = document.getElementById("department");

            otherCountryInput = document.getElementById("other_country");
            otherUniInput = document.getElementById("other_uni");
            otherDepInput = document.getElementById("other_dep");

            firstRun = true;

            $("#country").change(function() {
                otherCountryInput.style.display = "none";
                otherUniInput.style.display = "none";
                otherDepInput.style.display = "none";
                uniSelect.value = "";
                depSelect.value = "";

                var val = $(this).val();
                if (val == "Γερμανία") {
                    $("#university").html   ("<option value=''      <?php if ($check && $university == "")                          { echo "selected"; $matchedUni = true; }?>>--Επιλέξτε πανεπιστήμιο--</option>");
                    $("#university").append ("<option               <?php if ($check && $university == "Freie Universität Berlin")  { echo "selected"; $matchedUni = true; }?>>Freie Universität Berlin</option>");
                    $("#university").append ("<option value='other' <?php if ($check && $matchedUni == false)                       { echo "selected"; }?>>Άλλo</option>");
                    uniSelect.removeAttribute('disabled');
                    depSelect.setAttribute('disabled', 'disabled');
                    if (firstRun == false) {
                        uniSelect.value = "";
                        depSelect.value = "";
                    }
                } else if (val == "ΗΠΑ") {
                    $("#university").html   ("<option value=''      <?php if ($check && $university == "")                          { echo "selected"; $matchedUni = true; }?>>--Επιλέξτε πανεπιστήμιο--</option>");
                    $("#university").append ("<option               <?php if ($check && $university == "Harvard University")        { echo "selected"; $matchedUni = true; }?>>Harvard University</option>");
                    $("#university").append ("<option value='other' <?php if ($check && $matchedUni == false)                       { echo "selected"; }?>>Άλλo</option>");
                    uniSelect.removeAttribute('disabled');
                    depSelect.setAttribute('disabled', 'disabled');
                    if (firstRun == false) {
                        uniSelect.value = "";
                        depSelect.value = "";
                    }
                } else if (val == "Ηνωμένο Βασίλειο") {
                    $("#university").html   ("<option value=''      <?php if ($check && $university == "")                          { echo "selected"; $matchedUni = true; }?>>--Επιλέξτε πανεπιστήμιο--</option>");
                    $("#university").append ("<option               <?php if ($check && $university == "University of Oxford")      { echo "selected"; $matchedUni = true; }?>>University of Oxford</option>");
                    $("#university").append ("<option value='other' <?php if ($check && $matchedUni == false)                       { echo "selected"; }?>>Άλλo</option>");
                    uniSelect.removeAttribute('disabled');
                    depSelect.setAttribute('disabled', 'disabled');
                    if (firstRun == false) {
                        uniSelect.value = "";
                        depSelect.value = "";
                    }
                } else if (val == "other") {
                    uniSelect.removeAttribute('disabled');
                    depSelect.removeAttribute('disabled');
                    otherCountryInput.style.display = "block";
                    otherUniInput.style.display = "block";
                    uniSelect.value = "other";
                    otherDepInput.style.display = "block";
                    depSelect.value = "other";
                } else if (val == '') {
                    $("#university").html   ("<option value=''      <?php if ($check && $university == "")                          { echo "selected"; $matchedUni = true; }?>>--Επιλέξτε πανεπιστήμιο--</option>");
                    $("#university").append ("<option value='other' <?php if ($check && $matchedUni == false)                       { echo "selected"; }?>>Άλλo</option>");
                    uniSelect.setAttribute('disabled', 'disabled');
                    depSelect.setAttribute('disabled', 'disabled')
                    if (firstRun == false) {
                        uniSelect.value = "";
                        depSelect.value = "";
                    }
                }

                <?php 
                    if ($check && $state != "ΠΡΟΧΕΙΡΗ") 
                    echo
                    "
                    uniSelect.setAttribute('disabled', 'disabled');
                    depSelect.setAttribute('disabled', 'disabled');
                    ";
                ?>
            });

            $("#university").change(function() {
                otherUniInput.style.display = "none";
                otherDepInput.style.display = "none";
                depSelect.value = "";

                var val = $(this).val();
                if (val == "Freie Universität Berlin") {
                    $("#department").html   ("<option value=''      <?php if ($check && $department == "")              { echo "selected"; $matchedDep = true; }?>>--Επιλέξτε τμήμα--</option>");
                    $("#department").append ("<option               <?php if ($check && $department == "Architektur")   { echo "selected"; $matchedDep = true; }?>>Architektur</option>");
                    $("#department").append ("<option               <?php if ($check && $department == "Medizin")       { echo "selected"; $matchedDep = true; }?>>Medizin</option>");
                    $("#department").append ("<option value='other' <?php if ($check && $matchedDep == false)           { echo "selected"; }?>>Άλλo</option>");
                    depSelect.removeAttribute('disabled');
                    if (firstRun == false) {
                        depSelect.value = "";
                    }
                } else if (val == "Harvard University") {
                    $("#department").html   ("<option value=''      <?php if ($check && $department == "")                          { echo "selected"; $matchedDep = true; }?>>--Επιλέξτε τμήμα--</option>");
                    $("#department").append ("<option               <?php if ($check && $department == "Computer Science")          { echo "selected"; $matchedDep = true; }?>>Computer Science</option>");
                    $("#department").append ("<option               <?php if ($check && $department == "Electrical Engineering")    { echo "selected"; $matchedDep = true; }?>>Engineering</option>");
                    $("#department").append ("<option value='other' <?php if ($check && $matchedDep == false)                       { echo "selected"; }?>>Άλλo</option>");
                    depSelect.removeAttribute('disabled');
                    if (firstRun == false) {
                        depSelect.value = "";
                    }
                } else if (val == "University of Oxford") {
                    $("#department").html   ("<option value=''      <?php if ($check && $department == "")                      { echo "selected"; $matchedDep = true; }?>>--Επιλέξτε τμήμα--</option>");
                    $("#department").append ("<option               <?php if ($check && $department == "Computer Science")      { echo "selected"; $matchedDep = true; }?>>Computer Science</option>");
                    $("#department").append ("<option               <?php if ($check && $department == "Mechanical Engineering"){ echo "selected"; $matchedDep = true; }?>>Mechanical Engineering</option>");
                    $("#department").append ("<option value='other' <?php if ($check && $matchedDep == false)                   { echo "selected"; }?>>Άλλo</option>");
                    depSelect.removeAttribute('disabled');
                    if (firstRun == false) {
                        depSelect.value = "";
                    }
                } else if (val == "other") {
                    depSelect.removeAttribute('disabled');
                    otherUniInput.style.display = "block";
                    otherDepInput.style.display = "block";
                    depSelect.value = "other";
                } else if (val == '') {
                    $("#department").html   ("<option value=''      <?php if ($check && $department == "")    { echo "selected"; $matchedDep = true; }?>>--Επιλέξτε τμήμα--</option>");
                    $("#department").append ("<option value='other' <?php if ($check && $matchedDep == false) { echo "selected"; }?>>Άλλo</option>");
                    depSelect.setAttribute('disabled', 'disabled')
                    if (firstRun == false) {
                        depSelect.value = "";
                    }
                }

                <?php 
                    if ($check && $state != "ΠΡΟΧΕΙΡΗ") 
                    echo
                    "
                    uniSelect.setAttribute('disabled', 'disabled');
                    depSelect.setAttribute('disabled', 'disabled');
                    ";
                ?>
            });

            $("#department").change(function() {
                otherDepInput.style.display = "none";

                var val = $(this).val();
                if (val == "other") {
                    otherDepInput.style.display = "block";
                }
            });

            $('#country').trigger('change');
            $('#university').trigger('change');
            $('#department').trigger('change');

            firstRun = false;
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