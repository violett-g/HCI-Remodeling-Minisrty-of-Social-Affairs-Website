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

  <title>profile-settings</title>

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

  <!-- ________________________________________Page Content_______________________________________________________________ -->
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <!-- <form action="../index.php" method="post" > -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon ">
                    <i class="fas fa-home" ></i>
                </div> <br> Αρχική σελίδα
            </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item" style="font-size: 13.5px">
            <a class="nav-link" href="settings.php">
            <i class="fas fa-user-alt " ></i>
                Στοιχεία λογαριασμού</a>
        </li>

        <hr class="sidebar-divider"> <!-- Divider -->

        <li class="nav-item" style="font-size: 13.5px">
            <a class="nav-link" href="user-settings.php" >
                <i class="fas fa-id-badge"></i>
                Στοιχεία φυσικού προσώπου</a>
        </li>

        <hr class="sidebar-divider">
        <li class="nav-item" style="font-size: 13.5px" id="employee_settings">
            <a class="nav-link" href="employee_personal_settings.php" >
            <i class="fas fa-user-cog"></i>
                Στοιχεία εργαζόμενου</a>
        </li>
        

        <li class="nav-item" style="font-size: 13.5px" id="business">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities"  id="opt_business">
                <i class="fas fa-briefcase"></i>
                <span>Στοιχεία εταιρίας</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Οι επιχειρήσεις σας:</h6>
                    <?php
                    $afm = $_SESSION['afm'];
                    $query = "select * from business WHERE employer_afm = '$afm'";
                    $query_run = $con->query($query);
                    if($query_run->num_rows>0){
                        $row = mysqli_fetch_row($query_run);
                        $_SESSION['business_name'] = $row[0];
                    }
                    ?>
                    
                    <a class="collapse-item" href="business_settings.php"> <?php echo $_SESSION['business_name'];?> </a>
                </div>
            </div>
        <hr class="sidebar-divider">
        </li>

        
        <br> <br> <br> <br> <br> <br>
        <hr class="sidebar-divider">

        <li class="nav-item" name="delete">
                <a type="submit" class="nav-link" href="del_account.php" id="opt_del" >
                <i class="fas fa-user-alt-slash"></i>
                    Απενεργοποίηση λογαριασμού</a>
        </li>

        <br> <hr class="sidebar-divider d-none d-md-block"> <!-- Divider -->

    </ul>
    <!-- </form> -->
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

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a> --> 
                        <!-- Dropdown - Messages -->
                        <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                     Nav Item - Alerts -->
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
                    <span>
                        <a class="dropdown-item" href="logout.php" style="margin-top: 15px; color:#dc3545;">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Αποσύνδεση 
                        </a> 
                    </span>
                    
                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid" style="display: flex; justify-content: center;">
                <div class="card o-hidden border-0 shadow-lg my-5" style="width: 50%; padding: 0px 20px 10px 20px;   justify-content: center; ">
                <form action="user-settings.php" method="post">
                    <fieldset style="width: 900px; padding: 30px 150px 20px 20px;" class="shortfieldset">
                        <div class="fieldsetTop">
                            <div class="fieldsetTop-left floatNone ">
                                <h3>Στοιχεία φυσικού προσώπου</h3>
                            </div>
                        </div>
                        <br> <br>
                        <label style="width: 20%" for="uname">Όνομα </label>
                        <input type="text" id="name" name="name" disabled value="<?php echo $_SESSION['name']; ?>" />
                        <br> <br>
                        <label style="width: 20%" for="password">Επώνυμο </label>
                        <input type="text" id="surname" name="surname" disabled value="<?php echo $_SESSION['surname']; ?>" />
                        <br><br>
                        <label style="width: 20%" for="afm">Α.Φ.Μ</label>
                        <input type="text" id="afm" name="afm" disabled value="<?php echo $_SESSION['afm']; ?>" />
                        <br><br>
                        <label style="width: 20%" for="afm">Ιδιότητα</label>
                        <input type="text" id="role" name="role" disabled value="<?php echo $_SESSION['role']; ?>" />
                        <br><br>
                        <label style="width: 20%" for="password">Διεύθυνση </label>
                        <input type="text" id="address" name="address" disabled value="<?php echo $_SESSION['address']; ?>" />
                        <br><br>
                        <label style="width: 20%" for="email">Ηλεκτρονική διεύθυνση </label>
                        <input type="text" id="email" name="email" disabled value="<?php echo $_SESSION['email']; ?>" />
                        <br><br>
                        <label style="width: 20%" for="phone">Τηλέφωνο </label>
                        <input type="text" id="phone" name="phone" disabled value="<?php echo $_SESSION['phone']; ?>" />
                        <div class="fieldsetTop-right btn floatNone">
                                <a href="javascript:void(0);" id="edit" > <i class="far fa-edit"></i> Επεξεργασία</a>
                                <button href="javascript:void(0);"  id="save" name="save" type="submit"><i class="fas fa-save"></i>Αποθήκευση </button>
                            </div>
                        <br>
                        
                    </fieldset>
                </form>
                <?php
                        function phpAlert($msg) {
                            echo '<script type="text/javascript">alert("' . $msg . '")</script>';
                            echo "<script> window.location.assign('user-settings.php'); </script>";
                        }
                        
                        if(isset($_POST['save'])){
                            // phpAlert("save");
                            $b_name = $_SESSION['business_name'];
                            $name = $_POST['name'];
                            $surname = $_POST['surname'];
                            $afm = $_POST['afm'];
                            $address = $_POST['address'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];        
                            if(isset($_SESSION['loged'])){
                                $username = $_SESSION['username'];
                                $query = "UPDATE user SET name='$name',  lastname = '$surname', afm='$afm', email='$email',address='$address', phone='$phone' 
                                WHERE username ='$username'";
                                $query_run = $con->query($query);
                                $query = "UPDATE business SET employer_afm = '$afm' 
                                WHERE business_name ='$b_name'";
                                $query_run = $con->query($query);
                                
                                $_SESSION['name']=$name ;
                                $_SESSION['surname']=$surname;
                                $_SESSION['afm']=$afm;
                                $_SESSION['address']=$address;
                                $_SESSION['email']=$email;
                                $_SESSION['phone']=$phone;

                            }
                            else{
                                phpAlert("login please");
                            }
                        }
                    ?>
                
            </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
//   </script>


// <!--FOR COVID BANNER UNDERNETH ON C-->
// <script>
//     $('.banner-dismiss').click(function() {
//       $('.covid-banner').css('display', 'none');
//       localStorage.bannerClosed = 'true';
//     });

    //for username/password change
    $("#save").hide();
    $('#edit').click(function(e) {
        $(this).hide()
            .closest('fieldset')
            .find('input[type="text"]').attr('disabled', false);  
        $(this).hide()
        .closest('fieldset')
        .find('input[type="password"]').attr('disabled', false);   

        $('#save').show(); 
        
    });

    function visible_pass() {
        var x = document.getElementById("password");
        if (x.id === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    } 

    $('#save').click(function(e) {
        $(this).hide();
        $("#edit").show();
        window.location.replace("settings.php");

    });

    //show business only if it is employer
    document.getElementById('business').style.visibility = "hidden";
    <?php
        if($_SESSION['role'] == 'Εργοδότης'){
            echo "document.getElementById('business').style.visibility = 'visible'";
        }
    ?>

    //show employee only if it is employee
    document.getElementById('employee_settings').style.visibility = "hidden";
    <?php
        if($_SESSION['role'] == 'Εργαζόμενος'){
            echo "document.getElementById('employee_settings').style.visibility = 'visible'";
        }
    ?>
    </script>


</body>

</html>
