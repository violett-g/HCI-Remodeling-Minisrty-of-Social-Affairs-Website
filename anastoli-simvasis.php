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

    <title>Αναστολή Σύμβασης</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>
<body>
 <!-- _______________________________________Header_____________________________________________________ -->
   <!-- COVID-19 -->
   <div id="covban" class="covid-alert" bg-danger >
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
                <form class="searchbox"> <!-- Page action="search.php" method="post" --> 
                <div class=wrap>
                <input type="text" placeholder=" " autocomplete="off">
                <button class="searchsub" type="submit" value = "Αναζήτηση"><i class="fas fa-search" style="font-size: 20px;"></i></button>
                </div>
                </form>
                <!--LOGIN-->
                <div class="login"> 
                <!-- Button to open the modal login form -->
                <?php if(isset($_SESSION['loged'])){ ?>
                    <button name="logout" class="logbutton"><a href="logout.php"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>Αποσύνδεση<a></button>
                    <button name="settings" class="logbutton"><a style="color:#0e1577" href="settings.php">
                      <i class="fa fa-user-cog" style="color:#0e1577"></i>Προφίλ</a>
                    </button>
                <?php }else{ ?>
                    <button class="logbutton" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-user"></i>Σύνδεση</button>
                <?php } ?>
                <!-- The Modal -->
                <div id="id01" class="modal">
                    <span onclick="document.getElementById('id01').style.display='none'"
                    class="close" title="Close Modal">&times;</span>
            
                    <!-- Modal Content -->
                    <form class="modal-content animate" action = "anastoli-simvasis.php" method="post">
                    <div class="container">
                        <input name="username" type="text" placeholder="Όνομα Χρήστη " name="uname" required>
                        <input name="password" type="password" placeholder="Κωδικός Πρόσβασης " name="psw" required>
            
                        <button name="submit_btn" type="submit" style="border-radius: 10rem; height:40px; width:50%; margin-bottom:20px" >Είσοδος</button>
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
                    function phpAlert($msg) {
                        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
                    }
                    function phpConfAlert() {
                        echo "<script> window.location.assign('anastoli-simvasis.php'); </script>";
                    }
                    if(isset($_POST['submit_btn'])){
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $query = "select * from user WHERE username = '$username' AND password='$password'";
                        $query_run = $con->query($query);
                        if($query_run->num_rows>0){
                            $row = mysqli_fetch_row($query_run);
                            if(!isset($_SESSION['loged'])){
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
                            header('Location:anastoli-simvasis.php');
                            }
                            phpConfAlert();
                        }
                        else{
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
        
        </div><!--topnav-->
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
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">Οι ειδοποιήσεις σας</h6>
                <a class="dropdown-item text-center small text-gray-500" href="#">Δεν έχετε καμία ειδοποίηση</a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                Τα μηνύματά σας
                </h6>
                <a class="dropdown-item text-center small text-gray-500" href="#">Δεν έχετε κανένα μήνυμα</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    </div>   -->
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
            <a href="#" class="breadcrumbLink breadcrumbLinkActive">Αναστολή σύμβασης</a>
          </li>
      </ul> 
    </div>

  </div> <!--undermainbar-->

<!--________________________________Page conent_____________________________-->

    <div class="content"> <!-- Page Wrapper -->
        <div class="bar-info" style="margin-bottom: 10px;">
            <!-- <div> -->
            
            <div class="sidenav">
                <a href="tileergasia.php">Τηλεργασία</a>
                <a  style=" font-size: 18px; font-weight: 1000;"  href="anastoli-simvasis.php">Αναστολή Σύμβασης</a>
                <a href="adeia-eidikou-skopou.php">Άδεια ειδικού σκοπού</a>
                <a href="#">Επιδόματα </a>
                <a href="#">Προγράμματα </a>

            </div>
                
            </ul>
            <!-- </div> -->

            <div class="info">
       
                <div class="container-fluid">                    

                    <div class="boxTitle">Αναστολή Σύμβασης</div>
                    <div class="box">Αναστολή σύμβασης εργασίας υπάρχει όταν ο εργαζόμενος δεν παρέχει για ορισμένο ή αό­ριστο χρονικό διάστημα την συμφωνημένη ερ­γασία του, με ή χωρίς υπαιτιό­τητά του, ενώ η σύμβαση εξακολουθεί να ισχύ­ει και να δεσμεύει τα μέρη. Με άλλα λόγια κατά το χρόνο αναστολής της σύμβασης εργασίας <b>αναστέλ­λεται η υποχρέωση του εργαζομένου να πα­ρέχει την εργασία του, ενώ η υποχρέωση του εργοδότη να καταβάλλει ή όχι τον μισθό εξαρτάται από το είδος της αναστολής.</b> Κατά τα λοιπά όλοι οι όροι και δεσμεύσεις που έχουν αναλάβει τα μέρη κατά την κατάρτιση της σύμβασης εξακολουθούν να υπάρχουν και να δεσμεύουν τους συμβαλλόμε­νους.
                        <br><br>Η αναστολή της σύμβασης εργασίας στην πράξη λαμβάνει χώρα κατά κύριο λόγο με πρωτοβουλία του μισθωτού (εκούσια ή ακούσια), ενώ ο εργοδότης μόνο κατ’ εξαίρεση και μόνο για γεγονότα που αποτελούν ανωτέρα βία μπορεί να επικαλε­σθεί με δική του πρωτοβουλία αναστολή της σύμβασης και πάλι όχι χω­ρίς συνέπειες γι’ αυτόν, όπως στην περίπτωση της διαθεσιμότητας (Άρ­θρο 10 Ν. 3198/1955, όπως τροποποιήθηκε με το άρθρο 4 του Ν. 3846/ 2010).

                        <br><br> <b>Οι κυριότερες περιπτώσεις αναστολής της σύμβασης είναι οι ακόλουθες:</b>
                        <ul>
                            <li>Κάθε ανυπαίτια αποχή του εργαζομέ­νου από την εργασία του, όπως η ασθένεια, η κύηση, ο τοκετός και η λοχεία (άρθρο 657 ΑΚ).</li>
                            <li>Η κανονική άδεια των εργα­ζομένων: ο χρόνος αποχής των εργαζομένων σε άδεια ανα­στέλλει την υποχρέωσή τους για παροχή εργασίας.</li>
                            <li>Στράτευση των εργαζομένων</li>
                            <li>Στο άρθρο 325 Α.Κ. στο οποίο προβλέπεται το δικαίωμα των μερών να μην εκπληρώσουν τις εκ της σύμβασης υποχρεώσεις τους μέχρις ότου και το άλλο μέρος εκπληρώσει τις δικές του (Δικαίωμα επίσχεσης).</li>
                            <li>Άδεια άνευ αποδοχών: πρόκειται για τη συνηθέστερη περίπτωση συμβατικής ανα­στολής. </li>
                        </ul>
                    </div>

                </div> <!-- /.container-fluid-->
            </div>


        </div> <!--bar-info-->
        <!-- <div style="padding: 30px 90px">
        <button style=" width: 30%; float:right; margin-left: auto; margin-right:auto; margin-top:30px" 
            name="submit_btn" type="submit" class="btn btn-primary btn-user btn-block">
            Υποβολή Αίτησης<a href="login.php"></a></button>
        <a href="login.php" class="btn btn-primary btn-lg float-right">
                Υποβολή Αίτησης - να το βγαλουμε;
            </a> 
        </div> -->


    </div>

     <!-- Footer -->
  <footer class="foot-container" style="margin-top: 8%;">
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
      <div class="child2"> <p class="m-0 text-center text-black">Copyright &copy;2021</p></div>
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

