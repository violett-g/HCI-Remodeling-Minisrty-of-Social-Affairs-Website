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

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <a href="index.php" style="width:20%">
        <div class="logo" >
            <img class="logo-img" src="img/logo2.png" width="50" height="50">
                <div class="logo-name">
                    Υπουργείο Εργασίας <br> και Κοινωνικών Υποθέσεων
                </div>
        </div>
    </a>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Καλώς ήλθατε πίσω!</h1>
                                    </div>
                                    <form class="user" action = "aitisi-adeias-eidikou-skopou.php" method="post">
                                        <div class="form-group">
                                            <input name="username" type="username" class="form-control form-control-user"
                                                id="exampleInputUsername" aria-describedby="emailHelp"
                                                placeholder="Όνομα Χρήστη" required>
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Κωδικός πρόσβασης" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input name="checkbox" type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Θυμήσου με</label>
                                            </div>
                                        </div>
                                        <button name="submit_btn" type="submit" style="border-radius: 10rem; height:40px; width:100%; margin-bottom:20px" >Είσοδος</button>
                                            <!-- <button name="submit_btn" type="submit">Είσοδος</button> -->
                                        <hr>
                                    </form>
                                    <?php
                                        function phpAlert($msg) {
                                            echo '<script type="text/javascript">alert("' . $msg . '")</script>';
                                        }
                                        function phpConfAlert() {
                                            // echo '<script type="text/javascript">alert("' . $msg . '") </script>';
                                            // onclick="javascript:window.history.back(-1);return false;"
                                            // echo "<script> window.history.back(-1); </script>";
                                            echo '<script type="text/javascript"> window.location.assign("aitisi-adeias-eidikou-skopou.php")</script>';
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
                                                    
                                                    header('Location:aitisi-adeias-eidikou-skopou.php');
                                                    // header("Location: {$_SERVER['HTTP_REFERER']}");
                                                    exit;
                                                  }

                                            }
                                            else{
                                                phpAlert("Aυτός ο λογαριασμός δεν υπάρχει ελέγξτε το όνομα χρήστη και τον κωδικό πρόσβασης και δοκιμάστε ξανά!");
                                            }
                                        }
                                    ?>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Ξεχάσατε τον κωδικό σας;</a></a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="registration.php">Δημιουργία λογαριασμού!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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