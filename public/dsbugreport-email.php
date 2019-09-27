<?php 
/**
 * sending the email after client fills in the details.
 *
 * @link       designstudio.com
 * @since      1.0.0
 *
 * @package    Dsbugreport
 * @subpackage Dsbugreport/public
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../libs/PHPMailer/src/Exception.php';
require '../libs/PHPMailer/src/PHPMailer.php';
require '../libs/PHPMailer/src/SMTP.php';


 //lets get the form

 // Check if the form is submitted 
 if ( isset($_POST) ) { 

    $email = $_POST['email'];
    $bug = $_POST['bug'];
    $site = $_POST['site'];
    //send email
    

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'secure.emailsrvr.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'devteam@designstudio.com';                     // SMTP username
        $mail->Password   = 'G00dbuddy1';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('devteam@designstudio.com', 'DS BUG REPORT');
        $mail->addAddress('DevTeam1@designstudio.com', 'DevTeam1');     // Add a recipient
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Bug Reported from website ' . $site;
        $mail->Body    = 'Bug Report From: ' . $email . '<br> Message: ' . $bug;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
?>

<!-- SOME HTML HERE THAT SAYS THANK YOU -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank you | DesignStudio Bug Report</title>
</head>
<body>

<h1>Thank you for reporting a bug</h1>
<p>We will contact you once we have fix the bug asap.</p>
    
</body>
</html>