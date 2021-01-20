<?php
  session_start();
  require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Contact</title>

  <!-- Bootstrap core CSS -->
  <!-- <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet"> -->

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!--Icons for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Icons for this template
  <link href="vendor/bootstrap/css/all.min.css" rel="stylesheet"> -->

</head>

<body>

 <!-- _______________________________________Header_____________________________________________________ -->
   <!-- COVID-19 -->
   <div id="covban" class="covid-alert" bg-danger >
      <a href="covid.php">Covid-19: Πληροφορίες και υπηρεσίες</a>
      <button type="button" onclick="document.getElementById('covban').style.display='none'" class="close-bar-btn">Κλείσιμο</button>
    </div>
  <header class="bg-primary py-2 ">
  
    <!-- COVID-19
    <div id="covban" class="covid-alert" bg-danger >
      <a href="#">Covid-19: Πληροφορίες και υπηρεσίες</a>
      <button type="button" onclick="document.getElementById('covban').style.display='none'" class="close-bar-btn">Ακύρωση</button>
    </div> -->
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
                <button name="settings" class="logbutton"><a href="settings.php">
                <span style="color:#0e1577" >
                    <i class="fa fa-user-cog"></i><a>
                    </span>
                </button>
            <?php }else{ ?>
                <button class="logbutton" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-user"></i>Σύνδεση</button>
            <?php } ?>
            <!-- The Modal -->
            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'"
                class="close" title="Close Modal">&times;</span>
        
                <!-- Modal Content -->
                <form class="modal-content animate" action = "contact.php" method="post">
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
                    echo "<script> window.location.assign('contact.php'); </script>";
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
                        header('Location:contact.php');
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

    <!--breadcrum-->
    <div style="margin-top: 5px">
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
  


  <!-- ________________________________________Page Content_______________________________________________________________ -->
   <div class="content">


    <div class="innerContent">

      
      <div class="redInfo bg-danger ">
        <h2>1135</h2>
        <p>H τηλεφωνική γραμμή του Εθνικού Οργανισμού Δημόσιας Υγείας (ΕΟΔΥ), παρέχει πληροφορίες σχετικά με τον κορωνοϊό 24 ώρες το 24ωρο.</p>
      </div>
      <div class="covidInfo">
        <div covidInfo-template>
          <div class="covidInfo-title">  Εργοδότες/Επιχειρήσεις  </div>        
          <ul style="padding:10px;">
            <li><a class="covidInfo-link" href="#">Δήλωση εργοδοτών για <br>την αντιμετώπιση του COVID-19</a></li>
            <br>
            <li><a class="covidInfo-link" href="#">Oικονομική ενίσχυση επιχειρήσεων</a></li>
            <br>
            <li><a class="covidInfo-link" href="#">Οδηγίες και μέτρα πρόληψης για τον εργοδότη</a></li>
            <br>
            <li><a class="covidInfo-link" href="#">Μείωση μισθωμάτων λόγω COVID-19</a></li>
            <br>
            <li><a class="covidInfo-link" href="#">Κρατική ενίσχυση επιχειρήσεων με τη μορφή<br> επιστρεπτέας προκαταβολής</a></li>
          </ul>
        </div>
        <div covidInfo-template>
          <div class="covidInfo-title">  Εργαζόμενοι  </div>        
          <ul class="info-list">
            <li><a class="covidInfo-link" href="#">Δήλωση εργαζομένων για <br>την αντιμετώπιση του COVID-19</a></li>
            <br>
            <li><a class="covidInfo-link" href="tileergasia.php">Εργασία σε περίοδο πανδημίας<br>(Τηλε-εργασία,Αναστολή Σύμβασης)</a></li>
            <br>
            <li><a class="covidInfo-link" href="odigies-pros-ergazomenous.php">Οδηγίες και μέτρα πρόληψης για τους <br> εργαζόμενους (εντός και έκτος χώρου εργασίας) </a></li>
            <br>
            <li><a class="covidInfo-link" href="#">Μετακίνηση εργαζόμενων σε περιόδους Lockdown</a></li>
            <br>
            <li><a class="covidInfo-link" href="adeia-eidikou-skopou.php">Άδεια ειδικού σκοπού</a></li>

          </ul>
        </div>

        <div covidInfo-template>
          <div class="covidInfo-title">  Άνεργοι  </div>        
          <ul>
            <li><a class="covidInfo-link" href="#">Oικονομική ενίσχυση για τους εποχικά ανέργους</a></li>
            <br>
            <li><a class="covidInfo-link" href="#">Προγράμματα ανέργων εξ αποστάσεως</a></li>
            <br>
            <li><a class="covidInfo-link" href="#">Προγράμματα απασχόλησης ανέργων</a></li>
            <br>
            <li><a class="covidInfo-link" href="#">Παράταση του χρόνου ανεργίας λόγω COVID-19</a></li>
            <br>
            <li><a class="covidInfo-link" href="#">Καταβολή επιδόματος μακροχρόνια ανέργων</a></li>


          </ul>
        </div>
        <div covidInfo-template>
          <div class="covidInfo-title">  Πρόνοια  </div>        
          <ul>
            <li><a class="covidInfo-link" href="#">Δωρεάν φαρμακευτική περίθαλψη ανασφάλιστων</a></li>
            <br>
            <li><a class="covidInfo-link" href="#">Δωρεάν τεστ για την διασπορα του COVID-19</a></li>
            <br>
            <li><a class="covidInfo-link" href="#">Εθνικό σχέδιο εμβολιαστικής κάλυψης για COVID-19</a></li>
            <br>
            <li><a class="covidInfo-link" href="#">Χρήση μάσκας και αποστάσεων για την αποφυγή<br> της διασποράς του COVID-19</a></li>
            <br>
            <li><a class="covidInfo-link" href="#">Κατ΄οίκον ή εξ αποστάσεως παροχή ιατρικών <br>υπηρεσιών προς ασθενείς COVID-19</a></li>

          </ul>
        </div>

        <div covidInfo-template>
          <div class="covidInfo-title">  Ελεύθεροι Επαγγελματίες  </div>        
          <ul>
            <li><a class="covidInfo-link" href="#">Μείωση στις ασφαλιστικές εισφορές<br> ελευθέρων επαγγελματιών-αυτοαπασχολούμενων</a></li>
            <br>
            <br>
            <li><a class="covidInfo-link" href="#">Έκτακτη εισοδηματική ενίσχυση<br> για ελεύθερους επαγγελματίες</a></li>
            <br>
            <li><a class="covidInfo-link" href="#">Μετακίνηση ελεύθερων επαγγελματιών σε περιόδους Lockdown </a></li>
          </ul>
        </div>
        
      </div>

    </div> <!--innerContent-->






  </div> <!--container-->
  <!-- Footer -->
  <footer class="">
    <div class="foot-container" style="margin-top:4%">
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

  
  
  
  
  
  <!--________________________________VIOLETTA(JavaScript)_________________________*/
       login form -->
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
