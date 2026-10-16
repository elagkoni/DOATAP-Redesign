<main style="padding-top: 0px;">
    <h1 style="text-align: center;"> Οι αιτήσεις μου </h1> <br>
    <h6> Στον παρακάτω πίνακα βλέπετε όλες τις αιτήσεις σας. Συγκεκριμένα για τις <span><b><u>υποβληθείσες</u></b></span> αιτήσεις:<br>
        <ul><br>
            <li>Το <span style="color: #388038"><b>πράσινο</b></span> υποδεικνύει ότι η αίτηση εγκρίθηκε.</li><br>
            <li>Το <span style="color: #946A00"><b>κίτρινο</b></span> υποδεικνύει ότι η αίτηση είναι εκκρεμής.</li><br>
            <li>Το <span style="color: #D53734"><b>κόκκινο</b></span> υποδεικνύει ότι η αίτηση απορρίφθηκε.</li>
        </ul>
    </h6><br>
    <button type="button" onclick="location.href='new_application.php'" class="btn btn-outline-primary" style="padding: 11px 16px;">
        <i class="bi bi-file-earmark-plus"></i>
        Νέα Αίτηση
    </button><br><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" style="text-align: center;">Τελευταία επεξεργασία</th>
                <th scope="col" style="text-align: center;">Αριθμός αίτησης</th>
                <th scope="col" style="text-align: center;">Κατάσταση αίτησης</th>
                <th scope="col" style="text-align: center;">Ενέργειες</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM application a WHERE USER_ID=" . $_SESSION["USER_ID"];
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
                    } else {
                        $class = '';
                    }
                    echo "
                        <tr class='$class'>
                            <tH scope=\"row\" style=\"text-align: center;\">"   . $row["CREATION_DATE"] .   "</td>
                            <td style=\"text-align: center;\">"                 . $row["APPLICATION_ID"] .  "</td>
                            <td style=\"text-align: center;\">"                 . $row["STATE"] .           "</td>
                            <td style=\"text-align: center;\">
                        ";

                    if ($row["STATE"] == "ΠΡΟΧΕΙΡΗ") {
                        echo
                        "
                        <button type=\"button\" onclick=\"location.href='new_application.php?id=" . $row["APPLICATION_ID"] . "'\" class=\"btn btn-outline-secondary\" style=\"color:black\"><i class=\"bi bi-pencil-square\"></i> Επεξεργασία</button>&nbsp;
                        <button type=\"button\" onclick=\"location.href='delete_application.php?id=" . $row["APPLICATION_ID"] . "'\" class=\"btn btn-outline-secondary\" style=\"color:black\"> <i class=\"bi bi-x-circle\"></i> Διαγραφή</button>&nbsp;
                        ";
                    } else if ($row["STATE"] == "ΑΠΟΡΡΙΦΘΕΙΣΑ") {                        
                        echo
                        "
                        <button type=\"button\" onclick=\"location.href='new_application.php?id=" . $row["APPLICATION_ID"] . "'\" class=\"btn btn-outline-danger\" style=\"color:black\"> <i class=\"bi bi-eye\"></i> Προεπισκόπηση</button>&nbsp;
                        <a href=\"#reasonModal" . $row['APPLICATION_ID'] . "\" id=\"reason\" data-toggle=\"modal\" data-backdrop=\"false\">
                            <button type=\"button\" class=\"btn btn-outline-danger\" style=\"color:black\"> <i class=\"bi bi-exclamation-circle\"></i> Λόγοι Απόρριψης</button>
                        </a>&nbsp;

                        <div id=\"reasonModal" . $row['APPLICATION_ID'] . "\" class=\"modal fade contact\">
                            <div class=\"modal-dialog modal-dialog-center modal-lg row justify-content-center\">
                                <div class=\"modal-content\">
                                    <form action=\"forms/update_profile_form.php\" method=\"post\" class=\"php-email-form\">
                                        <div class=\"modal-header\">
                                            <h4><b> Λόγοι απόρριψης αίτησης #" . $row["APPLICATION_ID"] . "</b></h4><br>
                                            <button type=\"button\" class=\"btn-close\" data-dismiss=\"modal\" aria-label=\"Close\"></button>
                                            <hr>
                                        </div>
                                        <div class=\"contact modal-body\">
                                            <div class=\"container align-items-start \">
                                                <div class=\"row\">                                                
                                                " . $row["REASON_OF_DENIAL"] . "
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            ";

                    } else if ($row["STATE"] == "ΕΓΚΕΚΡΙΜΕΝΗ") {
                        echo
                        "
                        <button type=\"button\" onclick=\"location.href='new_application.php?id=" . $row["APPLICATION_ID"] . "'\" class=\"btn btn-outline-success\" style=\"color:black\"> <i class=\"bi bi-eye\"></i> Προεπισκόπηση</button>&nbsp;
                        <button type=\"button\" onclick=\"location.href='document.php?id="        . $row["APPLICATION_ID"] . "'\" class=\"btn btn-outline-success\" style=\"color:black\"> <i class=\"bi bi-eye\"></i> Προβολή Εντύπου</button>&nbsp;
                        ";
                    } else if ($row["STATE"] == "ΕΚΚΡΕΜΗΣ") {
                        echo
                        "
                        <button type=\"button\" onclick=\"location.href='new_application.php?id=" . $row["APPLICATION_ID"] . "'\" class=\"btn btn-outline-warning\" style=\"color:black\"> <i class=\"bi bi-eye\"></i> Προεπισκόπηση</button>&nbsp;
                        ";

                        $sql2 = "SELECT * FROM suggested a WHERE APPLICATION_ID=" . $row["APPLICATION_ID"];
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result2)) {                            
                            echo
                            "
                            <a href=\"#subjectModal" . $row['APPLICATION_ID'] . "\" id=\"subject\" data-toggle=\"modal\" data-backdrop=\"false\">
                                <button type=\"button\" class=\"btn btn-outline-warning\" style=\"color:black\"> <i class=\"bi bi-book\"></i> Προτεινόμενα Μαθήματα</button>
                            </a>&nbsp;
                            ";
                            ob_start(); 
                            while($row2 = mysqli_fetch_assoc($result2)){         
                                echo"<ul><li><b>". $row2["SUBJECT"] ."</b> από τo <b>". $row2["DEPARTMENT"] ."</b> <br>(". $row2["UNIVERSITY"] .")</li></ul>";
                            } 
                            $responseString = ob_get_clean(); 
                            echo 
                            "
                            <div id=\"subjectModal" . $row['APPLICATION_ID'] . "\" class=\"modal fade contact\">
                            <div class=\"modal-dialog modal-dialog-center modal-lg row justify-content-center\">
                                <div class=\"modal-content\">
                                    <form action=\"forms/update_profile_form.php\" method=\"post\" class=\"php-email-form\">
                                        <div class=\"modal-header\">
                                            <h4><b> Μαθήματα που θα χρειαστεί να περάσετε για να αποκτήσετε την αναγνώριση </b></h4><br>
                                            <button type=\"button\" class=\"btn-close\" data-dismiss=\"modal\" aria-label=\"Close\"></button>
                                            <hr>
                                        </div>
                                        <div class=\"contact modal-body\">
                                            <div class=\"container align-items-start \">
                                                <div class=\"row\">                                                
                                                    ". $responseString ."                   
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            ";
                        }
                    }
                }
            } else {
                echo "Δεν βρέθηκαν αιτήσεις";
            }
            ?>
        </tbody>
    </table><br>
</main>