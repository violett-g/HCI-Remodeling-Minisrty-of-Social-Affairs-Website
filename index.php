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

  <title>Home</title>

  <!-- Custom styles for this template -->
  <!-- <link href="css/sb-admin-2.css" rel="stylesheet"> -->
  <link href="css/index.css" rel="stylesheet">

  <!--Icons for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


</head>

<body>

  <!-- _______________________________________Header_____________________________________________________ -->
   <!-- COVID-19 -->
   <div id="covban" class="covid-alert" bg-danger >
      <a href="covid.php">Covid-19: Πληροφορίες και υπηρεσίες</a>
      <button type="button" onclick="document.getElementById('covban').style.display='none'" class="close-bar-btn">Κλείσιμο</button>
    </div>
  <header class="bg-primary py-2 mb-10px">
  
    <!-- COVID-19-->
    <!-- <div id="covban" class="covid-alert" bg-danger >
      <a href="#">Covid-19: Πληροφορίες και υπηρεσίες</a>
      <button type="button" onclick="document.getElementById('covban').style.display='none'" class="close-bar-btn">Ακύρωση</button>
    </div>  -->
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
              <button name="settings" class="settings-button"><a href="settings.php">
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
              class="close" title="Close Modal">&times;
            </span>
      
            <!-- Modal Content -->
            <form class="modal-content animate" action = "index.php" method="post">
              <div class="modalContainer" style="padding:30px">
                <input name="username" type="text" placeholder="Όνομα Χρήστη " name="uname" required>
                <input name="password" type="password" placeholder="Κωδικός Πρόσβασης " name="psw" required>

                <button name="submit_btn" type="submit" style="border-radius: 10rem; height:40px; width:50%; margin-bottom:20px" >Είσοδος</button>
                <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
              </div>
      
              <div class="modalContainer" style="background-color:#f1f1f1; padding:15px">
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
                  header('Location:index.php');
                  }
                  phpConfAlert();
                }
                else{
                    phpAlert("Aυτός ο λογαριασμός δεν υπάρχει ελέγξτε το όνομα χρήστη και τον κωδικό πρόσβασης και δοκιμάστε ξανά!");
                }
              }
            ?>
          </div> <!--/modal-->
        </div><!--/login-->
      </div><!--/search-log-->
      
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
  <nav id="under-bar" style="height: 50px; " class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
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
            

  <!-- ________________________________________Page Content_______________________________________________________________ -->
<div class="content">
  <div class="first-content mt-10" style="margin: 15px; padding-top:15px;">
  
    <div class="frequent-search shadow"> 
        <div class="fr-search-title">  Επίκαιρες αναζητήσεις... </div>
    
        <ul>
        <li><a href="news.asp">Δήλωση εργοδοτών για την αντιμετώπιση του COVID-19</a></li>
        <li><a href="contact.asp">Εργασία σε περίοδο πανδημίας</a></li>
        <li><a href="about.asp">Οδηγίες και μέτρα πρόληψης για τους εργαζόμενους</a></li>
        <li><a href="about.asp">Παροχές σε περίοδο πανδημίας</a></li>
        <li><a href="contact.php">Οδηγίες και μέτρα πρόληψης για τον εργοδότη</a></li>
        <li><a href="about.asp">Oικονομική ενίσχυση για τους εποχικά ανέργους</a></li>
        </ul>
    </div> 
        
            
    <!--carusel-->
    <div class="carusel-bg">
      <div class="slideshow-container shadow">

        <div class="mySlides fade">
          <div class="numbertext">1 / 4</div>
          <img src="img/ypourg.jpg" style="width:100%; height:400px;">
          <div class="text" style="background-color: #fff; font-size: 10.5;"> <a target="_blank" href="https://www.oramaelpidas.gr/el/%CF%84%CE%BF-%CE%BF%CF%81%CE%B1%CE%BC%CE%B1-%CE%B5%CE%BB%CF%80%CE%B9%CE%B4%CE%B1%CF%83-%CF%83%CF%84%CE%BF-%CF%85%CF%80%CE%BF%CF%85%CF%81%CE%B3%CE%B5%CE%AF%CE%BF-%CE%B5%CF%81%CE%B3%CE%B1%CF%83%CE%AF/">
          Το ΟΡΑΜΑ ΕΛΠΙΔΑΣ στο Υπουργείο Εργασίας και Κοινωνικών Υποθέσεων</a></div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 4</div>
          <img src="img/amazon.jpg" style="width:100%; height:400px">
          <div class="text"> <a style="color:#fff;"target="_blank"  href="https://www.ethnos.gr/oikonomia/141827_amazon-anoigei-grafeia-stin-ellada-kai-kanei-proslipseis"> 
              Αmazon: Οι θέσεις εργασίας που θα ανοίξουν στην Ελλάδα </a></div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">3 / 4</div>
          <img src="img/covid-work.jpg" style="width:100%; height:400px;">
          <div class="text" style="background-color: #fff"> <a target="_blank" href="https://www.taxheaven.gr/news/52498/analytika-ta-metra-poy-isxyoyn-apo-deytera-gia-tis-drasthriothtes-poy-epanaleitoyrgoyn-dhmosieyohke-h-apofash">
            Αναλυτικά τα μέτρα που ισχύουν από Δευτέρα για τις δραστηριότητες που επαναλειτουργούν </a></div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">4 / 4</div>
          <img src="img/covid-money.jpg" style="width:100%; height:400px">
          <div class="text" style="background-color:#fff;"><a target="_blank" href="https://www.alfavita.gr/koinonia/341225_epidoma-534eu-pote-plironontai-oi-anastoles-dekembrioy">Επίδομα 534€: Πότε πληρώνονται οι αναστολές Δεκεμβρίου</a></div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>
        <div class="news"> 
          <h3 style=" font-family: Arial, Helvetica, sans-serif;"><b>ΕΝΗΜΕΡΩΘΕΙΤΕ ΠΡΩΤΟΙ!</b></h3>
          <br> <br> <br>
          <button class="news-button"> ΝΕΑ </button>
          
          <button class="announcment-button"> ΑΝΑΚΟΙΝΩΣΕΙΣ </button>
        </div>
      </div> <!--/carusel-bg-->

    </div><!--/first-content-->


    
    <div class="second-content " style="text-align:center; width:80% margin:auto;">
    <hr>
    <!-- <br> -->
    <h3 style="color:#858796; font-wight:bold; " >Προτεινόμενες υπηρεσίες </h3>  <hr>
      <div class="services">
        <div class="service " >
          <h3><a href="#">Βεβαιώσεις</a></h3>
          <p>Βεβαίωση ανεργίας για παροχή ιατροφαρμακευτικής περίθαλψης, αυτασφάλισης,ποσού επιδοτήσεων κ.α </p>
        </div>
        <div class="service " >
          <h3><a href="#">Άδειες </a></h3>
          <p>Άδεια εργασίας προσωπικού, άσκησης επαγγέλματος κατασκευαστών / επισκευαστών κλειδαριών.
          Ειδική άδεια προστασίας μητρότητας κ.α. </p>
        </div>
        <div class="service " >
          <h3> <a href="#">Αίτησεις</a></h3>
          <p> Αίτηση επιδόματος ανεργίας, συνταξιοδότησης,πρόσληψης στους Βρεφονηπιακούς Σταθμούς του ΟΑΕΔ κ.α<p>          
        </div>
        <div class="service " >
          <h3><a href="#">Αποζημιώσεις και παροχές</a></h3>
          <p>Προγράμματα κοινωφελούς χαρακτήρα / κοινωνικού-κατασκηνωτικού τουρισμού, παροχές μητρότητας κ.ά.</p>
        </div>
        <div class="service " >
          <h3><a href="#">Ασφάλιση</a></h3>
          <p>Ασφαλιστική ικανότητα, ασφαλιστικό βιογραφικό, εισφορές μισθωτών / μη μισθωτών κ.ά.</p>
        </div>
        <div class="service " >
          <h3><a href="#">Υπηρεσίες ασύλου</a></h3>
          <p>Εύρεση Προσωρινού Αριθμού Ασφάλισης και Υγειονομικής Περίθαλψης Αλλοδαπού (ΠΑΑΥΠΑ) </p>
        </div>
        <div class="service " >
          <h3><a href="#">Σύνταξη αναπηρίας</a></h3>
          <p> Διαχείριση αιτήματος ΚΕΠΑ, δωρεάν κόμιστρο ATH.ENA card, πολυτροπική ψηφιακή βιβλιοθήκη AMELib κ.ά.</p>
        </div>
        <div class="service " >
          <h3><a href="#">Δελτίο ανεργίας</a></h3>
          <p>Έκδοση / ανανέωση κάρτα ανεργίας, δωρεάν κόμιστρο ATH.ENA card, 
            προγράμματα κατάρτισης κ.ά. </p>
        </div>
        <div class="service " >
          <h3> <a href="#">Αναζήτηση θέσεων εργασίας </a></h3>
          <p> Εργαλεία και υπηρεσίες για την αναζήτηση 
            εργασίας </p>
        </div>
        <div class="service" >
          <h3><a href="#">Απασχόληση στο δημόσιο τομέα</a></h3>
          <p> Αίτηση για συμμετοχή σε διαγωνισμό, αποτελέσματα, ένσταση κ.ά.</p>
        </div>
      </div>
    <div>
  
  </div> <!-- /content -->
  
  
  




  <!-- Footer -->
  <footer class="foot-container" >
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



// <!--FOR COVID BANNER UNDERNETH ON C-->

// $("#under-bar").hide();
// <?php
// if(isset($_SESSION['loged'])){?>
//   $("#under-bar").show();
// <?php
// }
// else{?>
//   $("#under-bar").hide();
// <?php
// }
// ?>
//     $('.banner-dismiss').click(function() {
//       $('.covid-banner').css('display', 'none');
//       localStorage.bannerClosed = 'true';
//     });  
    
    // carusel
 
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }
  </script>  




</body>

</html>
