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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
        <link rel = "stylesheet" type = "text/css" href = "main.css" />
    </head>
    <body>
        <form class="form-container" method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
        <div class="form-title"><h2>Appointment</h2></div>
        <div class="form-title">Full Name</div>
        <input class="form-field" type="text" name="fullname" required /><br />
        <div class="form-title">Phone Number</div>
        <input class="form-field" type="text" placeholder="(555) 555-5555" maxlength="14" name="phonenumeber" id="phone-number" required /><br />
            <!-- <input placeholder="Enter phone number" class="input-phone" type="tel"><br />-->
         <div class="form-title">Email</div>
         <input class="form-field" type="email" placeholder="example@email.com" name="email" required /><br />
         <div class="form-title">Date</div>
         <input class="form-field" type="date" name="date" required /><br />

         <div class="submit-container">
         <input class="submit-button" name="submit" type="submit" value="Submit" />
         </div>

     </body>
 </html>


 <script>


     webshims.setOptions('forms-ext', {types: 'date'});
     webshims.polyfill('forms forms-ext');
     $.webshims.formcfg = {
         en: {
             dFormat: '-',
             dateSigns: '-',
             patterns: {
                 d: "mm-dd-yy"
             }
         }
     };

     $('#phone-number')

         .keydown(function (e) {
             var key = e.which || e.charCode || e.keyCode || 0;
             $phone = $(this);

             // Don't let them remove the starting '('
             if ($phone.val().length === 1 && (key === 8 || key === 46)) {
                 $phone.val('(');
                 return false;
             }
             // Reset if they highlight and type over first char.
             else if ($phone.val().charAt(0) !== '(') {
                 $phone.val('('+String.fromCharCode(e.keyCode)+'');
             }

             // Auto-format- do not expose the mask as the user begins to type
             if (key !== 8 && key !== 9) {
                 if ($phone.val().length === 4) {
                     $phone.val($phone.val() + ')');
                 }
                 if ($phone.val().length === 5) {
                     $phone.val($phone.val() + ' ');
                 }
                 if ($phone.val().length === 9) {
                     $phone.val($phone.val() + '-');
                 }
             }

             // Allow numeric (and tab, backspace, delete) keys only
             return (key == 8 ||
             key == 9 ||
             key == 46 ||
             (key >= 48 && key <= 57) ||
             (key >= 96 && key <= 105));
         })

         .bind('focus click', function () {
             $phone = $(this);

             if ($phone.val().length === 0) {
                 $phone.val('(');
             }
             else {
                 var val = $phone.val();
                 $phone.val('').val(val); // Ensure cursor remains at the end
             }
         })

         .blur(function () {
             $phone = $(this);

             if ($phone.val() === '(') {
                 $phone.val('');
             }
         });
 </script>