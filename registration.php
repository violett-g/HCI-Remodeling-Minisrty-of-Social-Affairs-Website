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

    <title>Register</title>

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

        <div class="card o-hidden border-0 shadow-lg my-5 " style="margin-bottom: 20px;">
            <div class="card-body p-0 ">
            <!-- onsubmit="return validateform()" -->
            <form class="user" action = "registration.php"  method="post">
                <!-- Nested Row within Card Body -->
                <!-- <div class="row">                 -->
                    <div class="text-center" style="margin-left:auto; margin-right:auto; width:80%">
                        <div class="p-5">
                            <h1 class="h4 text-gray-900 mb-0">Δημιουργία λογαριασμού!</h1>
                            <div class="p-5" style="text-align: center; margi-top:0">
                                <div class="text-center" style="margin-left:auto; margin-right:auto; width:50%">
                                    <input id="role" name="role" type="text" oninput="onInput()" class="form-control form-control-user"
                                        placeholder="Επιλέξτε την κατηγορία πού ανήκετε:" list="rolelist">

                                    <datalist id="rolelist">
                                        <option id ="employer" value="Εργοδότης">Εργοδότης</option>
                                        <option id ="emplyee" value="Εργαζόμενος">Εργαζόμενος</option>
                                        <option id = "freelancer" value="Ελεύθερος επαγγελματίας">Ελεύθερος επαγγελματίας</option>
                                        <option value="Άνεργος">Άνεργος</option>
                                        <option value="Συνταξιούχος">Συνταξιούχος</option>
                                    </datalist>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id ="business_name" name="business_name" type="text" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="Επωνυμία εταιρείας" >
                                </div>
                                <div class="col-sm-6">
                                    <input  id="business_afm" name="business_afm" type="text" class="form-control form-control-user" id="exampleLastName"
                                        placeholder="Α.Φ.Μ εταιρείας" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id ="business_address" name="business_address" type="text" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="Διεύθυνσή εταιρείας" >
                                </div>
                                <div class="col-sm-6">
                                    <input  id="business_phone" name="business_phone" type="text" class="form-control form-control-user" id="exampleLastName"
                                        placeholder="Τηλέφωνο εταιρείας" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id ="business_email" name="business_email" type="email" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="Ηλεκτρονική διεύθυνση εταιρείας" >
                                </div>        
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="name" type="text" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="Ονομα" required>
                                </div>
                                <div class="col-sm-6">
                                    <input name="surname" type="text" class="form-control form-control-user" id="exampleLastName"
                                        placeholder="Επίθετο" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="amka" type="text" class="form-control form-control-user" id="exampleamka"
                                        placeholder="ΑΜΚΑ" required>
                                </div> -->
                                <div class="col-sm-6">
                                    <input name="email" type="text" class="form-control form-control-user" id="exampleInputemail"
                                        placeholder="Ηλεκτρονική Διεύθυνση" required>
                                </div>
                                <div class="col-sm-6">
                                    <input name="afm" type="text" class="form-control form-control-user" id="exampleafm"
                                        placeholder="Α.Φ.Μ" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="address" type="text" class="form-control form-control-user"
                                        id="exampleAddress" placeholder="Διεύθυνση " required>
                                </div>
                                <div class="col-sm-6">
                                    <input name="phone" type="text" class="form-control form-control-user"
                                        id="examplePhone" placeholder="Τηλέφωνο" required title="Παρακαλώ συμπληρώστε αυτό το πεδίο">  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="username" type="text" class="form-control form-control-user"
                                        id="exampleusername" placeholder="Όνομα χρήστη " required>
                                </div>
                                <!-- <div class="col-sm-6">
                                    <input name="email" type="text" class="form-control form-control-user" id="exampleInputemail"
                                        placeholder="Ηλεκτρονική Διεύθυνσή" required>
                                </div> -->
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="password" type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Κωδικός πρόσβασης" required>
                                </div>
                                <div class="col-sm-6">
                                    <input name="cpassword" type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="Επανάληψη κωδικού πρόσβασης" required title="Παρακαλώ συμπληρώστε αυτό το πεδίο">
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="text-center">
                    <button style=" width: 50%; margin-left: auto; margin-right:auto; margin-top:0" name="submit_btn" type="submit" class="btn btn-primary btn-user btn-block">Εγγραφή Λογαριασμού</button>
                    <hr>
                    <a style=" margin-bottom: 0.75rem;;" class="small" href="login.php">Έχετε ήδη λογαριασμό? Σύνδεση!<br><br></a>
                </div>
            </form>
            <?php
                function phpAlert($msg) {
                    echo '<script type="text/javascript">alert("' . $msg . '")</script>';   
                }
                function phpConfAlert($msg) {
                    echo '<script type="text/javascript">alert("' . $msg . '") </script>';
                    echo '<script type="text/javascript"> window.location.href = "index.php"</script>';
                }
                function phpEmployerAlert($msg) {
                    echo '<script type="text/javascript">alert("' . $msg . '") </script>';
                    echo '<script type="text/javascript"> window.location.href = "settings.php"</script>';
                }
                if(isset($_POST['submit_btn'])){
                    $name = $_POST['name']; //read input
                    $surname = $_POST['surname'];
                    $username = $_POST['username'];
                    $afm = $_POST['afm'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $cpassword = $_POST['cpassword'];
                    $role = $_POST['role'];
                    $address = $_POST['address'];
                    $phone =$_POST['phone'];


                    if(is_numeric($afm)){//check correctness afm
                        if(strlen((string)$afm) == 9){
                            if($password==$cpassword){
                                $query = "select * from user WHERE afm = '$afm'";
                                $query_run = $con->query($query);
                                if($query_run->num_rows>0){
                                    //user already a user exist
                                    phpAlert(  "Έχετε ήδη λογαριασμό");
                                }
                                else{
                                    $query = "insert into user(afm,username,password,name,lastname,email,role,address,phone)
                                        values('$afm','$username','$password','$name','$surname','$email','$role','$address','$phone')";
                                    $query_run = $con->query($query);
                                    if($query_run){
                                        if ($role == "Εργοδότης"){
                                            $business_name=$_POST['business_name'];
                                            $business_afm=$_POST['business_afm'];
                                            $business_address=$_POST['business_address'];
                                            $business_email=$_POST['business_email'];
                                            $business_phone=$_POST['business_phone'];
                                            $query = "insert into business values ('$business_name','$business_afm', '$afm', '$business_address', '$business_email','$business_phone')";
                                            $query_run = $con->query($query);
                                            if($query_run){
                                            phpEmployerAlert("Ο λογαριασμός δημιουργήθηκε επιτυχώς");}
                                            header('Location: employee_settings.php');
                                            

                                        }  
                                        else if ($role == "Εργαζόμενος"){
                                            $business_afm=$_POST['business_afm'];
                                            $query = "insert into workplaces(business_afm,employee_afm,employee_name,employee_surname)
                                            values('$business_afm','$afm','$name','$surname')";
                                            $query_run = $con->query($query);
                                            if($query_run){
                                                phpEmployerAlert("Ο λογαριασμός δημιουργήθηκε επιτυχώς");}
                                                header('Location: index.php');

                                        }                          
                                        else{
                                            phpConfAlert(  "Ο λογαριασμός δημιουργήθηκε επιτυχώς");
                                            header('Location: index.php');                                       
                                        }
                    
                                        if(!isset($_SESSION['loged'])){
                                            $_SESSION['loged'] = 1;
                                            $_SESSION['username'] = $username;
                                            $_SESSION['password'] = $password; 
                                            $_SESSION['name'] = $name;
                                            $_SESSION['surname'] = $surname;
                                            $_SESSION['afm'] = $afm;
                                            $_SESSION['role'] = $role;
                                            $_SESSION['email'] = $email;
                                            $_SESSION['address'] = $address;
                                            $_SESSION['phone'] = $phone;
                                        }

                                       
                                    }
                                    else{
                                        echo '<scrip_type="text_javascript"> alert("FAIL")</script>';
                                    }
                                }
                            }
                            else{
                                phpAlert("ο κωδικός πρόσβασης δεν ταιριάζει");
                            }
                        }
                        else{
                            phpAlert(   "Το Α.Φ.Μ πρέπει να αποτελείτε από 9 αριθμητικά ψηφιά");
                        }
                    }
                    else{
                        phpAlert(   "Το Α.Φ.Μ πρέπει να αποτελείτε από αριθμητικά ψηφιά");
                    }

                }
            ?>
            </div> <!--card body-->
        </div>

    </div> <!--container-->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script type="text/javascript"></script>

    <script>
        $("#business_afm").hide();
        $("#business_name").hide();
        $("#business_address").hide();
        $("#business_phone").hide();
        $("#business_email").hide();

        function onInput() {
            var val = document.getElementById("role").value;
            var opts = document.getElementById('rolelist').childNodes;
            if (val == "Εργοδότης"){
                $("#business_afm").show();
                $("#business_name").show();
                $("#business_address").show();
                $("#business_phone").show();
                $("#business_email").show();
            }
            else if(val == "Εργαζόμενος"){
                $("#business_afm").show();
                $("#business_name").show();
                // $("#business_address").show();
                // $("#business_phone").show();
                // $("#business_email").show();
            }
            else {
                $("#business_afm").hide();
                $("#business_name").hide();
                $("#business_address").hide();
                $("#business_phone").hide();
                $("#business_email").hide();
            }

            // for (var i = 0; i < opts.length; i++) {
            // if (opts[i].value === val) {
            //     // An item was selected from the list!
            //     // yourCallbackHere()
            //     alert(opts[i].value);
            //     break;
            // }
            // }
        }


    </script>
    

</body>

</html>