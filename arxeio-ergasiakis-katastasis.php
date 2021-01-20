<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Παροχές σε Περίοδο Πανδημίας</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<!-- _______________________________________Header_____________________________________________________ -->
<header class="bg-primary py-2 mb-5">
    <!-- COVID-19 -->
    <div id="covban" class="covid-alert" bg-danger>
        <a href="#">Covid-19: Πληροφορίες και υπηρεσίες</a>
        <button type="button" onclick="document.getElementById('covban').style.display='none'" class="close-bar-btn">Ακύρωση</button>
    </div>
    <!--Navigation bar-->
    <div class="topnav">
        <img class="logo-img" src="img/logo2.png" width="50" height="50">
        <div class="logo-name">
            <p>Υπουργείο Εργασίας και Κοινωνικών Υποθέσεων </p>
        </div>
        <!--Search box-->
        <form class="searchbox">
            <!-- Page action="search.php" method="post" -->
            <input type="text" placeholder=" " autocomplete="off">
            <input type="submit" value="Αναζήτηση">
        </form>
        <!--LOGIN-->
        <div class="login">
            <!-- Button to open the modal login form -->
            <button class="logbutton" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-user"></i>Login</button>

            <!-- The Modal -->
            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                <!-- Modal Content -->
                <form class="modal-content animate" action="/action_page.php">
                    <!-- <div class="imgcontainer">
              <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div> -->

                    <div class="container">
                        <!-- <label for="uname"><b>Όνομα Χρήστη</b></label> -->
                        <input type="text" placeholder="Όνομα Χρήστη " name="uname" required>

                        <!-- <label for="psw"><b>Κωδικός Πρόσβασης</b></label> -->
                        <input type="password" placeholder="Κωδικός Πρόσβασης " name="psw" required>

                        <button type="submit">Είσοδος</button>
                        <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
              </label>
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Ακύρωση</button>
                        <span class="psw">Ξεχάσατε τον <a href="#">κωδικό</a> σας?</span>
                        <div class="text-right">
                            <a class="small" href="secondary/register.php">Δημιουργία λογαριασμού!</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--LANGUAGE-->
        <!--MENOU-->
        <div class="main-menou">
            <ul>
                <li><a href="default.asp">Home</a></li>
                <li><a href="news.asp">Εργαζόμενοι</a></li>
                <li><a href="contact.asp">Εργοδότες/Επιχειρήσεις</a></li>
                <li><a href="about.asp">Εργασία & Ασφάλιση</a></li>
                <li><a href="about.asp">Πρόνοια</a></li>
                <li><a href="about.asp">Επικοινωνία</a></li>
                <li><a href="about.asp">COVID-19</a></li>
            </ul>
        </div>

    </div>
</header>

<body id='arxeio-ergasiakis-katastasis'>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">breadcrumb here?</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Τηλεργασία -->
            <li class="nav-item">
                <a class="tileergasia" href="tileergasia.php">
                    <span>Τηλεργασία</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Αναστολή σύμβασης -->
            <li class="nav-item">
                <a class="anastoli-simvasis" href="anastoli-simvasis.php">
                    <span>Αναστολή σύμβασης</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Άδεια ειδικού Σκοπού -->
            <li class="nav-item">
                <a class="adeia-eidikou-skopou" href="adeia-eidikou-skopou.php">
                    <span>Άδεια ειδικού Σκοπού</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Αρχείο Εργασιακής Κατάστασης -->
            <li class="nav-item">
                <a class="arxeio-ergasiakis-katastasis" href="arxeio-ergasiakis-katastasis.php">
                    <span>Αρχείο Εργασιακής Κατάστασης</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..., na to pame kapou?" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">USERNAME, na to pame panw?</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->

                    <div class="boxTitle">Αρχείο Εργασιακής Κατάστασης</div>
                    <div class="box">ΘΑ ΑΝΤΙΚΑΤΑΣΤΑΘΕΙ ΜΕ ΠΛΗΡΟΦΟΡΙΕΣ ΑΡΧΕΙΟΥ ΕΡΓΑΣΙΑΚΗΣ ΚΑΤΑΣΤΑΣΗΣ. Θεσπίζεται άδεια ειδικού σκοπού για εργαζόμενους γονείς παιδιών που: Είναι εγγεγραμμένα σε βρεφικούς, βρεφονηπιακούς και παιδικούς σταθμούς ή Φοιτούν σε σχολικές μονάδες
                        υποχρεωτικής εκπαίδευσης ή Φοιτούν σε ειδικά σχολεία ή σχολικές μονάδες ειδικής αγωγής και εκπαίδευσης ανεξαρτήτως ορίου ηλικίας. Την άδεια ειδικού σκοπού δικαιούνται και οι εργαζόμενοι γονείς ατόμων με αναπηρία, τα οποία, ανεξαρτήτως
                        της ηλικίας τους, είναι ωφελούμενοι σε δομές παροχής υπηρεσιών ανοικτής φροντίδας για άτομα με αναπηρία. Συγκεκριμένα, θεσμοθετείται το δικαίωμα των εργαζόμενων γονέων προς διευκόλυνσή τους και λόγω της ήδη επιβληθείσας αναστολής
                        λειτουργίας των ανωτέρω μονάδων εκπαίδευσης, και για όσο διάστημα παραμείνουν κλειστές οι μονάδες αυτές, να λαμβάνουν άδεια ειδικού σκοπού διάρκειας κατ’ ελάχιστον τριών (3) ημερών. Ως προϋπόθεση ορίζεται ότι ο εργαζόμενος θα κάνει
                        χρήση μίας (1) ημέρας από την ετήσια κανονική του άδεια για κάθε τρεις (3) ημέρες άδειας ειδικού σκοπού. Την άδεια αυτή τη δικαιούται ο γονέας που απασχολείται στον ιδιωτικό τομέα, ακόμη και εάν ο άλλος γονέας είναι ελεύθερος επαγγελματίας,
                        και μπορεί να χορηγηθεί και μέχρι τις 10/4/2020. Αν και οι δύο (2) γονείς είναι μισθωτοί (στον ίδιο ή σε διαφορετικούς εργοδότες), θα πρέπει να υποβάλουν κοινή υπεύθυνη δήλωση (προς τον εργοδότη ή τους εργοδότες τους) με την οποία
                        θα γνωστοποιούν ποιος από τους δύο θα κάνει χρήση της άδειας ειδικού σκοπού ή θα ορίζουν τα αντίστοιχα χρονικά διαστήματα χρήσης της από καθέναν από αυτούς (αν αποφασίσουν να μοιραστούν τις ημέρες άδειας ειδικού σκοπού). Εάν ο
                        ένας γονέας απασχολείται στον ιδιωτικό τομέα και ο άλλος στο Δημόσιο και προκειμένου ο μισθωτός του ιδιωτικού τομέα να μπορεί να κάνει χρήση της άδειας αυτής, θα πρέπει να υποβληθεί στον εργοδότη υπεύθυνη δήλωση του εργαζόμενου
                        στο Δημόσιο γονέα ότι δεν έχει ασκήσει το δικαίωμα λήψης άδειας ειδικού σκοπού. Εάν εργάζεται μόνο ο ένας από τους δύο γονείς, τότε ο εργαζόμενος γονέας δεν έχει τη δυνατότητα να κάνει χρήση της άδειας ειδικού σκοπού. Στις περιπτώσεις
                        που ο μη εργαζόμενος γονέας νοσηλεύεται ή νοσεί από τον κορωνοϊό ή είναι άτομο με αναπηρία (ΑμεΑ) και λαμβάνει επίδομα από τον Οργανισμό Προνοιακών Επιδομάτων και Κοινωνικής Αλληλεγγύης (ΟΠΕΚΑ), ο εργαζόμενος γονέας δικαιούται
                        να κάνει χρήση της άδειας ειδικού σκοπού. Εάν πρόκειται για διαζευγμένους ή σε διάσταση γονείς, τότε η άδεια ειδικού σκοπού χορηγείται στον γονέα που έχει την επιμέλεια του παιδιού ή τη γονική μέριμνα, εκτός και αν τα ανωτέρω δικαιώματα
                        ασκούνται και από τους δύο γονείς, οπότε μπορούν να κάνουν χρήση και οι δύο με κοινή τους υπεύθυνη δήλωση (είτε ο ένας αποκλειστικά είτε να μοιραστούν την ειδική άδεια σε διαστήματα τα οποία κοινοποιούν στον εργοδότη τους με υπεύθυνες
                        δηλώσεις που του υποβάλλουν). Σε περίπτωση γέννησης παιδιού εκτός γάμου ή εκτός συμφώνου συμβίωσης (το οποίο εξομοιώνεται πλήρως με τον γάμο) ή σε περίπτωση θανάτου του άλλου γονέα, τότε η ειδική άδεια χορηγείται άνευ άλλης προϋπόθεσης
                        στον μονογονέα. Εφόσον και οι δύο γονείς εργάζονται αλλά ο ένας εξ αυτών βρίσκεται σε άλλη νόμιμη άδεια, τότε ο πρώτος δεν δικαιούται να κάνει χρήση της άδειας ειδικού σκοπού για όσο διάστημα διαρκεί η άδεια του δεύτερου. THIS
                        TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTINGTHIS TEXT IS FOR TESTING THIS TEXT
                        IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTINGTHIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS
                        FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTINGTHIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR
                        TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTINGTHIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING
                        THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTINGTHIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS
                        TEXT IS FOR TESTING THIS TEXT IS FOR TESTINGTHIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT
                        IS FOR TESTINGTHIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTINGTHIS TEXT IS FOR
                        TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTINGTHIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING
                        THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTINGTHIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS
                        TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTINGTHIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT
                        IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTINGTHIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS
                        FOR TESTING THIS TEXT IS FOR TESTING THIS TEXT IS FOR TESTING
                    </div>
                    <a href="login.php" class="btn btn-primary btn-lg float-right">
                    Υποβολή Αίτησης - παει οπου ναναι
                    </a>

                </div>
                <!-- /.container-fluid -->


                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

</body>

</html>