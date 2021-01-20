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

    <title>Αίτηση - Άδεια Ειδικού Σκοπού</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<!-- _______________________________________Header_____________________________________________________ -->
<header class="bg-primary py-2 mb-5">
    <!--Navigation bar-->
    <div class="topnav">
      <img class="logo-img" src="img/logo2.png" width="50" height="50">
      <div class="logo-name">
        <p>Υπουργείο Εργασίας και Κοινωνικών Υποθέσεων </p>
      </div>
      <div class="search-log">
        <!--Search box-->
        <form class="searchbox"> <!-- Page action="search.php" method="post" --> 
        <div class=wrap>
          <input type="text" placeholder=" " autocomplete="off">
          <button class="searchsub" type="submit" value = "Αναζήτηση">Αναζήτηση</button>
        </div>
        </form>
        <!--LOGIN-->
        <div class="login"> 
          <!-- Button to open the modal login form -->
          <?php if(isset($_SESSION['loged'])){ ?>
            <button name="logout" class="logbutton"><a href="logout.php"> Αποσύνδεση<a></button>
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
                <span class="psw">Ξεχάσατε τον <a href="#">κωδικό</a> σας?</span>
                <div class="text-right">
                  <a class="small" href="secondary/registration.php">Δημιουργία λογαριασμού!</a>
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
      <!--MENOU-->
      <div class="main-menou"> 
        <ul>
          <li><a href="../index.php"><i class="fas fa-home"></i></a></li>
          <li><a href="news.asp">Εργαζόμενοι</a></li>
          <li><a href="contact.asp">Εργοδότες/Επιχειρήσεις</a></li>
          <li><a href="about.asp">Εργασία & Ασφάλιση</a></li>
          <li><a href="about.asp">Πρόνοια</a></li>
          <li><a href="contact.php">Επικοινωνία</a></li>
          <li><a href="about.asp">COVID-19</a></li>
        </ul>
      </div>
      
    </div>
  </header>


<body id="page-top">
    

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800">Αίτηση Άδειας Ειδικού Σκοπού</h1>

                  <!-- Form start -->
                  <form class="form-style-9">
                    <ul>
                    <li>
                        <input type="text" name="field1" class="field-style field-split align-left" placeholder="Name" />
                        <input type="email" name="field2" class="field-style field-split align-right" placeholder="Email" />

                    </li>
                    <li>
                        <input type="text" name="field3" class="field-style field-split align-left" placeholder="Phone" />
                        <input type="url" name="field4" class="field-style field-split align-right" placeholder="Website" />
                    </li>
                    <li>
                    <input type="text" name="field3" class="field-style field-full align-none" placeholder="Subject" />
                    </li>
                    <li>
                    <textarea name="field5" class="field-style" placeholder="Message"></textarea>
                    </li>
                    <li>
                    <input type="submit" value="Send Message" />
                    </li>
                    </ul>
                  </form>
                    
                  <!-- Form end -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="">
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
                }
            });
        }
    </script>


</body>

</html>