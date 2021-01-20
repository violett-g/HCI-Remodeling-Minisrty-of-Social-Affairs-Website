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

    <title>Reservation Form</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <a href="index.php">
        <div class="logo">
            <img class="logo-img" src="img/logo2.png" width="50" height="50">
                <div class="logo-name">
                    Υπουργείο Εργασίας <br> και Κοινωνικών Υποθέσεων
                </div>
        </div>
    </a>
    <!-- <div class="home shadow">
        <a  href="index.php"><i class="fas fa-home"></i>Αρχική</a>
    </div> -->

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-5">
                        <div class="p-5">
                            <div class="text-center">
                                <p style="color: red">
                                   
                                    Πριν κλείσετε ραντεβού, 
                                    σιγουρευτείτε ότι η υπηρεσία που χρειάζεστε να ολοκληρώσετε 
                                    δεν μπορεί να γίνει ηλεκτρονικά. <br> 
                                </p>
                                    <br> <br> <br> <br> <br> <br>
                                <p>   Για κάθε απορία είμαστε εδώ να σας βοηθήσουμε! <br>Επικοινωνήστε μαζί μας!
                                    <br>
                                    <address>
                                        <span class="fas fa-phone"></span>
                                        <a></a>2130000000 - 2131111111</a>
                                        <br>
                                        <span class="fas fa-envelope"></span>
                                        <a href="mailto:#">e1@ypeka.gr</a>
                                    </address>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Κλείστε Ραντεβού!</h1>
                            </div>
                            <?php if(isset($_SESSION['loged'])){  ?>
                            <form class="user" action = "contact.php" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="name" type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="<?php echo $_SESSION['name']; ?>"  value="<?php echo $_SESSION['name']; ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="surname" type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Επίθετο" value="<?php echo $_SESSION['surname']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="phone" type="text" class="form-control form-control-user" id="examplecellnum"
                                            placeholder="Aριθμός τηλεφώνου" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="afm" type="text" class="form-control form-control-user" id="exampleafm"
                                            placeholder="Α.Φ.Μ" value="<?php echo $_SESSION['afm']; ?>" required>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <input name="email" type="text" class="form-control form-control-user" id="exampleInputemail"
                                        placeholder="Ηλεκτρονική Διεύθυνση" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="date" type="date" class="form-control form-control-user" id="reservation_date"
                                            required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="hour" type="text" class="form-control form-control-user" id="exampleafm"
                                            placeholder="Ώρα" list="hourlist" required>

                                            <datalist id="hourlist">
                                                <option value="9:00">9:00</option>
                                                <option value="9:30">9:30</option>
                                                <option  value="10:00">10:00</option>
                                                <option  value="10:30">10:30</option>
                                                <option  value="11:00">11:00</option>
                                                <option  value="11:30">11:30</option>
                                                <option  value="12:00">12:00</option>
                                                <option  value="12:30">12:30</option>
                                            </datalist>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="description" type="text" class="form-control form-control-user" id="exampleInputDescription"
                                        placeholder="Σύντομη Περιγραφή Ζητήματος" required>
                                </div>
                                <button name="submit_btn" type="submit" class="btn btn-primary btn-user btn-block" href="contact.php">Υποβολή</button>
                                
                                <hr>
                            </form>
                            <?php } else {?>
                                <form class="user" action = "contact.php" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="name" type="text" class="form-control form-control-user" id="nme"
                                            placeholder="Ονομα" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="surname" type="text" class="form-control form-control-user" id="surname"
                                            placeholder="Επίθετο" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="phone" type="text" class="form-control form-control-user" id="number"
                                            placeholder="Aριθμός τηλεφώνου" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="afm" type="text" class="form-control form-control-user" id="afm"
                                            placeholder="Α.Φ.Μ" required>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <input name="email" type="text" class="form-control form-control-user" id="email"
                                        placeholder="Ηλεκτρονική Διεύθυνσή" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="date" type="date" class="form-control form-control-user" id="reservation_date"
                                            required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="hour" type="time"  min="09:00" max="13:00" step="1500"  class="form-control form-control-user" id="exampleafm"
                                            placeholder="Ώρα" list="hourlist" required>

                                            <datalist id="hourlist">
                                                <option value="9:00">9:00</option>
                                                <option value="9:30">9:30</option>
                                                <option  value="10:00">10:00</option>
                                                <option  value="10:30">10:30</option>
                                                <option  value="11:00">11:00</option>
                                                <option  value="11:30">11:30</option>
                                                <option  value="12:00">12:00</option>
                                                <option  value="12:30">12:30</option>
                                            </datalist>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="description" type="text" class="form-control form-control-user" id="InputDescription"
                                        placeholder="Σύντομη Περιγραφή Ζητήματος" required>
                                </div>
                                <!-- <p>
                                    <a> Τμήμα που αφορά:</a> <br> 
                                    <div class="form-group row">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input name="checkbox1" type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Εργαζόμενοι &nbsp; </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input name="checkbox2" type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Εργοδότες/Επιχειρήσεις&nbsp;  </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input name="checkbox3" type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Εργασία & Ασφάλιση&nbsp;  </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input name="checkbox4" type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Πρόνοια </label>
                                            </div>
                                        </div>
                                    </div>
                                </p> -->
                                <button name="submit_btn1" type="submit" class="btn btn-primary btn-user btn-block" href="contact.php">Υποβολή</button>
                                
                                <hr>
                            </form>
                            <?php } ?>

                            <?php
                            function phpAlert($msg) {
                                echo '<script type="text/javascript">alert("' . $msg . '")</script>';   
                            }
                             function phpConfAlert($msg) {
                                echo '<script type="text/javascript">alert("' . $msg . '") </script>';
                                // echo '<script type="text/javascript"> window.location.href = "index.php"</script>';
                            }
                                if(isset($_POST['submit_btn1']) || isset($_POST['submit_btn'])){
                                    $name = $_POST['name']; //read input
                                    $surname = $_POST['surname'];
                                    $afm = $_POST['afm'];
                                    $date = $_POST['date'];
                                    $hour = $_POST['hour'];
                                    $phone = $_POST['phone'];
                                    $email = $_POST['email'];

                                    if(is_numeric($afm)){//check correctness afm
                                        if(strlen((string)$afm) == 9){
                                            $query = "insert into reservations values('$afm', '$name', '$surname', '$phone', '$email', '$date', '$hour')"  ;
                                            $query_run = $con->query($query);
                                            phpConfAlert("success");                                          
                                        }
                                        else{
                                            phpAlert("Το Α.Φ.Μ πρέπει να αποτελείτε από 9 ψηφιά");
                                        }
                                    }
                                    else{
                                        phpAlert("Το Α.Φ.Μ πρέπει να αποτελείτε από 9 ψηφιά");
                                    }

                                }
                            ?>
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