<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="contact.css" rel="stylesheet"  type="text/css">
     <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Contact Form</title>
  </head>
  <body>
   

    <div class="container">
        <section class="my-5">
  <div class="py-6">
    <h2 class="text-center"> Contact Form</h2>
    </div>

    <div class="w-50 m-auto">
      <form action="#" method="post">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" autocomplete="off" class="form-control" required="Username" placeholder="Enter  Username" >
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="Email" autocomplete="off" class="form-control" required="Email" placeholder="Enter Email Id" >
        </div>
        <div class="form-group">
          <label>Mobile</label>
          <input type="number" name="Mobile" autocomplete="off" class="form-control" required="Mobile" placeholder="Enter Mobile number">
        </div>
        <div class="form-group">
          <label>Servies Name Enquery</label>
          <textarea class="form-control"  type="text" name="service" required="comment" placeholder="Enter Comment"></textarea>
        </div>
        <div class="form-group">
          <label>Meaage</label>
          <textarea class="form-control"  type="text" name="message" required="comment" placeholder="Enter Comment"></textarea>
        </div>
        <button type="submit" class="btn btn-success" name="Send" value="Send">Submit</button>
      </form>
      
    </div>
  </div>
</div>
</section>
     

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['Send']))
{
  $name=$_POST['name'];
  $Email=$_POST['Email'];
  $Mobile=$_POST['Mobile'];
  $service=$_POST['service'];
   $message=$_POST['message'];
   $Send=$_POST['Send'];




require 'PHPMailer\Exception.php';
require 'PHPMailer\PHPMailer.php';
require 'PHPMailer\SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kavitasinghtanu26@gmail.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('kavitasinghtanu26@gmail.com', 'Contact form');
    $mail->addAddress('kavitasinghtanu26@gmail.com', 'services');     //Add a recipient
    

    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contach Details';
    $mail->Body    = "Sender Name-$name <br>Sender Email-$Email<br>Sender Mobile-$Mobile<br>Sender service-$service<br>Sender message-$message <br>";
   

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}



?>