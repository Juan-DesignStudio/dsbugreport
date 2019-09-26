<?php 
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
/**
 * sending the email after client fills in the details.
 *
 * @link       designstudio.com
 * @since      1.0.0
 *
 * @package    Dsbugreport
 * @subpackage Dsbugreport/public
 */


 //lets get the form

 // Check if the form is submitted 
 if ( isset($_POST) ) { 

    $email = $_POST['email'];
    $bug = $_POST['bug'];
    $site = $_POST['site'];
    //send email
    $to = 'devteam1@designstudio.com';
    $subject = 'Bug Reported from website ' . $site ;
    $body = 'Bug Report From: ' . $email . ' Message: ' . $bug;
    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail( $to, $subject, $body, $headers );
    
    
    echo $email;
    
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