<?php
    $con = mysqli_connect("localhost","root","") or die("Unable to connect");
    mysqli_select_db($con, "samplelogindb",) or die("NO database found");
    $config['base_url'] = 'http://localhost/yourproject/';
?>
