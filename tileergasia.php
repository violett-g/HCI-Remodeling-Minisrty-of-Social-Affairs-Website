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

    <title>Τηλε-εργασία</title>

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
        <a href="index.php" style="width:20%">
            <div class="logo">
                <img class="logo-img" src="img/logo2.png" width="50" height="50">
                <div class="logo-name">
                    Υπουργείο Εργασίας <br> και Κοινωνικών Υποθέσεων
                </div>
            </div>
        </a>
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
                        <button name="settings" class="logbutton"><a style="color:#0e1577" href="settings.php">
                            <i class="fa fa-user-cog" style="color:#0e1577"></i>Προφίλ</a>
                        </button>
                    <?php } else { ?>
                        <button class="logbutton" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-user"></i>Σύνδεση</button>
                    <?php } ?>
                    <!-- The Modal -->
                    <div id="id01" class="modal">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                        <!-- Modal Content -->
                        <form class="modal-content animate" action="tileergasia.php" method="post">
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
                            echo "<script> window.location.assign('tileergasia.php'); </script>";
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
                                    header('Location:tileergasia.php');
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
        <!-- <div style="margin-top: 5px; background-color:transparent">
            <ul class="breadcrumbs">
                <li class="breadcrumbTitle">
                    <a href="index.php" class="breadcrumbLink"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumbTitle">
                    <a href="covid.php" class="breadcrumbLink breadcrumbLinkActive">Covid-19</a>
                </li>
            </ul>
        </div> -->
    <div style="margin-top: 5px; background-color:transparent">
      <ul class="breadcrumbs">
          <li class="breadcrumbTitle">
            <a href="index.php" class="breadcrumbLink"><i class="fas fa-home"></i></a>
          </li> 
          <li class="breadcrumbTitle">
            <a href="#" class="breadcrumbLink">Εργαζόμενοι</a>
          </li>
          <li class="breadcrumbTitle">
            <a href="#" class="breadcrumbLink">Παροχές</a>
          </li>
          <li class="breadcrumbTitle">
            <a href="#" class="breadcrumbLink">Παροχές σε περίοδο πανδημίας</a>
          </li>
          <li class="breadcrumbTitle">
            <a href="#" class="breadcrumbLink breadcrumbLinkActive">Τηλεργασία</a>
          </li>
      </ul> 
    </div>

    </div>
    <!--undermainbar-->




    <!--________________________________Page conent_____________________________-->

    <div class="content">
        <!-- Page Wrapper -->
        <div class="bar-info">
            <!-- <div> -->

            <div class="sidenav" style="margin-bottom: 70px;">
                <a style=" font-size: 18px; font-weight: 1000;" href="tileergasia.php">Τηλεργασία</a>
                <a href="anastoli-simvasis.php">Αναστολή Σύμβασης</a>
                <a href="adeia-eidikou-skopou.php">Άδεια ειδικού σκοπού</a>
                <a href="#">Επιδόματα </a>
                <a href="#">Προγράμματα </a>
            </div>

            </ul>
            <!-- </div> -->

            <div class="info">

                <div class="container-fluid">

                    <div class="boxTitle">Τηλε-εργασία</div>
                    <div class="box">Ο εργοδότης υποχρεούται να τηρεί το ωράριο εργασίας και να σέβεται την ιδιωτική ζωή του τηλεργαζόμενου. Απαγορέυεται ρητά η χρήση της κάμερας (web cam για τον έλεγχο του τηλεργαζομένου. Αν τεθεί σε λειτουργία οιοδήποτε σύστημα ελέγχου, αυτό πρέπει να σέβεται τη νομοθεσία περί δεδομένων προσωπικού χαρακτήρα, να επιβάλλεται από τις λειτουργικές ανάγκες της επιχείρησης και να περιορίζεται στο πλαίσιο του επιδιωκόμενου σκοπού.

                        Στην περίπτωση δε που ο εργοδότης δεν προμηθεύσει τον εξοπλισμό στον τηλεργαζόμενο ή δεν καλύψει το κόστος χρήσης αυτού και σε κάθε περίπτωση το κόστος συντήρησης και αποκατάστασης των βλαβών, είναι ανίσχυρη η συμφωνία περί τηλεργασίας και η εργασία παρέχεται στις εγκαταστάσεις του εργοδότη.

                        <ol>
                            <li>Τηλεργασία είναι η συστηματική εξ αποστάσεως παροχή της εξαρτημένης εργασίας του εργαζομένου και με τη χρήση της τεχνολογίας, δυνάμει της σύμβασης εργασίας πλήρους, μερικής, εκ περιτροπής ή άλλης μορφής απασχόλησης, η οποία θα μπορούσε να παρασχεθεί και από τις εγκαταστάσεις του εργοδότη.Τηλεργαζόμενος είναι το φυσικό πρόσωπο που παρέχει τηλεργασία
                            </li>
                            <li>Η τηλεργασία συμφωνείται μεταξύ εργοδότη και εργαζομένου κατά την πρόσληψη ή με μεταγενέστερη συμφωνία. Κατ’ εξαίρεση σε όλες τις επιχειρήσεις, για λόγους δημόσιας υγείας ή σε περίπτωση κινδύνου υγείας του ίδιου του εργαζόμενου , ο εργοδότης οφείλει να αποδεχθεί την πρόταση του εργαζομένου, που απασχολεί ήδη στις εγκαταστάσεις του, για τηλεργασία, εκτός κι αν αδυνατεί να το πράξει για σπουδαίο και σοβαρό κατ’ αντικειμενική κρίση λόγο, τον οποίο οφείλει να εκθέσει εγγράφως προς τον εργαζόμενο.
                            </li>
                            Σε περίπτωση κινδύνου δημόσιας υγείας, ο εργαζόμενος οφείλει να αποδεχθεί την πρόταση του εργοδότη για τηλεργασία, εκτός κι αν αδυνατεί να το πράξει για σπουδαίο και σοβαρό κατ’ αντικειμενική κρίση λόγο, τον οποίο οφείλει να εκθέσει εγγράφως προς τον εργοδότη.

                            <li>Εντός οκτώ (8) ημερών από την έναρξη της τηλεργασίας, ο εργοδότης υποχρεούται να γνωστοποιήσει, εγγράφως, με οποιοδήποτε πρόσφορο τρόπο, ακόμη και με προώθηση μέσω ηλεκτρονικού ταχυδρομείου, προς τον εργαζόμενο το σύνολο των πληροφοριών που αναφέρονται στην εκτέλεση της εργασίας, συμπεριλαμβανομένων όλων των στοιχείων του Π.Δ. 156/1994 (Α 102), καθώς και τουλάχιστον των εξής:

                                <ul>

                                    <li>Τα λεπτομερή καθήκοντα του τηλεργαζομένου.</li>
                                    <li>Το ωράριο εργασίας του εργαζομένου. </li>
                                    <li>Τον τρόπο υπολογισμού και την ανάλυση του πρόσθετου κόστους με το οποίο επιβαρύνεται περιοδικώς ο τηλεργαζόμενος από την τηλεργασία, ιδίως το κόστος τηλεπικοινωνιών, τον εξοπλισμό και τη συντήρησή του.</li>
                                    <li>Το συνολικό αυτό πρόσθετο κόστος, το οποίο μπορεί να συμφωνηθεί σε σταθερό ποσό που να υπερκαλύπτει το πραγματικό, καλύπτει ο εργοδότης σε μηνιαία βάση, δεν αποτελεί αποδοχές αλλά κάλυψη λειτουργικών δαπανών, δεν υπόκειται σε φόρο ή ασφαλιστικές εισφορές και σε περίπτωση μη εμπρόθεσμης καταβολής του, ισχύουν αναλογικώς τα προβλεπόμενα στο άρθρο μόνο του Α.Ν. 690/45, όπως ισχύει, και στο τρίτο εδάφιο της παραγράφου 7 του Ν. 2112/1920 (Α 67), όπως τροποποιήθηκε από το άρθρο 58 του Ν. 4635/2019 (Α 167) και ισχύει.</li>
                                    <li>Τον αναγκαίο για την παροχή τηλεργασίας εξοπλισμό, τον οποίο διαθέτει ο τηλεργαζόμενος ή του παρέχει ο εργοδότης, και τις διαδικασίες τεχνικής υποστήριξης, συντήρησης και αποκατάστασης των βλαβών του εξοπλισμού αυτού, το κόστος των οποίων καλύπτει ο εργοδότης. Αν ο εξοπλισμός ανήκει στον εργαζόμενο, στη σύμβαση προσδιορίζεται και ο τρόπος αποκατάστασης του κόστους χρήσης του για την τηλεργασία. Αν ο εργοδότης δεν προμηθεύσει τον εξοπλισμό αυτό στον τηλεργαζόμενο ή δεν καλύψει το κόστος χρήσης αυτού και σε κάθε περίπτωση το κόστος συντήρησης και αποκατάστασης των βλαβών, είναι ανίσχυρη η συμφωνία περί τηλεργασίας και η εργασία παρέχεται στις εγκαταστάσεις του εργοδότη.</li>
                                    <li>Οποιουσδήποτε περιορισμούς στη χρήση του εξοπλισμού ή εργαλείων πληροφορικής, όπως το διαδίκτυο, και τις κυρώσεις σε περίπτωση παραβίασής των.</li>
                                    <li>Την ιεραρχική σύνδεση του τηλεργαζομένου με τους προϊσταμένους του στην επιχείρηση, τις διαδικασίες αναφοράς και αξιολόγησης του τηλεργαζομένου.</li>
                                    <li>Τυχόν συμφωνία περί τηλε-ετοιμότητας, τα χρονικά όρια αυτής και τις προθεσμίες ανταπόκρισης του ΣΕΠΕργαζομένου.</li>
                                    <li>Τους όρους υγιεινής και ασφάλειας της τηλεργασίας και τις διαδικασίες αναγγελίας εργατικού ατυχήματος, που ο τηλεργαζόμενος οφείλει σε κάθε περίπτωση να τηρεί, σύμφωνα με την παράγραφο 7 αυτού του άρθρου.</li>
                                    <li>Την προστασία των επαγγελματικών δεδομένων, καθώς και των προσωπικών δεδομένων του τηλεργαζομένου, και κάθε σχετική διαδικασία</li>
                                    <li>τα στοιχεία επικοινωνίας των συνδικαλιστικών εκπροσώπων των εργαζομένων στην επιχείρηση ή εκμετάλλευση.</li>
                                </ul>
                                Όσα από τα παραπάνω στοιχεία δεν αφορούν προσωπικώς στον εργαζόμενο μπορούν να του γνωστοποιηθούν και μέσω κοινοποίησης σχετικής επιχειρησιακής πολιτικής, εφαρμοστέας στο σύνολο των τηλεργαζομένων της επιχείρησης ή εκμετάλλευσης

                            <li>Η συμφωνία περί τηλεργασίας δεν θίγει το καθεστώς απασχόλησης και εν γένει τη σύμβαση εργασίας του τηλεργαζομένου ως πλήρους, μερικής, εκ περιτροπής ή άλλης μορφής απασχόλησης, αλλά μεταβάλλει μόνο τον τρόπο με τον οποίο εκτελείται η εργασία. Η τηλεργασία μπορεί να παρέχεται κατά πλήρη, μερική ή εκ περιτροπής απασχόληση, αυτοτελώς ή σε συνδυασμό με απασχόληση στις εγκαταστάσεις του εργοδότη.
                            </li>
                            <li>Με την επιφύλαξη των διαφοροποιήσεων που οφείλονται στη φύση της τηλεργασίας, οι τηλεργαζόμενοι έχουν τα ίδια δικαιώματα και υποχρεώσεις με τους συγκρίσιμους εργαζομένους εντός των εγκαταστάσεων της επιχείρησης ή εκμετάλλευσης, ιδίως σχετικώς με τον όγκο εργασίας, τα κριτήρια και τις διαδικασίες αξιολόγησης, τις τυχόν επιβραβεύσεις, την πρόσβαση σε πληροφορίες που αφορούν στην επιχείρηση, την κατάρτιση και επαγγελματική τους εξέλιξη, τη συμμετοχή σε σωματεία, τη συνδικαλιστική τους δράση και την απρόσκοπτη και εμπιστευτική επικοινωνία τους με τους συνδικαλιστικούς τους εκπροσώπους.
                            </li>
                            <li>Ο εργοδότης υποχρεούται να τηρεί το ωράριο εργασίας και να σέβεται την ιδιωτική ζωή του τηλεργαζόμενου. Απαγορέυεται ρητά η χρήση της κάμερας (web cam για τον έλεγχο του τηλεργαζομένου. Αν τεθεί σε λειτουργία οιοδήποτε σύστημα ελέγχου, αυτό πρέπει να σέβεται τη νομοθεσία περί δεδομένων προσωπικού χαρακτήρα, να επιβάλλεται από τις λειτουργικές ανάγκες της επιχείρησης και να περιορίζεται στο πλαίσιο του επιδιωκόμενου σκοπού
                            </li>
                            <li>Ο εργοδότης είναι υπεύθυνος για την προστασία της υγείας και της επαγγελματικής ασφάλειας του τηλεργαζομένου, σύμφωνα τις ισχύουσες διατάξεις. Ο εργοδότης πληροφορεί τον τηλεργαζόμενο για την πολιτική της επιχείρησης όσον αφορά την υγεία και την ασφάλεια στην εργασία, η οποία περιλαμβάνει ιδίως τις προδιαγραφές του χώρου τηλεργασίας, κανόνες χρήσης οθονών οπτικής απεικόνισης, διαλείμματα και κάθε άλλο αναγκαίο στοιχείο. Ο τηλεργαζόμενος υποχρεούται να εφαρμόζει τις ισχύουσες διατάξεις για την υγιεινή και ασφάλεια στην εργασία. Η παροχή τηλεργασίας από τον τηλεργαζόμενο τεκμαίρει ότι ο χώρος τηλεργασίας πληροί τις παραπάνω προδιαγραφές.
                            </li>
                            <li>Οι εκπρόσωποι των εργαζόμενων πληροφορούνται και γνωμοδοτούν για την εισαγωγή της τηλεργασίας (μετατροπή εργασίας σε τηλεργασία, δικαίωμα στην αποσύνδεση κ.α) όπως προβλέπουν οι διατάξεις περί σωματείων και συνδικαλιστικών οργανώσεων του Ν.1264/1982 και συμβουλίων εργαζομένων του Ν. 1767/1988 όπως εκάστοτε ισχύουν.
                            </li>
                            <li>Το ωράριο τηλεργασίας, καθώς και η αναλογία τηλεργασίας και εργασίας στις εγκαταστάσεις του εργοδότη, δηλώνονται στο Π.Σ. ΕΡΓΑΝΗ.
                            </li>
                            <li>Με απόφαση του Υπουργού Εργασίας και Κοινωνικών Υποθέσεων είναι δυνατό να καθορίζεται ο τρόπος υπολογισμού του πρόσθετου κόστους με το οποίο επιβαρύνεται περιοδικώς ο τηλεργαζόμενος από την τηλεργασία και το οποίο καλύπτει ο εργοδότης, οι ειδικότεροι κανόνες υγιεινής και ασφάλειας της τηλεργασίας, η δήλωση του ωραρίου τηλεργασίας στο Π.Σ. ΕΡΓΑΝΗ, η διαδικασία ελέγχου του Σ.ΕΠ.Ε. και κάθε άλλη λεπτομέρεια.</li>
                    </div>

                </div> <!-- /.container-fluid-->
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="foot-container" style="margin-top: 8%;" >
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
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }

        //for under-bar
        $("#under-bar").hide();
        <?php
        if(isset($_SESSION['loged'])){?>
        $("#under-bar").show();
        <?php
        }
        else{?>
        $("#under-bar").hide();
        <?php
        }
        ?>

        $('.banner-dismiss').click(function() {
        $('.covid-banner').css('display', 'none');
        localStorage.bannerClosed = 'true';
        });
            
    </script>

</body>

</html>