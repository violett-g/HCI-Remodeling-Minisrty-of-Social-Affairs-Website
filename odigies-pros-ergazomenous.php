<?php
session_start();
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Οδηγίες Προς Εργαζόμενους</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body>
  <!-- _______________________________________Header_____________________________________________________ -->
  <!-- COVID-19 -->
  <div id="covban" class="covid-alert" bg-danger>
    <a href="covid.php">Covid-19: Πληροφορίες και υπηρεσίες</a>
    <button type="button" onclick="document.getElementById('covban').style.display='none'" class="close-bar-btn">Κλείσιμο</button>
  </div>
  <header class="bg-primary py-2 ">

    <!--Navigation bar-->
    <div class="topnav">
      <div class="logo">
        <img class="logo-img" src="img/logo2.png" width="50" height="50">
        <div class="logo-name">
          Υπουργείο Εργασίας <br> και Κοινωνικών Υποθέσεων
        </div>
      </div>
      <div class="search-log">
        <!--Search box-->
        <form class="searchbox">
          <!-- Page action="search.php" method="post" -->
          <div class=wrap>
            <input type="text" placeholder=" " autocomplete="off">
            <button class="searchsub" type="submit" value="Αναζήτηση"><i class="fas fa-search" style="font-size: 20px;"></i></button>
          </div>
        </form>
        <!--LOGIN-->
        <div class="login">
          <!-- Button to open the modal login form -->
          <?php if (isset($_SESSION['loged'])) { ?>
            <button name="logout" class="logbutton"><a href="logout.php"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>Αποσύνδεση<a></button>
            <button name="settings" class="logbutton"><a href="settings.php">
                <span style="color:#0e1577">
                  <i class="fa fa-user-cog"></i><a>
                </span>
            </button>
          <?php } else { ?>
            <button class="logbutton" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-user"></i>Σύνδεση</button>
          <?php } ?>
          <!-- The Modal -->
          <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

            <!-- Modal Content -->
            <form class="modal-content animate" action="contact.php" method="post">
              <div class="container">
                <input name="username" type="text" placeholder="Όνομα Χρήστη " name="uname" required>
                <input name="password" type="password" placeholder="Κωδικός Πρόσβασης " name="psw" required>

                <button name="submit_btn" type="submit" style="border-radius: 10rem; height:40px; width:50%; margin-bottom:20px">Είσοδος</button>
                <label>
                  <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
              </div>

              <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Ακύρωση</button>
                <span class="psw">Ξεχάσατε τον <a href="forgot-password.php">κωδικό</a> σας?</span>
                <div class="text-right">
                  <a class="small" href="registration.php">Δημιουργία λογαριασμού!</a>
                </div>
              </div>
            </form>
            <?php
            function phpAlert($msg)
            {
              echo '<script type="text/javascript">alert("' . $msg . '")</script>';
            }
            function phpConfAlert()
            {
              echo "<script> window.location.assign('contact.php'); </script>";
            }
            if (isset($_POST['submit_btn'])) {
              $username = $_POST['username'];
              $password = $_POST['password'];
              $query = "select * from user WHERE username = '$username' AND password='$password'";
              $query_run = $con->query($query);
              if ($query_run->num_rows > 0) {
                $row = mysqli_fetch_row($query_run);
                if (!isset($_SESSION['loged'])) {
                  $_SESSION['loged'] = 1;
                  $_SESSION['username'] = $username;
                  $_SESSION['password'] = $password;
                  $afm = $row[0];
                  $_SESSION['afm'] = $afm;
                  $role = $row[6];
                  $_SESSION['role'] = $role;
                  $_SESSION['name'] = $row[3];
                  $_SESSION['surname'] = $row[4];
                  $_SESSION['email'] = $row[5];
                  $_SESSION['address'] = $row[7];
                  $_SESSION['phone'] = $row[8];
                  header('Location:contact.php');
                }
                phpConfAlert();
              } else {
                phpAlert("Aυτός ο λογαριασμός δεν υπάρχει ελέγξτε το όνομα χρήστη και τον κωδικό πρόσβασης και δοκιμάστε ξανά!");
              }
            }
            ?>
          </div>
        </div>
      </div>

      <!--LANGUAGE-->
      <!-- MENOU -->
      <div class="main-menou">
        <ul>
          <li><a href="index.php"><i class="fas fa-home"></i></a></li>
          <li><a href="#">Εργαζόμενοι</a></li>
          <li><a href="#">Εργοδότες/Επιχειρήσεις</a></li>
          <li><a href="#">Εργασία & Ασφάλιση</a></li>
          <li><a href="#">Πρόνοια</a></li>
          <li><a href="contact.php">Επικοινωνία</a></li>
          <li><a href="covid.php">COVID-19</a></li>
        </ul>
      </div>

    </div>
    <!--topnav-->
  </header>

  <!--    UNDER MAIN BAR -->
  <div class="logbar-breadcrumb">

    <nav id="under-bar" style="height: 50px; " class="navbar navbar-expand navbar-light bg-white topbar mb-1 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">
        <!--Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Οι ειδοποιήσεις σας</h6>
            <a class="dropdown-item text-center small text-gray-500" href="#">Δεν έχετε καμία ειδοποίηση</a>
          </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
              Τα μηνύματά σας
            </h6>
            <a class="dropdown-item text-center small text-gray-500" href="#">Δεν έχετε κανένα μήνυμα</a>
          </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?> </span>
            <span style="font-size: 30px; "><i class="fa fa-user-circle"></i></span>
          </a>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
      </ul>

    </nav>

    <!--breadcrumbs-->
    <div style="margin-top: 5px; background-color:transparent">
      <ul class="breadcrumbs">
        <li class="breadcrumbTitle">
          <a href="index.php" class="breadcrumbLink"><i class="fas fa-home"></i></a>
        </li>
        <li class="breadcrumbTitle">
          <a href="covid.php" class="breadcrumbLink breadcrumbLinkActive">Covid-19</a>
        </li>
      </ul>
    </div>

  </div>
  <!--undermainbar-->


  <!--________________________________Page content_____________________________-->

  <div class="content" style="padding:0 100px 100px 100px; ">
    <!-- Page Wrapper -->
    <div class="bar-info">
      <!-- <div> -->



      <!-- </div> -->

      <div class="info">


        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Οδηγίες για τους Εργαζομένους</h1>
          <button class="accordion-custom">Γενικές Οδηγίες και Μέτρα Πρόληψης</button>
          <div class="panel">
            <br>Τα προληπτικά μέτρα κατά της διασποράς αναπνευστικών ιών περιλαμβάνουν οδηγίες ατομικής υγιεινής και
            καθαρισμού και απολύμανσης χώρων, επιφανειών και αντικειμένων.<br><br>
            1. Οδηγίες ατομικής υγιεινής:<br>
            <ul>
              <li>Παραμονή κατ’οίκον και αποχή από την παρακολούθηση μαθημάτων ή την εργασία οποιουδήποτε
                ατόμου εμφανίζει συμπτώματα λοίμωξης αναπνευστικού</li>
              <li>Αποφυγή στενής επαφής, εφόσον αυτό είναι δυνατό,με οποιοδήποτε άτομο εμφανίζει συμπτώματα
                από το αναπνευστικό, όπως βήχα ή πταρμό.</li>
              <li>Αποφυγή επαφής χεριών με τα μάτια, τη μύτη και το στόμα για τη μείωση του κινδύνου μόλυνσης.</li>
              <li>Αποφυγή κοινής χρήσης των μολυβιών, των στυλό, των μαρκαδόρων και άλλων προσωπικών
                αντικειμένων.</li>
              <li>Σε βήχα ή φτέρνισμα, κάλυψη της μύτης και του στόματος με το μανίκι στο ύψος του αγκώνα ή με
                χαρτομάντιλο, απόρριψη του χρησιμοποιημένου χαρτομάντηλου στους κάδους απορριμάτων και
                επιμελές πλύσιμο των χεριών.</li>
              <li>Απαγορεύεται τα παιδιά να πίνουν νερό απευθείας από τη βρύση με το στόμα.</li>
              <li>Τακτικό και επιμελές πλύσιμο των χεριών με υγρό σαπούνι και νερό, για τουλάχιστον 20’’,πριν τη
                λήψη τροφής και μετά την επίσκεψη στην τουαλέτα, και προσεκτικό στέγνωμα χεριών με χάρτινες
                χειροπετσέτες μιας χρήσης και απόρριψή τους στους κάδους απορριμάτων.</li>
              <li>Εναλλακτικά του πλυσίματος χεριών, μπορεί να εφαρμοστεί καλό τρίψιμο των χεριών με αντισηπτικό
                αλκοολούχο διάλυμα ή χαρτομάντιλα με αλκοόλη. Το μπουκάλι με το αλκοολούχο διάλυμα να
                βρίσκεται κοντά στην έξοδο της αίθουσας διδασκαλίας και να χρησιμοποιείται υπό την εποπτεία του
                εκπαιδευτικού της τάξης.</li>
            </ul>
            2. Οδηγίες καθαρισμού και απολύμανσης:<br>
            <ul>
              <li>Συστηματικός και επαρκής αερισμός όλων των χώρων κυρίως στα διαλείμματα.</li>
              <li>Πέρα από τις συνήθεις εργασίες καθαρισμού, συχνός καθαρισμός των λείωνεπιφανειών που
                χρησιμοποιούνται συχνά (π.χ. πόμολα, χερούλια, κουπαστή από σκάλες ή κιγκλίδωμα, βρύσες κλπ) με
                κοινά καθαριστικά, δηλαδή υγρό σαπούνι και νερό, ή διάλυμα οικιακής χλωρίνης 10% (1 μέρος
                οικιακής χλωρίνης αραιωμένο σε 10 μέρη νερό) ή αλκοολούχο αντισηπτικό.</li>
              <li>Οι εργασίες καθαρισμού να γίνονται με χρήση γαντιών και στολή εργασίας και τα γάντια, μετά τη
                χρήση τους, να απορρίπτονται.</li>
              <li>Η χρήση γαντιών μιας χρήσης δεν αντικαθιστά σε καμιά περίπτωση το πλύσιμο των χεριών.</li>
            </ul>
            Επισημαίνεται ότι οι παρούσες οδηγίες έχουν συνταχθεί με βάση τα διαθέσιμα επιδημιολογικά δεδομένα και
            ενδέχεται να τροποποιηθούν, καθώς εξελίσσεται η επιδημία.

          </div>

          <button class="accordion-custom">Οδηγίες για Ευπαθείς Ομάδες στο χώρο εργασίας</button>
          <div class="panel">
            Σύμφωνα με τα διαθέσιμα επιστημονικά δεδομένα για τη λοίμωξη από το νέο κορωνοϊό SARS-CoV-2, τα ηλικιωμένα άτομα καθώς και άτομα οποιασδήποτε ηλικίας με χρόνια υποκείμενα νοσήματα (π.χ. χρόνια αναπνευστικά νοσήματα, κακοήθειες κτλ), ανήκουν στις ομάδες υψηλού κινδύνου για εμφάνιση σοβαρής νόσου και επιπλοκών.
            <br><br>Κατά συνέπεια για αυτές τις ευπαθείς ομάδες του πληθυσμού κρίνεται ιδιαίτερα αναγκαία η συστηματική εφαρμογή όλων των μέτρων για την πρόληψη της μετάδοσης και διασποράς του νέου κορωνοϊού, με έμφαση στα ακόλουθα:
            <br>
            <ul>
              <li>Αποφυγή επαφής με άτομα με συμπτωματολογία λοίμωξης του αναπνευστικού συστήματος</li>
              <li>Αποφυγή όλων των μη απαραίτητων ταξιδιών, ιδιαίτερα σε περιοχές ή χώρες με επιβεβαιωμένη μετάδοση του ιού στην κοινότητα</li>
              <li>Εφαρμογή της υγιεινής των χεριών και αποφυγή επαφής των χεριών με το πρόσωπο (μάτια, μύτη, στόμα)</li>
              <li>Συμμόρφωση στη χρόνια φαρμακευτική αγωγή που ενδεχομένως λαμβάνουν και στις οδηγίες των θεραπόντων ιατρών</li>
              <li>Αποφυγή επισκέψεων σε νοσηλευόμενους ασθενείς</li>
              <li>Αποφυγή επισκέψεων σε χώρους υπηρεσιών υγείας χωρίς σοβαρό λόγο</li>
            </ul>
          </div>

          <button class="accordion-custom">Απαραίτητες Ενέργειες σε περίπτωση εκδήλωσης των συμπτωμάτων σε εργαζόμενο κατά τη διάρκεια εργασίας</button>
          <div class="panel">
            <br>
            ➤Εάν ένας εργαζόμενος εμφανίσει έστω και ήπια συμπτώματα συμβατά με λοίμωξη COVID-19 <b> εκτός του χώρου της οργανικής μονάδας</b>, παραμένει στο
            σπίτι και ειδοποιεί τον ορισμένο συντονιστή COVID-19 για τις περαιτέρω
            ενέργειες.<br><br>
            ➤Εάν ένας εργαζόμενος εμφανίσει συμπτώματα συμβατά με λοίμωξη COVID19 <b>εντός της οργανικής μονάδας</b> ακολουθούνται τα παρακάτω βήματα:
            <ul>
              <li>Ενημερώνει τον άμεσο προϊστάμενο του και τον συντονιστή διαχείρισης
                COVID-19, φοράει μάσκα, αποχωρεί από τον χώρο εργασίας και
                παραμένει στο σπίτι του για ανάρρωση ή καλείται το ΕΚΑΒ για τη
                μεταφορά του στον εγγύτερο υγειονομικό σχηματισμό.</li>
              <li>Ο συντονιστής διαχείρισης COVID-19 ενημερώνει τον ΕΟΔΥ για,
                επιδημιολογική διερεύνηση και ιχνηλάτηση όλων των πιθανών επαφών
                του κρούσματος (προσωπικού και επισκεπτών κλπ).</li>
              <li>Μετά την αποχώρηση του ύποπτου κρούσματος από τον οργανισμό,
                ακολουθείται επιμελής καθαρισμός, εφαρμογή απολυμαντικού σε
                επιφάνειες του χώρου όπου κινήθηκε ο εργαζόμενος με χρήση
                εξοπλισμού ατομικής προστασίας</li>
              <li>Ιατρική αξιολόγηση (από εφημερεύον Νοσοκομείο, Κέντρο Υγείας ή από
                ιδιώτη θεράποντα ιατρό) αν θα πρέπει να γίνει κατά προτεραιότητα
                μοριακό διαγνωστικό τεστ.</li>
              <li>Εν αναμονή του αποτελέσματος, ο εργαζόμενος παραμένει σε
                απομόνωση κατ’ οίκον (εφόσον η κατάστασή του δεν απαιτεί νοσηλεία),
                σε καλά αεριζόμενο δωμάτιο, σύμφωνα με τον ακόλουθο σύνδεσμο <a href="https://eody.gov.gr/neos-koronoios-covid-19-odigies-gia-frontidaypoptoy-kroysmatos-sto-spiti/"></a> ενώ η οργανική μονάδα συνεχίζει
                κανονικά τη λειτουργία της. </li>
            </ul>

            Ο συντονιστής διαχείρισης COVID-19 της οργανικής μονάδας σε συνεργασία με τον
            ΕΟΔΥ κάνει εκτίμηση κινδύνου και αποφασίζει τα επιδημιολογικά μέτρα πρόληψης
            της διασποράς, όπως:
            <ul>
              <li>Προσωρινή αναστολή εισόδου ατόμων στον στενό χώρο εργασίας του
                υπόπτου κρούσματος για ένα 24ωρο. Ακολουθεί πολύ καλός αερισμός και
                σχολαστικός καθαρισμός του χώρου και απολύμανση των επιφανειών του
                χώρου του εργαζομένου με τη χρήση κατάλληλων μέσων προστασίας και ο
                χώρος επαναχρησιμοποιείται κανονικά <a href="https://www.moh.gov.gr/articles/health/dieythynsh-dhmosiasygieinhs/metra-prolhpshs-enanti-koronoioy-sars-cov-2/7023-metrakatharismoy-kai-apolymanshs-se-xwroys-kai-epifaneies"></a> </li>
              <li>Επιμελής καθαρισμός των χώρων που κινήθηκε ο εργαζόμενος
                (ανελκυστήρες, σκάλες, διαδρόμους κλπ)</li>
            </ul>
            Γενικά η παραμονή του ύποπτου περιστατικού στο χώρο εργασίας θα πρέπει να
            είναι περιορισμένη, έτσι ώστε να αποφεύγονται η άσκοπη παραμονή του στο χώρο
            και οι πολλαπλές επαφές, που εγκυμονούν κινδύνους πιθανής διασποράς του ιού.
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>


    </div>



  </div>


  <!-- Footer -->
  <footer class="foot-container" style="margin-top: 22%;">
    <div class="foot-container">
      <div class="child1">
        <span style="font-size: 48px; color: #3b5998">
          <i class="fab fa-facebook-square"></i>
        </span>
        <span style="font-size: 48px; color: #00acee ">
          <i class="fab fa-twitter-square"></i>
        </span>
      </div>
      <div class="child2"> Όροι Χρήσης</div>
      <div class="child2">Χάρτης Πλοήγησης </div>
      <div class="child2">Ιδιωτικό Απόρρητο</div>
      <div class="child2">
        <p class="m-0 text-center text-black">Copyright &copy;2021</p>
      </div>
      <div class="child5">
        <span style="font-size: 48px; color: #0e1577; ">
          <i class="fas fa-universal-access"></i>
        </span>
      </div>

    </div>
    <!-- /.container -->
  </footer>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <script>
    $("#under-bar").hide();
    <?php
    if (isset($_SESSION['loged'])) { ?>
      $("#under-bar").show();
    <?php
    } else { ?>
      $("#under-bar").hide();
    <?php
    }
    ?>
    
    //acordeon script
    var acc = document.getElementsByClassName("accordion-custom");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
          // panel.style.heightStyle = "fill";
          // panel.style.collapsible = true

        }
      });
    }
  </script>
  <!-- <script>
  $(document).ready(function ($) {
    $('.servicesub').find('.servicesubitem').click(function () {

        if ($(this).next().is(':visible')) {
            //Collapse
            $(this).next().slideToggle('fast');
            $(this).removeClass('active');

            $("#footer").animate({marginTop: "0px"}, 'fast');
        } else {
            //Expand
            $(this).next().slideToggle('fast');
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            //hide other panels
            $(".servicesubli").not($(this).next()).slideUp('fast');

            $("#footer").animate({marginTop: "260px"}, 'fast');

        }

    });
    $('.servicesub').find('.servicesubitem .active'); {
        //Expand
        $(this).addClass('active');
    }
});

</script> -->

</body>

</html>