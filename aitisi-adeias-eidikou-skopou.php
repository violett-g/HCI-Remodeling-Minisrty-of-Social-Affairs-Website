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

  <title>Αίτηση Άδειας Eιδικού Σκοπού</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>


<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- onsubmit="return validateform()" -->
        <form class="user" action="aitisi-adeias-eidikou-skopou.php" method="post">
          <!-- Nested Row within Card Body -->
          <!-- <div class="row">                 -->
          <div class="text-center" style="margin-left:auto; margin-right:auto; width:80%">
            <div class="p-5">
              <h1 class="h4 text-gray-900 mb-0">Αίτηση Άδειας ειδικού Σκοπού</h1>

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input id="business_name" name="business_name" type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Επωνυμία εταιρείας">
                </div>
                <div class="col-sm-6">
                  <input id="business_afm" name="business_afm" type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Α.Φ.Μ εταιρείας">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input id="business_address" name="business_address" type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Διεύθυνσή εταιρείας">
                </div>
                <div class="col-sm-6">
                  <input id="business_phone" name="business_phone" type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Τηλέφωνο εταιρείας">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input id="business_email" name="business_email" type="email" class="form-control form-control-user" id="exampleFirstName" placeholder="Ηλεκτρονική διεύθυνσή εταιρείας">
                </div>
              </div>


              <div class="form-group row">
                <div class="col-sm-6">
                  <input name="onoma" type="text" class="form-control form-control-user" id="onoma" placeholder="Όνομα" required>
                </div>
                <div class="col-sm-6">
                  <input name="epwnumo" type="text" class="form-control form-control-user" id="epwnumo" placeholder="Επώνυμο" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6">
                  <input name="afm" type="text" class="form-control form-control-user" id="afm" placeholder="Α.Φ.Μ" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6">
                  <input name="date1" type="text" class="form-control form-control-user" id="date1" placeholder="Ημερομηνία Εκκίνησης Άδειας" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                </div>
                <div class="col-sm-6">
                  <input name="date2" type="text" class="form-control form-control-user" id="date2" placeholder="Ημερομηνία Λήξης Άδειας" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input name="paidia" type="number" oninput="onInput()" min="0" class="form-control form-control-user" id="paidia" placeholder="Παιδιά" required>
                </div>
              </div>
              <div class="form-group row">
                <?php if (isset($_POST['paidia'])) {
                  echo $_POST['paidia'];

                  for ($i = 0; $i < $_POST['paidia']; $i++) { ?> <div class="form-group row">
                      <div class="col-sm-6">
                        <input name="date1" type="text" class="form-control form-control-user" id="date1" placeholder="Ημερομηνία Εκκίνησης Άδειας" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                      </div>
                      <div class="col-sm-6">
                        <input name="date2" type="text" class="form-control form-control-user" id="date2" placeholder="Ημερομηνία Λήξης Άδειας" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                      </div>
                      PAIDIA = <?php echo $_POST['paidia'] ?>
                    </div> <?php }
                        } ?>
              </div>
              <!-- πεδια για στοιχεια παιδιων -->
              <div class="form-group row">
                <div class="col-sm-6">
                  <input name="age1" type="number" min="0" class="form-control form-control-user" id="age1" placeholder="Ηλικία Παιδιού">
                </div>
                <div class="col-sm-6">
                  <!-- <input name="school1" type="text" class="form-control form-control-user" id="school1" placeholder="Σχολική Βαθμίδα" required> -->
                  <input id="school1" name="school1" type="text" class="form-control form-control-user" placeholder="Επιλέξτε Σχολική Βαθμίδα:" list="schoollist1">

                  <datalist id="schoollist1">
                    <option id="prosxoliki" value="Προσχολική ηλικία">Προσχολική ηλικία</option>
                    <option id="protovathmia" value="Πρωτοβάθμια εκπαίδευση">Πρωτοβάθμια εκπαίδευση</option>
                    <option id="deuterovathmia" value="Δευτεροβάθμια εκπαίδευση">Δευτεροβάθμια εκπαίδευση</option>
                    <option id="eidika_sxoleia" value="Eιδικά σχολεία / σχολικές μονάδες ειδικής αγωγής">Eιδικά σχολεία / σχολικές μονάδες ειδικής αγωγής</option>
                    <option id="allo-AMEA" value="Άλλο (ΑΜΕΑ)">Άλλο (ΑΜΕΑ)</option>
                  </datalist>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6">
                  <input name="age2" type="number" min="0" class="form-control form-control-user" id="age2" placeholder="Ηλικία Παιδιού">
                </div>
                <div class="col-sm-6">
                  <!-- <input name="school1" type="text" class="form-control form-control-user" id="school1" placeholder="Σχολική Βαθμίδα" required> -->
                  <input id="school2" name="school2" type="text" class="form-control form-control-user" placeholder="Επιλέξτε Σχολική Βαθμίδα:" list="schoollist2">

                  <datalist id="schoollist2">
                    <option id="prosxoliki" value="Προσχολική ηλικία">Προσχολική ηλικία</option>
                    <option id="protovathmia" value="Πρωτοβάθμια εκπαίδευση">Πρωτοβάθμια εκπαίδευση</option>
                    <option id="deuterovathmia" value="Δευτεροβάθμια εκπαίδευση">Δευτεροβάθμια εκπαίδευση</option>
                    <option id="eidika_sxoleia" value="Eιδικά σχολεία / σχολικές μονάδες ειδικής αγωγής">Eιδικά σχολεία / σχολικές μονάδες ειδικής αγωγής</option>
                    <option id="allo-AMEA" value="Άλλο (ΑΜΕΑ)">Άλλο (ΑΜΕΑ)</option>
                  </datalist>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6">
                  <input name="age3" type="number" min="0" class="form-control form-control-user" id="age3" placeholder="Ηλικία Παιδιού">
                </div>
                <div class="col-sm-6">
                  <!-- <input name="school1" type="text" class="form-control form-control-user" id="school1" placeholder="Σχολική Βαθμίδα" required> -->
                  <input id="school3" name="school3" type="text" class="form-control form-control-user" placeholder="Επιλέξτε Σχολική Βαθμίδα:" list="schoollist3">

                  <datalist id="schoollist3">
                    <option id="prosxoliki" value="Προσχολική ηλικία">Προσχολική ηλικία</option>
                    <option id="protovathmia" value="Πρωτοβάθμια εκπαίδευση">Πρωτοβάθμια εκπαίδευση</option>
                    <option id="deuterovathmia" value="Δευτεροβάθμια εκπαίδευση">Δευτεροβάθμια εκπαίδευση</option>
                    <option id="eidika_sxoleia" value="Eιδικά σχολεία / σχολικές μονάδες ειδικής αγωγής">Eιδικά σχολεία / σχολικές μονάδες ειδικής αγωγής</option>
                    <option id="allo-AMEA" value="Άλλο (ΑΜΕΑ)">Άλλο (ΑΜΕΑ)</option>
                  </datalist>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6">
                  <input name="age4" type="number" min="0" class="form-control form-control-user" id="age4" placeholder="Ηλικία Παιδιού">
                </div>
                <div class="col-sm-6">
                  <!-- <input name="school1" type="text" class="form-control form-control-user" id="school1" placeholder="Σχολική Βαθμίδα" required> -->
                  <input id="school4" name="school4" type="text" class="form-control form-control-user" placeholder="Επιλέξτε Σχολική Βαθμίδα:" list="schoollist4">

                  <datalist id="schoollist4">
                    <option id="prosxoliki" value="Προσχολική ηλικία">Προσχολική ηλικία</option>
                    <option id="protovathmia" value="Πρωτοβάθμια εκπαίδευση">Πρωτοβάθμια εκπαίδευση</option>
                    <option id="deuterovathmia" value="Δευτεροβάθμια εκπαίδευση">Δευτεροβάθμια εκπαίδευση</option>
                    <option id="eidika_sxoleia" value="Eιδικά σχολεία / σχολικές μονάδες ειδικής αγωγής">Eιδικά σχολεία / σχολικές μονάδες ειδικής αγωγής</option>
                    <option id="allo-AMEA" value="Άλλο (ΑΜΕΑ)">Άλλο (ΑΜΕΑ)</option>
                  </datalist>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6">
                  <input name="age5" type="number" min="0" class="form-control form-control-user" id="age5" placeholder="Ηλικία Παιδιού">
                </div>
                <div class="col-sm-6">
                  <!-- <input name="school1" type="text" class="form-control form-control-user" id="school1" placeholder="Σχολική Βαθμίδα" required> -->
                  <input id="school5" name="school5" type="text" class="form-control form-control-user" placeholder="Επιλέξτε Σχολική Βαθμίδα:" list="schoollist5">

                  <datalist id="schoollist5">
                    <option id="prosxoliki" value="Προσχολική ηλικία">Προσχολική ηλικία</option>
                    <option id="protovathmia" value="Πρωτοβάθμια εκπαίδευση">Πρωτοβάθμια εκπαίδευση</option>
                    <option id="deuterovathmia" value="Δευτεροβάθμια εκπαίδευση">Δευτεροβάθμια εκπαίδευση</option>
                    <option id="eidika_sxoleia" value="Eιδικά σχολεία / σχολικές μονάδες ειδικής αγωγής">Eιδικά σχολεία / σχολικές μονάδες ειδικής αγωγής</option>
                    <option id="allo-AMEA" value="Άλλο (ΑΜΕΑ)">Άλλο (ΑΜΕΑ)</option>
                  </datalist>
                </div>
              </div>
              <!-- τελος πεδιων για στοιχεια παιδιων -->

            </div>
          </div>
          <div class="text-center">
            <button style=" width: 50%; margin-left: auto; margin-right:auto; margin-top:0" name="submit_btn" type="submit" class="btn btn-primary btn-user btn-block">Υποβολή Αίτησης<a href="profile-settings.php"></a></button>
            <hr>
            <a style=" margin-bottom: 0.75rem;;" class="small" href="adeia-eidikou-skopou.php">Ακύρωση και Επιστροφή στην προηγούμενη σελίδα<br><br></a>
          </div>
        </form>
        <?php
        function phpAlert($msg)
        {
          echo '<script type="text/javascript">alert("' . $msg . '")</script>';
        }
        function phpConfAlert($msg)
        {
          echo '<script type="text/javascript">alert("' . $msg . '") </script>';
          echo '<script type="text/javascript"> window.location.href = "index.php"</script>';
        }        
        function phpSuccessAlert($msg)
        {
          echo '<script type="text/javascript">alert("' . $msg . '") </script>';
          echo '<script type="text/javascript"> window.location.href = "employee_personal_settings.php"</script>';
        }
        if (isset($_POST['submit_btn'])) {

          if ($_SESSION['role'] == "Εργαζόμενος") {

            $name = $_POST['onoma']; //read input
            $surname = $_POST['epwnumo'];
            $afm = $_POST['afm'];
            $start_date = $_POST['date1'];
            $end_date = $_POST['date2'];
            $kids = $_POST['paidia'];



            $afm = $_SESSION['afm'];
            $query = "select * from workplaces WHERE employee_afm = '$afm'";
            $query_run = $con->query($query);
            if ($query_run->num_rows > 0) {
              $row = mysqli_fetch_row($query_run);
              $business_afm = $row[0];
              $_SESSION['business_afm'] = $row[0];
            }
            $query = "select * from business WHERE business_afm = business_afm";
            $query_run = $con->query($query);
            if ($query_run->num_rows > 0) {
              $row = mysqli_fetch_row($query_run);
              $_SESSION['business_name'] = $row[0];
            }


            if (is_numeric($afm)) { //check correctness of afm
              if (strlen((string)$afm) == 9) {
                $query = "insert into permissions(employee_afm,employee_name,employee_surname,business_afm,type,start_date,end_date,kids)
                values('$afm','$name','$surname', '$business_afm', 'ΑΔΕΙΑ ΕΙΔΙΚΗΣ ΚΑΤΑΣΤΑΣΗΣ', '$start_date', '$end_date', '$kids' )";
                  $query_run = $con->query($query);
                  if ($query_run) {
                    phpSuccessAlert (" ΑΠΟΚΤΗΣΑΤΕ ΤΗΝ ΑΔΕΙΑ ΣΑΣ, ΔΕΙΤΕ ΤΟ ΑΝΑΝΕΩΜΕΝΟ ΠΡΟΦΙΛ");
                  
                  } else {
                  phpAlert( 'FAIL');
                  }
                } else {
                  phpAlert("Το Α.Φ.Μ πρέπει να αποτελείται από 9 αριθμητικά ψηφιά");
                  }
                }
          }
              else {
                phpConfAlert("Μόνο δηλωμένοι εργαζόμενοι μπορούν να πάρουν άδεια!");
                header('Location:adeia-eidikou-skopou.php');
                exit;
              }
        } //end of isset button
        ?>
      </div>
      <!--card body-->
    </div>

  </div>
  <!--container-->


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.js"></script>
  <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- changes by orestis-->
  <script>
    $("#business_afm").hide();
    $("#business_name").hide();
    $("#business_address").hide();
    $("#business_phone").hide();
    $("#business_email").hide();
    $('#age1').hide();
    $('#age2').hide();
    $('#age3').hide();
    $('#age4').hide();
    $('#age5').hide();
    $('#school1').hide();
    $('#school2').hide();
    $('#school3').hide();
    $('#school4').hide();
    $('#school5').hide();

    function onInput() {
      var val = document.getElementById("paidia").value;
      if (val == 1) {
        console.log(val);
        $('#age1').show()
        $('#school1').show()
        $('#age2').hide();
        $('#age3').hide();
        $('#age4').hide();
        $('#age5').hide();
        $('#school2').hide();
        $('#school3').hide();
        $('#school4').hide();
        $('#school5').hide();

      } else if (val == 2) {
        console.log(val);
        $('#age1').show()
        $('#school1').show()
        $('#age2').show()
        $('#school2').show()
        $('#age3').hide();
        $('#age4').hide();
        $('#age5').hide();
        $('#school3').hide();
        $('#school4').hide();
        $('#school5').hide();

      } else if (val == 3) {
        console.log(val);
        $('#age1').show()
        $('#school1').show()
        $('#age2').show()
        $('#school2').show()
        $('#age3').show()
        $('#school3').show()
        $('#age4').hide();
        $('#age5').hide();
        $('#school4').hide();
        $('#school5').hide();

      } else if (val == 4) {
        console.log(val);
        $('#age1').show()
        $('#school1').show()
        $('#age2').show()
        $('#school2').show()
        $('#age3').show()
        $('#school3').show()
        $('#age4').show()
        $('#school4').show()
        $('#age5').hide();
        $('#school5').hide();

      } else if (val == 5) {
        console.log(val);
        $('#age1').show()
        $('#school1').show()
        $('#age2').show()
        $('#school2').show()
        $('#age3').show()
        $('#school3').show()
        $('#age4').show()
        $('#school4').show()
        $('#age5').show()
        $('#school5').show()

      } else if (val > 5) {
        console.log(val);
        $('#age1').show()
        $('#school1').show()
        $('#age2').show()
        $('#school2').show()
        $('#age3').show()
        $('#school3').show()
        $('#age4').show()
        $('#school4').show()
        $('#age5').show()
        $('#school5').show()

      } else {
        $("#business_afm").hide();
        $("#business_name").hide();
        $("#business_address").hide();
        $("#business_phone").hide();
        $("#business_email").hide();
        $('#age1').hide();
        $('#age2').hide();
        $('#age3').hide();
        $('#age4').hide();
        $('#age5').hide();
        $('#school1').hide();
        $('#school2').hide();
        $('#school3').hide();
        $('#school4').hide();
        $('#school5').hide();
      }
    }
  </script>


</body>

</html>