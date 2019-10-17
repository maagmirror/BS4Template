<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../mailer/Exception.php';
require '../mailer/PHPMailer.php';
require '../mailer/SMTP.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'localhost';                            // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'onemail@mail.com';                 // SMTP username
    $mail->Password = 'thepassword';                         // SMTP password
    //$mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPAutoTLS = false;
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('asdasd@mail.com', 'Nuevo contacto de: '. $_POST['name']);
    $mail->addAddress('asdasd@nadsads.com');               // Name is optional
    //$mail->addReplyTo('marcos@nibiru.com.uy', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    /*
    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    */

    //Content



        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Nuevo contacto de: '. $_POST['name'];
        $mail->Body    = '<h1>' . 'Nombre: ' . $_POST['name']. '<br>'  .  'Correo: ' . $_POST['email'] . '<br>'  . 'Celular: ' . $_POST['phone'] . '<br>' . 'Mensaje: ' . $_POST['message'] . '</h1>';
        $mail->AltBody = '<h1>' . 'Nombre: ' . $_POST['name']. '<br>'  .  'Correo: ' . $_POST['email'] . '<br>'  . 'Celular: ' . $_POST['phone'] . '<br>' . 'Mensaje: ' . $_POST['message'] . '</h1>';

        $mail->send();

} catch (Exception $e) {
    echo 'Error el mensaje no ha podido ser enviado: ', $mail->ErrorInfo;
}


/*
// Check for empty fields
if(empty($_POST['name'])          ||
   empty($_POST['email'])         ||
   empty($_POST['phone'])         ||
   empty($_POST['message'])    ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
    echo "No arguments Provided!";
    return false;
   }


    $name = strip_tags(htmlspecialchars($_POST['name']));
    $email_address = strip_tags(htmlspecialchars($_POST['email']));
    $phone = strip_tags(htmlspecialchars($_POST['phone']));
    $message = strip_tags(htmlspecialchars($_POST['message']));



// Create the email and send the message
$to = 'mwqeg@maagqwes.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
*/
?>
