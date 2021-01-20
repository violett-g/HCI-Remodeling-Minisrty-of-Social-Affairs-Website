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

    <!--breadcrumbs-->
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

  </div> <!--undermainbar-->


  <!-- ________________________________________Page Content_______________________________________________________________ -->
   <div class="container mt-5">

        <div class="row">
            <div class="col-md-4 mb-5">
                <h2>Επικοινωνία</h2>
                <hr>
                <address>
                    Οδός Σταδίου 29<br>
                    Αθήνα 105 59
                </address>
                <address>
                <span class="fas fa-phone"></span>
                <a></a>2130000000 - 2131111111</a>
                <br>
                <span class="fas fa-envelope"></span>
                <a href="mailto:#">e1@ypeka.gr</a>
                </address>

            </div>      
        
            <div style="margin-left:120px"> 
                <!-- Google Map Copied Code -->
                <iframe 
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12579.43641904405!2d23.7310797!3d37.9804173!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6db1fc0cbb58a00a!2sMinistry%20of%20Labour%20and%20Social%20Affairs!5e0!3m2!1sen!2sgr!4v1610060783009!5m2!1sen!2sgr" 
                width="600" 
                eight="450" 
                frameborder="0" 
                style="border:0;" 
                allowfullscreen="" 
                aria-hidden="false" 
                tabindex="0">
                </iframe>
            </div>      
        
        </div>
        <!-- /.row -->
  </div>
  <!-- /.container -->
    <div class="container">
        <!-- <div class="row"> -->
            <b>Ώρες εξυπηρέτησης κοινού: <p> Καθημερινά <time>9:00</time> έως  <time>13:00</time>.</b></p>
            <a href="reservation.php" class="btn btn-primary btn-icon-split">
                <span class="text">Κλείστε Ραντεβού</span>
            </a>
        <!-- </div> -->
    </div>
    <br> <br>


    <div class="covid-banner">
        <div>
          <p>
            Λόγω της υγειονομικής κατάστασης, τα γραφεία είναι κλειστά για επισκέψεις
            κοινού με ελάχιστες εξαιρέσεις. <br>Αν το ζήτημα απαιτεί τη φυσική σας παρουσία
            <a class="banner-more" href="reservation.php">κλείνετε ραντεβού</a> <br>
            <a class="banner-dismiss" href="#"><i class="fa fa-window-close"></i> </a>
          </p>
        </div>
      </div>

  <!-- Footer -->
  <footer class="">
    <div class="foot-container" style="margin-top: 15%">
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
  </script>


<script>
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
    // Banner Trigger if Not Closed
    // if (!localStorage.bannerClosed) {
    //   $('.covid-banner').css('display', 'inherit');
    // } else {
    //   $('.covid-banner').css('display', 'none');
    // }
    // $('.covid-banner button').click(function() {
    //   $('.covid-banner').css('display', 'none');
    //   localStorage.bannerClosed = 'true';
    // });
    $('.banner-dismiss').click(function() {
      $('.covid-banner').css('display', 'none');
      localStorage.bannerClosed = 'true';
    });
    // if (navigator.userAgent.match(/Opera|OPR\//)) {
    //   $('.covid-banner').css('display', 'inherit');
    // }
    </script>

</body>

</html>
