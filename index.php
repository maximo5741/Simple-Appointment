<?php
$connect_appointment = new mysqli("localhost","root","elmastergotey32","appointment");

if($connect_appointment->connect_errno){
    die("connection error:" . $connect_appointment->connect-errno );
}

if($_POST["submit"]){

$errno = CUBRID_AUTOCOMMIT_TRUE;
$fullname = $_POST["fullname"];
$phone = $_POST["phonenumeber"];
$email = $_POST["email"];
$date = $_POST["date"];

    if($errno){
        $connect_appointment->query("INSERT INTO `cdata` (`fullname`, `phone`, `email`, `date`, `timestamp`) VALUES ( '".$fullname."', '".$phone."', '".$email."', '".$date."', CURRENT_TIMESTAMP);");

    }

}
?>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "main.css" />
    </head>
    <body>
        <form class="form-container" method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
        <div class="form-title"><h2>Appointment</h2></div>
        <div class="form-title">Full Name</div>
        <input class="form-field" type="text" name="fullname" required /><br />
        <div class="form-title">Phone Number</div>
        <input class="form-field" type="text" placeholder="(555) 555-5555" name="phonenumeber" required /><br />
        <div class="form-title">Email</div>
        <input class="form-field" type="email" placeholder="example@email.com" name="email" required /><br />
        <!--<div class="form-title">Place</div>
        <select class="form-field" name="place" required>
          <option value="place 1">place 1</option>
          <option value="place 2">place 2</option>
        </select>-->
        <div class="form-title">Date</div>
        <input class="form-field" type="date" name="date" required /><br />
        
        <div class="submit-container">
        <input class="submit-button" name="submit" type="submit" value="Submit" />
        </div>
        
    </body>
</html>
<script>

</script>