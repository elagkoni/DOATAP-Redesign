<main>
    <div class="row justify-content-center">
        <div class="col-md-9" style="padding-left:20px;">
            <h5> <i class="bi bi-person align-items-center" aria-hidden="true"></i> Προσωπικά Στοιχεία</h5>
        </div>
        <div class="col-md-3">
            <a href="#editProfileModal" data-toggle="modal" id="editProfile" data-backdrop="false">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-secondary"><i class="bi bi-pencil-square"></i> Επεξεργασία</button></a>
        </div>
        <hr> <br>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="form-group">
                    <label style="font-weight:bold;" class="col-sm-2 control-label">Όνομα</label>
                    <div class="col-sm-8">
                        <?php echo $_SESSION["firstname"]; ?>
                    </div>
                </div><br>
                <div class="form-group">
                    <label style="font-weight:bold;" class="col-sm-2 control-label">Επώνυμο</label>
                    <div class="col-sm-8">
                        <?php echo $_SESSION["lastname"]; ?>
                    </div>
                </div><br>
                <div class="form-group">
                    <label style="font-weight:bold;" class="col-sm-8 control-label">Ημερομηνία γέννησης</label>
                    <div class="col-sm-8">
                        <?php echo $_SESSION["birthdate"]; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label style="font-weight:bold;" class="col-sm-2 control-label">Πατρώνυμο</label>
                    <div class="col-sm-8">
                        <?php echo $_SESSION["fathername"]; ?>
                    </div>
                </div><br>
                <div class="form-group">
                    <label style="font-weight:bold;" class="col-sm-2 control-label">Μητρώνυμο</label>
                    <div class="col-sm-8">
                        <?php echo $_SESSION["mothername"]; ?>
                    </div>
                </div><br>
                <div class="form-group">
                    <label style="font-weight:bold;" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <?php echo $_SESSION["email"]; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label style="font-weight:bold;" class="col-sm-2 control-label">Τηλέφωνο</label>
                    <div class="col-sm-8">
                        <?php echo $_SESSION["telephone"] ?? null; ?>
                    </div>
                </div><br>
                <div class="form-group">
                    <label style="font-weight:bold;" class="col-sm-2 control-label">Κινητό</label>
                    <div class="col-sm-8">
                        <?php echo $_SESSION["phone"]; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="editProfileModal" class="modal fade contact">
        <div class="modal-dialog modal-dialog-center modal-lg row justify-content-center">
            <div class="modal-content">
                <form action="forms/update_profile_form.php" method="post" class="php-email-form">
                    <div class="modal-header">
                        <h4><i class="bi bi-pencil"></i><b> Επεξεργασία των στοιχείων μου</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <hr>
                    </div>
                    <div class="contact modal-body">
                        <div class="container align-items-center">
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-8">
                                        <label for="firstname" class="col-4 col-form-label">Όνομα</label>
                                        <div class="form-group">
                                            <input id="firstname" name="firstname" value=<?php echo $_SESSION["firstname"]; ?> class="form-control" type="text">
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="lastname" class="col-4 col-form-label">Επώνυμο</label>
                                        <div class="form-group">
                                            <input id="lastname" name="lastname" value=<?php echo $_SESSION["lastname"]; ?> class="form-control" type="text">
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="birthdate" class="col-4 col-form-label">Ημερομηνία γέννησης</label>
                                        <div class="form-group">
                                            <input id="birthdate" name="birthdate" value=<?php echo $_SESSION["birthdate"]; ?> class="form-control" type="date" max="2004-12-31">
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="fathername" class="col-4 col-form-label">Πατρώνυμο</label>
                                        <div class="form-group">
                                            <input id="fathername" name="fathername" value=<?php echo $_SESSION["fathername"]; ?> class="form-control" type="text">
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="mothername" class="col-4 col-form-label">Μητρώνυμο</label>
                                        <div class="form-group">
                                            <input id="mothername" name="mothername" value=<?php echo $_SESSION["mothername"]; ?> class="form-control" type="text">
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="email" class="col-4 col-form-label">Email</label>
                                        <div class="form-group">
                                            <input id="email" name="email" value=<?php echo $_SESSION["email"]; ?> class="form-control" type="email">
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="telephone" class="col-4 col-form-label">Τηλέφωνο</label>
                                        <div class="form-group ">
                                            <input id="telephone" name="telephone" value='<?php echo $_SESSION["telephone"]; ?>' class="form-control" type="tel">
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="phone" class="col-4 col-form-label">Κινητό</label>
                                        <div class="form-group ">
                                            <input id="phone" name="phone" value=<?php echo $_SESSION["phone"]; ?> class="form-control" type="tel">
                                            <div class="validate"></div>
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
</main>