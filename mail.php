<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

// print_r($_POST);

// the message body
$name = $fname . " " . $lname;
$message = <<<EOD
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<div class="container">
<div class="row">
<div class="">
  <table class="table table-bordered">
    <h3>Send Email</h3>
      <thead>
          <tr>
              <td>Field</td>
              <td>Value</td>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>First Name:</td>
              <td>$fname</td>
          </tr>
          <tr>
              <td>Last Name:</td>
              <td>$lname</td>
          </tr>
          <tr>
              <td>Email:</td>
              <td>$email</td>
          </tr>
          <tr>
              <td>Contact:</td>
              <td>$contact</td>
          </tr>
          <tr>
              <td>Gender:</td>
              <td>$gender</td>
          </tr>
          <tr>
              <td>Location:</td>
              <td>$location</td>
          </tr>
          <tr>
              <td>Destination:</td>
              <td>$destination</td>
          </tr>
      </tbody>
  </table>
</div>
</div>
</div>
</body>
</html>
EOD;

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP

    $mail->Host = ' smtp.mailtrap.io';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'be32771930c317';                 // SMTP username
    $mail->Password = 'c7f83c6df2d0d0';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('mail@sender.com', 'Mail Sender');
    $mail->addAddress($email, $name);     // Add a recipient


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the Mail Subject';
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
    // echo 'Message has been sent';
    echo "<script>window.location= 'index.php?status=success&message=Email sent'</script>";
    // header("location: index.php?status=success&message=Email sent");
    exit();
} catch (Exception $e) {
    // echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
    $error = "Message could not be sent. Mailer Error: ". $mail->ErrorInfo;
    echo "<script>window.location= 'index.php?status=danger&message=$error'</script>";
    // header("location: index.php?status=danger&message=$error");
    exit();
}