<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex me-auto">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:information_dep@doatap.gr">information_dep@doatap.gr</a></i>
      <i class="bi bi-telephone d-flex align-items-center ms-4"><span>+30 210 528 1000</span></i>
    </div>
    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-globe2 d-flex align-items-center"><a href="./coming_soon.php">English</a></i>
      <form autocomplete="off">
        <div class="input-group">
          <label for="search" class="col-2 col-form-label" style="visibility: hidden;color:#D9D9D9;">Αναζήτηση</label>
          <input id="search" type="search" class="form-control" style="font-size:14px;">
          <button type="button" class="rounded" style="border: 0;color: #545454;"><i class="bi bi-search"></i>&nbsp;Αναζήτηση</button>
        </div>
      </form>
    </div>
</section>


<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
  <div class="container d-flex justify-content-between align-items-center">

    <div class="logo">
      <a href="index.php" class="ms-auto"><img src="pictures/logo.png" alt="ΔΟΑΤΑΠ"></a>
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="index.php">Αρχική</a></li>
        <li class="dropdown"><a href="./recognition.php"><span>Αναγνώριση Πτυχίου</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <?php
            if (isset(($_SESSION['login_user'])) && ($_SESSION['login_user']) == true) {
              echo '<h4><a href="./new_application.php">Νέα Αίτηση</a></h4>';
            } else {
              echo '<h4><a href="./login.php">Νέα Αίτηση</a></h4>';
            }
            ?>
                <li><a href="./coming_soon.php">Χρήσιμα Έγγραφα</a></li>
                <li><a href="./coming_soon.php">Λίστα Αναγνωρισμένων Ιδρυμάτων</a></li>
                <li><a href="./coming_soon.php">Τιμές Παραβόλων</a></li>
              
            <li><a href="./coming_soon.php">Συχνές Ερωτήσεις</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="./coming_soon.php"><span>Νέα-Ανακοινώσεις</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="./coming_soon.php">Ανακοινώσεις</a></li>
            <li><a href="./coming_soon.php">Προϋπολογισμοί-Προκηρύξεις</a></li>
            <li><a href="./coming_soon.php">Αποφάσεις Δ.Σ.</a></li>
          </ul>
        </li>
        <li><a href="contact.php">Επικοινωνία και Πρόσβαση</a></li>
        <li class="dropdown"><a href="./coming_soon.php"><span>Ο Οργανισμός</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="./coming_soon.php">Χαιρετισμός Προέδρου</a></li>
            <li><a href="./coming_soon.php">Ιστορία και Θεσμικό Πλαίσιο</a></li>
            <li><a href="./coming_soon.php">Στόχοι, Έργο και Δράσεις</a></li>
            <li><a href="./coming_soon.php">Δικοικητικό Συμβούλιο</a></li>
            <li><a href="./coming_soon.php">Όργανα διοίκησης - Συγκρότηση και λειτουργία</a></li>
            <li class="dropdown"><a href="./coming_soon.php"><span>Οργανόγραμμα</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="./coming_soon.php">Γραφείο Προέδρου</a></li>
                <li><a href="./coming_soon.php">Διεύθυνση Αναγνώρισης Τίτλων</a></li>
                <li><a href="./coming_soon.php">Διεύθυνση Ενημέρωσης</a></li>
                <li><a href="./coming_soon.php">Διεύθυνση Διοικητικών & Οικονομικών</a></li>
                <li><a href="./coming_soon.php">Αυτοτελές Δικαστικό Γραφείο</a></li>
              </ul>
            </li>
            <li><a href="./coming_soon.php">Ετήσιος Απολογισμός Δ.Σ.</a></li>
            <li><a href="./coming_soon.php">Στατιστικά Στοιχεία</a></li>
            <li><a href="./coming_soon.php">Νόμος 2238/2005</a></li>
            <li><a href="./coming_soon.php">Δι@υγεια</a></li>
          </ul>
        </li>

        <?php
        if (isset(($_SESSION['login_user'])) && ($_SESSION['login_user']) == true) {
          echo '<div class=" d-flex justify-content-end">
                  <a class="login-icons" href="user.php"><i class="bi bi-person-fill" style="font-size:16px">&nbsp</i>Προφίλ</a>
                  <a class="login-icons" href="logout.php"><i class="bi bi-box-arrow-in-right" style="font-size:17px">&nbsp</i>Αποσύνδεση</a>
                  </div>';
        } else {
          echo '<a href="login.php"><i class="bi bi-lock-fill" style="font-size:15px">&nbsp</i>Σύνδεση</a>
          <a href="signup.php"><i class="bi bi-pencil-fill" style="font-size:15px">&nbsp</i>Εγγραφή</a>';
        }
        ?>

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->